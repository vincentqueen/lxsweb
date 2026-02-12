<?php
/**
 * 作用：前端相关程序
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Other extends HomeController
{
	public function __construct()
	{
		parent::__construct();
		if(IS_GET)
		{
			#微信分享
			sdcms_api::share($this);
		}
	}

	public function test()
	{
		echo getalias(39);
		echo 'aaa';
	}

	#手工执行
	function upgrade()
	{
		if(is_file('update.php'))
		{
			require 'update.php';
		}
		echo '升级成功';
	}

	#标签
	public function tags()
	{
		$this->display(T('tags'));
	}

	#标签列表
	public function taglist()
	{
		$id=getint(F("get.id"),0);
		if($id==0)
		{
			$tagname=enhtml(F('tagname'));
			if(isempty($tagname))
			{
				$this->error_tips('标签不能为空');
			}
		}
		else
		{
			$rs=$this->db->row("select title from sd_tags where id=$id limit 1");
			if(!$rs)
			{
				$this->error_tips('标签ID错误');
			}
			else
			{
				$tagname=$rs['title'];
			}
		}
		/*
		if(strpos(THIS_LOCAL,C('url_mid')."id"))
		{
			Header("HTTP/1.1 301 Moved Permanently");
			gourl(U('taglist','id='.$id.''));
		}
		*/
		$where="islock=1 and (title like binary '%$tagname%' or tags like binary '%$tagname%')";
		$this->assign('tagname',$tagname);
		$this->assign('where',$where);
		$this->display(T('taglist'));
	}

	#搜索
	public function search()
	{
		if(IS_POST)
		{
			$lastdate=getint(session('search_date'));
			#限制的秒数
			$max=20;
			$time=$max-(time()-$lastdate);
			if($time<0)
			{
				$time=$max;
			}
			if(time()-$lastdate<$max)
			{
				$this->error_tips("搜索太快，请{$time}秒后再试");
				return;
			}
			$keyword=F('keyword');
			$mode=getint(F('mode'),0);
			if(isempty($keyword))
			{
				$this->error('关键字不能为空');
				return;
			}
			$keyword=urldecode($keyword);
			session('search_date',time());
			session("search",['keyword'=>$keyword,'mode'=>$mode]);
			gourl(N('search'));
		}
		else
		{
			$keyword=enhtml(urldecode(F('keyword')));
			$mode=getint(F('mode'));
			if($keyword=='')
			{
				$data=session("search");
				if(!isempty($data) && count($data)>0)
				{
					$keyword=$data['keyword'];
					$mode=getint($data['mode'],0);
				}
			}
			
			if(isempty($keyword))
			{
				$this->error_tips('关键字不能为空');
			}
			$keyword=urldecode($keyword);
			$join='';
			$table='news';
			if($mode>0)
			{
				$md=C('model');
				if(isset($md[$mode]))
				{
					$table=$md[$mode]['tablename']; 
					$join="inner join sd_model_$table on sd_content.id=sd_model_$table.cid";
				}
			}
			$where="islock=1";
			$where.=" and (";
			#如果不需要分词，将下面一行的1改成0
			$data=split_word($keyword,0);
			$where.=" title like '%{$keyword}%' or intro like '%{$keyword}%' ";
			foreach($data as $key => $val)
			{
				if($val!=$key)
				{
					$where.=" or title like '%{$val}%' or intro like '%{$val}%' ";
				}
			}
			$where.=")";
			$this->assign('keyword',$keyword);
			$this->assign('where',$where);
			$this->assign('join',$join);
			$this->assign('table',$table);
			$this->display(T('search'));
		}
	}

	#赞一下
	public function digs()
	{
		if(IS_POST)
		{
			$id=getint(F("get.id"),0);
			$act=F("get.act");
			if(getint(cookie('digs_'.$id.''),0)==1)
			{
				$this->error('您已赞或踩过');
			}
			else
			{
				$rs=$this->db->row("select upnum,downnum from sd_content where islock=1 and id=$id limit 1");
				if($rs)
				{
					$old=0;
					$field='';
					switch($act)
					{
						case 'up':
							$old=$rs['upnum']+1;
							$field='upnum';
							break;
						case 'down':
							$old=$rs['downnum']+1;
							$field='downnum';
							break;
						default:
							break;
					}
					if($field!='')
					{
						$d[$field]=$old;
						$this->db->update("sd_content","id=$id",$d);
						cookie('digs_'.$id.'',1);
						$this->success($old);
					}
				}		
			}
		}
	}

	#留言
	public function book()
	{
		if(IS_POST)
		{
			$userip=getip();
			#获取IP用户上次留言时间
			$rs=$this->db->row("select createdate from sd_book where postip='$userip' order by id desc limit 1");
			if($rs)
			{
				#默认1分钟
				if((time()-$rs['createdate'])/60<1)
				{
					$this->error('留言提交太频繁');
					return;
				}
			}
			if(F('tel')!='')
			{
				if(!sdcms_verify::check(F('tel'),'tel',''))
				{
					$this->error('座机格式不正确');
					return;
				}
			}
			$code=session('ucode');
			$data=[[F('truename'),'null','姓名不能为空'],[F('mobile'),'mobile','手机号码不正确'],[F('remark'),'null','留言内容不能为空']];
			$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d=[];
				$d['truename']=F('truename');
				$d['mobile']=F('mobile');
				$d['tel']=F('tel');
				$d['remark']=F('remark');
				$d['islock']=0;
				$d['ontop']=0;
				$d['reply']='';
				$d['postip']=$userip;
				$d['createdate']=time();
				$this->db->add('sd_book',$d);
				$this->success('提交成功');

				#处理邮件
				if(!isempty(C('mail_admin')))
				{
					#获取邮件模板
					$mail=mail_temp(0,'book',$this->db);
					if(count($mail)>0)
					{
						$title=$mail['mail_title'];
						$title=str_replace('$webname',C('web_name'),$title);
						$title=str_replace('$weburl',WEB_URL,$title);
						$content=$mail['mail_content'];
						$content=str_replace('$webname',C('web_name'),$content);
						$content=str_replace('$weburl',WEB_URL,$content);
						$content=str_replace('$name',F('truename'),$content);
						$content=str_replace('$mobile',F('mobile'),$content);
						$content=str_replace('$tel',F('tel'),$content);
						$content=str_replace('$remark',F('remark'),$content);
						#发邮件
						send_mail(C('mail_admin'),$title,$content);
					}
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->display(T('book'));
		}
	}

	#询价
	public function inquiry()
	{
		if(IS_POST)
		{
			$id=getint(F("get.id"),0);
			$userip=getip();
			#获取IP用户上次提交时间
			$rs=$this->db->row("select createdate from sd_inquiry where postip='$userip' order by id desc limit 1");
			if($rs)
			{
				#默认1分钟
				if((time()-$rs['createdate'])/60<1)
				{
					$this->error('提交太频繁');
					return;
				}
			}
			$rs=$this->db->row("select title from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where islock=1 and id=$id limit 1");
			if(!$rs)
			{
				$this->error('参数错误');
			}
			else
			{
				$proname=enhtml($rs['title']);
				$data=[[F('truename'),'null','姓名不能为空'],[F('mobile'),'mobile','手机号码不正确'],[F('remark'),'null','询价内容不能为空']];
				$v=new sdcms_verify($data);
				if($v->result())
				{
					$d['title']=$proname;
					$d['truename']=F('truename');
					$d['mobile']=F('mobile');
					$d['remark']=F('remark');
					$d['isover']=0;
					$d['postip']=$userip;
					$d['createdate']=time();
					$this->db->add('sd_inquiry',$d);
					$this->success('提交成功');

					#处理邮件
					if(!isempty(C('mail_admin')))
					{
						#获取邮件模板
						$mail=mail_temp(0,'inquiry',$this->db);
						if(count($mail)>0)
						{
							$title=$mail['mail_title'];
							$title=str_replace('$webname',C('web_name'),$title);
							$title=str_replace('$weburl',WEB_URL,$title);
							$content=$mail['mail_content'];
							$content=str_replace('$webname',C('web_name'),$content);
							$content=str_replace('$weburl',WEB_URL,$content);
							$content=str_replace('$proname',$proname,$content);
							$content=str_replace('$name',F('truename'),$content);
							$content=str_replace('$mobile',F('mobile'),$content);
							$content=str_replace('$remark',F('remark'),$content);
							#发邮件
							send_mail(C('mail_admin'),$title,$content);
						}
					}
				}
				else
				{
					$this->error($v->msg);
				}
			}
		}
	}

	#订单
	public function order()
	{
		if(IS_POST)
		{
			$id=getint(F("get.id"),0);
			$userip=getip();
			$userid=USER_ID;
			if(C('web_order_login')==1)
			{
				if($userid==0)
				{
					$this->error('请先登录或注册');
					return;
				}
			}
			#获取IP用户上次提交时间
			$rs=$this->db->row("select createdate from sd_order where postip='$userip' and userid=$userid order by id desc limit 1");
			if($rs)
			{
				#默认1分钟
				if((time()-$rs['createdate'])/60<1)
				{
					$this->error('提交太频繁');
					return;
				}
			}
			$rs=$this->db->row("select title,price from sd_model_pro left join sd_content on sd_model_pro.cid=sd_content.id where islock=1 and id=$id limit 1");
			if(!$rs)
			{
				$this->error('参数错误');
			}
			else
			{
				$proname=enhtml($rs['title']);
				$price=$rs['price'];
				$data=[[F('truename'),'null','姓名不能为空'],[F('mobile'),'mobile','手机号码不正确'],[F('pronum'),'int','订购数量不能为空'],[(getint(F('pronum'),0)!=0),'other','订购数量不能为空'],[F('address'),'null','收货地址不能为空']];
				$v=new sdcms_verify($data);
				if($v->result())
				{
					$orderid=date('YmdHis').mt_rand(0,9);
					$d['pro_name']=$proname;
					$d['pro_num']=getint(F('pronum'),0);
					$d['pro_price']=getint(F('pronum'),0)*$price;
					$d['orderid']=$orderid;
					$d['truename']=F('truename');
					$d['mobile']=F('mobile');
					$d['address']=F('address');
					$d['remark']=F('remark');
					$d['ispay']=0;
					$d['isover']=0;
					$d['createdate']=time();
					$d['postip']=$userip;
					$d['userid']=$userid;
					$this->db->add('sd_order',$d);
					$this->success(U('other/ordershow','orderid='.$orderid.''));
					
					#处理邮件
					if(!isempty(C('mail_admin')))
					{
						#获取邮件模板
						$mail=mail_temp(0,'order',$this->db);
						if(count($mail)>0)
						{
							$title=$mail['mail_title'];
							$title=str_replace('$webname',C('web_name'),$title);
							$title=str_replace('$weburl',WEB_URL,$title);
							$content=$mail['mail_content'];
							$content=str_replace('$webname',C('web_name'),$content);
							$content=str_replace('$weburl',WEB_URL,$content);
							$content=str_replace('$orderid',$orderid,$content);
							$content=str_replace('$proname',$proname,$content);
							$content=str_replace('$num',getint(F('pronum'),0),$content);
							$content=str_replace('$money',getint(F('pronum'),0)*$price,$content);
							$content=str_replace('$name',F('truename'),$content);
							$content=str_replace('$mobile',F('mobile'),$content);
							$content=str_replace('$address',F('address'),$content);
							$content=str_replace('$remark',F('remark'),$content);
							#发邮件
							send_mail(C('mail_admin'),$title,$content);
						}
					}
				}
				else
				{
					$this->error($v->msg);
				}
			}
		}
	}

	public function ordershow()
	{
		$orderid=enhtml(F('get.orderid'));
		if(IS_POST)
		{
			$rs=$this->db->row("select pro_price from sd_order where orderid='$orderid' and ispay=1 limit 1");
			if($rs)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			if(C('web_order_login')==1 && USER_ID==0)
			{
				gourl(WEB_ROOT);
				return;
			}
			if(isempty($orderid))
			{
				$this->error_tips('订单号不能为空');
			}
			$rs=$this->db->row("select * from sd_order where orderid='$orderid' limit 1");
			if(!$rs)
			{
				$this->error_tips('订单号错误');
			}
			$userid=$rs['userid'];
			$umoney=0;
			if($userid>0 and USER_ID>0)
			{
				if(USER_ID!=$userid)
				{
					gourl(WEB_ROOT);
					return;
				}
				$ru=$this->db->row("select umoney from sd_user where id=$userid limit 1");
				if($ru)
				{
					$umoney=$ru['umoney'];
				}
			}
			foreach($rs as $key=>$val)
			{
				$this->assign($key,$val);
			}
			$this->assign('orderid',$orderid);
			$this->assign('umoney',$umoney);
			$this->display(T('ordershow'));
		}	
	}

	public function orderpay()
	{
		if(IS_POST)
		{
			$userid=USER_ID;
			if($userid==0)
			{
				$this->error("请先登录或注册");
				return;
			}
			$orderid=F("orderid");
			$rs=$this->db->row("select pro_price,ispay from sd_order where orderid='$orderid' limit 1");
			if(!$rs)
			{
				$this->error("订单编号错误");
				return;
			}
			else
			{
				$price=$rs['pro_price'];
				if($rs['ispay']==1)
				{
					$this->error("订单已付款");
					return;
				}
			}
			if($price<=0)
			{
				$this->error("价格错误");
				return;
			}
			$rs=$this->db->row("select umoney from sd_user where id=$userid limit 1");
			if(!$rs)
			{
				$this->error("会员资料不存在");
				return;
			}
			$oldmoney=$rs['umoney'];
			if($oldmoney<$price)
			{
				$this->error("余额不足，无法支付！");
				return;
			}
			$umoney=$oldmoney-$price;
			#扣除
			$this->db->update("sd_user","id=$userid",['umoney'=>$umoney]);
			#写财务记录
			$this->db->add("sd_user_money",['types'=>2,'title'=>'订单付款（订单号：'.$orderid.'）','userid'=>$userid,'amount'=>$price,'oldmoney'=>$oldmoney,'newmoney'=>$umoney,'createdate'=>time()]);
			#更新付款状态
			$this->db->update("sd_order","orderid='".$orderid."'",['ispay'=>1,'payway'=>'余额支付']);
			$this->success("付款成功");
		}
	}

	public function sitemap()
	{
		$this->display(T('sitemap'));
	}

	public function code()
	{
		$c=new sdcms_captcha();
        $c->doimg();
        $code=$c->getCode();
        session('ucode',$code);
	}
	
}