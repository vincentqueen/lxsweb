<?php
/**
 * 作用：会员程序
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class User extends HomeController
{
	public $badpass;
	public function __construct()
	{
		parent::__construct();
		$this->badpass=['123456','654321','admin','admin123','123123','abc123','123abc','000000','888888','monkey'];
	}

	public function Index()
	{
		self::check();
		$strTimeToString="000111222334455556666667";
		$strWenhou=array('夜深了！','凌晨了！','早上好！','上午好！','中午好！','下午好！','晚上好！','夜深了！');
		$this->assign('userid',USER_ID);
		$this->assign('welcome',$strWenhou[(int)$strTimeToString[(int)date('G',time())]]);
		$this->display(T('user'));
	}

	public function face()
	{
		$userid=USER_ID;
		if($userid==0)
		{
			echo jsencode(['state'=>'error','msg'=>'登录超时']);
			return;
		}
		else
		{
			$up=new sdcms_upload('file',1,0,0,1,200);
			if($up->state=='success')
			{
				#记录到附件
				$data=$up->fileinfo;
				$data['file_userid']=$userid;
				$this->db->add("sd_attachment",$data);

				#删除原来的头像
				$rs=$this->db->row("select uface from sd_user where id=$userid limit 1");
				if($rs)
				{
					if(strlen($rs['uface'])&&!strpos($rs['uface'],'http') && $rs['uface']!=WEB_ROOT.'upfile/noface.gif')
					{
						@unlink(str_replace(WEB_ROOT.'upfile/','upfile/',$rs['uface']));
					}
					#查询附件数据库
					$rf=$this->db->row("select file_url,file_local,id from sd_attachment where file_url='".$rs['uface']."' and file_userid=$userid limit 1");
					if($rf)
					{
						$local=$rf['file_local'];
						$file=$rf['file_url'];
						if($local>1)
						{
							sdcms_api::delfile($file,$local);
						}
						$this->db->del('sd_attachment',"id=".$rf['id']."");
					}
				}
				#替换头像
				$uface=$up->msg;
				$this->db->update('sd_user','id='.$userid.'',['uface'=>$uface]);
				$a=session('user_info');
				$a['uface']=$uface;
				session('user_info',$a);
			}
			echo $up->showmsg();
		}
	}

	public function ordercheck()
	{
		if(IS_POST)
		{
			$orderid=F('orderid');
			$rs=$this->db->row("select aid from sd_order_buy where orderid='$orderid' and ispay=1 limit 1");
			if($rs)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
	}

	public function order()
	{
		if(IS_POST)
		{
			$id=getint(F('id'),0);
			if($id<=0)
			{
				$this->error('ID错误');
				return;
			}
			$rs=$this->db->row("select catetype from sd_content a left join sd_category b on a.classid=b.cateid where id=$id and islock=1 limit 1");
			if(!$rs)
			{
				$this->error("ID错误");
				return;
			}
			else
			{
				$mode=C('model');
				$arr=$mode[$rs['catetype']];
				$tb='sd_model_'.$arr['tablename'];
			}
			$rs=$this->db->row("select price from $tb where cid=$id limit 1");
			if($rs)
			{
				if(isset($rs['price']))
				{
					$price=$rs['price'];
				}
				else
				{
					$this->error("模型表没有price字段");
					return;
				}
			}
			else
			{
				$this->error("模型表记录错误");
				return;
			}
			if($price<=0)
			{
				$this->error("价格错误");
				return;
			}
			$userid=USER_ID;
			if($userid==0)
			{
				$ip=getip();
				$time=strtotime(date('Y-m-d').' 00:00:00');
				$rs=$this->db->row("select id,logintimes from sd_user where regip='$ip' and upass='' and regdate>=$time order by id desc limit 1");
				if($rs)
				{
					$userid=$rs['id'];
					$this->db->update('sd_user',"id=$userid",['logintimes'=>$rs['logintimes']+1,'lastlogindate'=>time(),'lastloginip'=>$ip]);
					
				}
				else
				{
					#生成游客账号
					$randnum=mt_rand(10000,99999);
					#创建用户资料
					$d=[];
					$d['uname']='游客'.$randnum;
					$d['upass']='';
					$d['umoney']=0;
					$d['uemail']='';
					$d['uface']=C('user_default_face');
					$d['uid']=isempty(C('user_reg_group'))?0:C('user_reg_group');
					$d['islock']=1;
					$d['regdate']=time();
					$d['regip']=$ip;
					$d['lastlogindate']=time();
					$d['logintimes']=1;
					$this->db->add('sd_user',$d);
					$userid=$this->db->newid;
				}
				#直接变登录状态
				$rs=$this->db->row("select id,uname,upass,islock,logintimes,uid,uface from sd_user where id=$userid limit 1");
				session('user_info',$rs);
			}
			#检查是否购买过
			$rs=$this->db->row("select aid from sd_user_buy where cid=$id and userid=$userid limit 1");
			if($rs)
			{
				$this->error("您已购买，请刷新页面");
				return;
			}
			#检查是否有未购买的订单号
			$rs=$this->db->row("select orderid from sd_order_buy where userid=$userid and cid=$id and ispay=0 limit 1");
			if($rs)
			{
				$orderid=$rs['orderid'];
			}
			else
			{
				#生成订单
				$orderid=date('YmdHis').mt_rand(100,999);
				$d=[];
				$d['orderid']=$orderid;
				$d['userid']=$userid;
				$d['paymoney']=$price;
				$d['cid']=$id;
				$d['ispay']=0;
				$d['createdate']=time();
				$this->db->add('sd_order_buy',$d);
			}
			$this->success($orderid);
		}
		else
		{
			$this->error('error');
		}
	}

	public function buy()
	{
		if(IS_POST)
		{
			$userid=USER_ID;
			if($userid==0)
			{
				$this->error("请先登录或注册");
				return;
			}
			$id=getint(F("get.id"),0);
			$rs=$this->db->row("select catetype from sd_content a left join sd_category b on a.classid=b.cateid where id=$id and islock=1 limit 1");
			if(!$rs)
			{
				$this->error("ID错误");
				return;
			}
			else
			{
				$mode=C('model');
				$arr=$mode[$rs['catetype']];
				$tb='sd_model_'.$arr['tablename'];
			}
			$rs=$this->db->row("select * from $tb where cid=$id limit 1");
			if($rs)
			{
				if(isset($rs['price']))
				{
					$price=$rs['price'];
				}
				else
				{
					$this->error("模型表没有price字段");
					return;
				}
			}
			else
			{
				$this->error("模型表记录错误");
				return;
			}
			if($price<=0)
			{
				$this->error("价格错误");
				return;
			}
			#检查是否购买过
			$rs=$this->db->row("select aid from sd_user_buy where cid=$id and userid=$userid limit 1");
			if($rs)
			{
				$this->error("请勿重复购买");
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
				$this->error("账户余额不足，请先充值！");
				return;
			}
			$umoney=$oldmoney-$price;
			#扣除
			$this->db->update("sd_user","id=$userid",['umoney'=>$umoney]);
			#写财务记录
			$this->db->add("sd_user_money",['types'=>2,'title'=>'购买内容，ID：'.$id.'','userid'=>$userid,'amount'=>$price,'oldmoney'=>$oldmoney,'newmoney'=>$umoney,'createdate'=>time()]);
			#写购买记录
			$this->db->add("sd_user_buy",['cid'=>$id,'userid'=>$userid,'createdate'=>time()]);
			$this->success("购买成功");
		}
	}

	public function checkpay()
	{
		if(IS_POST)
		{
			$orderid=F('orderid');
	        $rs=$this->db->row("select aid from sd_user_pay where orderid='$orderid' and ispay=1 limit 1");
	        if($rs)
	        {
	            echo "1";
	        }
	        else
	        {
	        	echo "0";
	        }
		}
	}

	public function pay()
	{
		self::check();
		$userid=USER_ID;
		if(IS_POST)
		{
			#删除无效的充值
			$rs=$this->db->load("select aid,orderid from sd_user_pay where userid=$userid and ispay=0");
			if($rs)
			{
				foreach($rs as $key=>$val)
				{
					$orderid=$val['orderid'];
					$aid=$val['aid'];
					$this->db->del("sd_onlinepay","orderid='$orderid' and paytype=1");
					$this->db->del("sd_user_pay","aid=$aid and userid=$userid");
				}
			}
			$paymoney=getint(F('paymoney'),0);
			if($paymoney<1 || $paymoney>10000)
			{
				$this->error('充值金额错误');
				return;
			}
			$orderid=date('YmdHis').mt_rand(100,999);
			$d=[];
			$d['orderid']=$orderid;
			$d['userid']=$userid;
			$d['paymoney']=$paymoney;
			$d['createdate']=time();
			$d['ispay']=0;
			$d['paydate']=0;
			$d['trade_no']='';
			$this->db->add('sd_user_pay',$d);
			$this->success($orderid);
		}
		else
		{
			$this->assign('userid',$userid);
			$this->display(T('pay'));
		}
	}

	public function mymoney()
	{
		self::check();
		$type=getint(F('get.type'),0);
		$userid=USER_ID;
		$where="userid=$userid";
		switch($type)
		{
			case '1':
				$where.=' and types=1';
				break;
			case '2':
				$where.=' and types=2';
				break;
		}
		$keyword=enhtml(F('keyword'));

		if(strlen($keyword)>0)
		{
			$where.=" and title like binary '%".$keyword."%'";
		}
		$this->assign('keyword',$keyword);
		$this->assign('userid',$userid);
		$this->assign('type',$type);
		$this->assign('where',$where);
		$this->display(T('mymoney'));
	}

	public function myorder()
	{
		self::check();
		$type=getint(F('get.type'),0);
		$userid=USER_ID;
		$where="userid=$userid";
		switch($type)
		{
			case '1':
				$where.=' and ispay=1';
				break;
			case '2':
				$where.=' and ispay=0';
				break;
		}
		$this->assign('userid',$userid);
		$this->assign('type',$type);
		$this->assign('where',$where);
		$this->display(T('myorder'));
	}

	public function editemail()
	{
		self::check();
		$userid=USER_ID;
		if(IS_POST)
		{
			$email=trim(F('email'));
			$data=[[$email,'email','邮箱格式不正确']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rs=$this->db->row("select id from sd_user where uemail='$email' and id<>$userid limit 1");
				if($rs)
				{
					$this->error('邮箱已存在，请更换');
				}
				else
				{
					$this->db->update('sd_user','id='.$userid.'',['uemail'=>$email]);
					$this->success('修改成功');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->assign('userid',$userid);
			$this->display(T('editemail'));
		}
	}

	public function editpass()
	{
		self::check();
		$userid=USER_ID;
		if(IS_POST)
		{
			$data=[[F('oldpass'),'null','原密码不能为空'],[md5(F('oldpass'))==get_user_info('upass'),'other','原密码错误'],[F('newpass'),'null','新密码不能为空'],[F('repass'),'null','确认密码不能为空'],[F('newpass')==F('repass'),'other','两次密码不一致']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d['upass']=md5(F('newpass'));
				$this->db->update('sd_user',"id=$userid",$d);
				$a=session('user_info');
				$a['upass']=md5(F('newpass'));
				session('user_info',$a);
				$this->success('修改成功');
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->display(T('editpass'));
		}
	}

	public function regcode()
	{
		if(IS_POST)
		{
			if(C('mail_type')==0)
			{
				$this->error('未开启邮件设置');
				return;
			}
			$code=session('ucode');
			$email=F('email');
			$data=[
				[$email,'email','邮箱格式不正确']
			];
			if(strpos($email,'tempmail.cn'))
			{
				$this->error('非法邮箱');
				return;
			}
			if(C('user_reg_auth')==1)
			{
				$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			}
			if(session('regcode')!='')
			{
				if((time()-session('regcode'))<60)
				{
					$this->error('操作太快');
					return;
				}
			}
			#检查邮箱是否已被注册
			$rs=$this->db->row("select id from sd_user where uemail='".$email."' limit 1");
			if($rs)
			{
				$this->error('邮箱已被使用过，请更换。');
				return;
			}
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rnd=mt_rand(10000,99999);
				$rs=$this->db->row("select id from sd_code where email='".$email."' and types=1 and isover=0 limit 1");
				if($rs)
				{
					$this->db->update("sd_code","id=".$rs['id']."",['code'=>$rnd,'createdate'=>time()]);
				}
				else
				{
					$this->db->add("sd_code",['email'=>$email,'code'=>$rnd,'createdate'=>time(),'types'=>1,'isover'=>0]);
				}
				#发邮件
				$mail=mail_temp(0,'reg',$this->db);
				if(count($mail)>0)
				{
					$title=$mail['mail_title'];
					$content=$mail['mail_content'];
					$content=str_replace('$code',$rnd,$content);
					send_mail($email,$title,$content);
					session('regcode',time());
					$this->success('发送成功，请至邮箱查找验证码');
				}
				else
				{
					$this->error('找不到邮件模板');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->error('参数错误');
		}
	}

	public function getpasscode()
	{
		if(IS_POST)
		{
			if(C('mail_type')==0)
			{
				$this->error('未开启邮件设置');
				return;
			}
			$code=session('ucode');
			$email=F('email');
			$data=[
				[$email,'email','邮箱格式不正确']
			];
			
			if(C('user_getpass_auth')==1)
			{
				$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			}
			if(session('getpasscode')!='')
			{
				if((time()-session('getpasscode'))<60)
				{
					$this->error('操作太快');
					return;
				}
			}
			#检查邮箱是否已被注册
			$rs=$this->db->row("select id from sd_user where uemail='".$email."' limit 1");
			if(!$rs)
			{
				$this->error('邮箱不存在，请检查。');
				return;
			}
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rnd=mt_rand(10000,99999);
				$rs=$this->db->row("select id from sd_code where email='".$email."' and types=2 and isover=0 limit 1");
				if($rs)
				{
					$this->db->update("sd_code","id=".$rs['id']."",['code'=>$rnd,'createdate'=>time()]);
				}
				else
				{
					$this->db->add("sd_code",['email'=>$email,'code'=>$rnd,'createdate'=>time(),'types'=>2,'isover'=>0]);
				}
				#发邮件
				$mail=mail_temp(0,'getpass',$this->db);
				if(count($mail)>0)
				{
					$title=$mail['mail_title'];
					$content=$mail['mail_content'];
					$content=str_replace('$code',$rnd,$content);
					send_mail($email,$title,$content);
					session('getpasscode',time());
					$this->success('发送成功，请至邮箱查找验证码');
				}
				else
				{
					$this->error('找不到邮件模板');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->error('参数错误');
		}
	}

	public function getpass()
	{
		if(IS_POST)
		{
			if(C('mail_type')==0)
			{
				$this->error('未开启邮件设置');
				return;
			}
			$code=session('ucode');
			$email=F('email');
			$data=[
				[$email,'email','邮箱格式不正确'],
				[F('ecode'),'null','邮箱验证码不能为空'],
				[F('password'),'password','密码为5-16位字符'],
				[F('repass'),'password','确认密码为5-16位字符'],
				[F('password')==F('repass'),'other','两次密码输入不一致']
			];
			if(C('user_getpass_auth')==1)
			{
				$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			}

			$eid=0;
			$rs=$this->db->row("select id,code from sd_code where email='".$email."' and types=2 and isover=0 limit 1");
			if(!$rs)
			{
				$data=array_merge([[1!=1,'other','邮箱不存在，请检查']]);
			}
			elseif(F('ecode')!=$rs['code'])
			{
				$data=array_merge([[1!=1,'other','邮箱验证码不正确']]);
			}
			else
			{
				$eid=$rs['id'];
			}	
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rs=$this->db->row("select id from sd_user where uemail='".$email."' limit 1");
				if(!$rs)
				{
					$this->error('邮箱不存在，请检查');
				}
				else
				{
					$this->db->update('sd_user','id='.$rs['id'].'',['upass'=>md5(F('repass'))]);
					if($eid>0)
					{
						$this->db->update("sd_code","id=".$eid."",['isover'=>1]);
						session('getpasscode','[del]');
					}
					$this->success('密码修改成功');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			if(C('mail_type')==0)
			{
				$this->error_tips('未开启邮件设置，请联系管理员找回密码。');
			}
			else
			{
				$this->display(T('getpass'));
			}
		}
	}

	public function reg()
	{
		if(IS_POST)
		{
			if(C('user_open')==2)
			{
				$this->error('系统未开启会员注册');
				return;
			}
			$code=session('ucode');
			$email=F('email');
			$uname=F('uname');
			$upass=F('upass');
			$data=[
				[$uname,'username','用户名为3-12位字符'],
				[$upass,'password','密码为5-16位字符'],
				[F('repass'),'password','确认密码为5-16位字符'],
				[$uname!=$upass,'other','不能使用用户名作为密码'],
				[$upass==F('repass'),'other','两次密码输入不一致'],
				[$email,'email','邮箱格式不正确']
			];
			if(strpos($email,'tempmail.cn'))
			{
				$this->error('非法邮箱');
				return;
			}
			if(C('user_reg_auth')==1)
			{
				$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			}
			if(strlen(C('user_badname')))
			{
				$badname=explode('|',C('user_badname'));
				$data=array_merge($data,[[!(in_array($uname,$badname)),'other','系统禁止注册此用户名']]);
			}
			$eid=0;
			#如果是邮箱验证，则需要验证验证码
			if(C('user_reg_type')==2&&C('mail_type')>0)
			{
				$data=array_merge($data,[[F('ecode'),'null','邮箱验证码不能为空']]);
				$rs=$this->db->row("select id,code from sd_code where email='".$email."' and types=1 and isover=0 limit 1");
				if(!$rs)
				{
					$data=array_merge([[1!=1,'other','邮箱不存在，请检查']]);
				}
				elseif(F('ecode')!=$rs['code'])
				{
					$data=array_merge([[1!=1,'other','邮箱验证码不正确']]);
				}
				else
				{
					$eid=$rs['id'];
				}
			}
			
			if(in_array($upass,$this->badpass))
			{
				$this->error('系统检测到您的密码过于简单');
				return;
			}
			$v=new sdcms_verify($data);
			if($v->result())
			{
				if($this->db->row("select id from sd_user where uname='".$uname."' limit 1"))
				{
					$this->error('用户名已存在，请更换');
					return;
				}
				if($this->db->row("select id from sd_user where uemail='".$email."' limit 1"))
				{
					$this->error('邮箱已存在，请更换');
					return;
				}				
				$d['uname']=$uname;
				$d['upass']=md5($upass);
				$d['umoney']=0;
				$d['uemail']=$email;
				$d['uface']=C('user_default_face');
				#获取默认加入的会员组
				$d['uid']=isempty(C('user_reg_group'))?0:C('user_reg_group');
				$d['islock']=(C('user_reg_type')==3)?0:1;
				$d['regdate']=time();
				$d['regip']=getip();
				$d['lastlogindate']=time();
				$d['logintimes']=(C('user_reg_type')==3)?0:1;
				$this->db->add('sd_user',$d);
				$userid=$this->db->newid;
				#新增OpenId
				$api_login=session('api_login_openid');
				$openid=$unionid='';
				if(!isempty($api_login))
				{
					$openid=$api_login['openid'];
					$unionid=$api_login['unionid'];
					$apiuser=session('api_login_info');

					$this->db->add('sd_user_login',['userid'=>$userid,'type'=>$apiuser['type'],'openid'=>$openid,'unionid'=>$unionid]);
					#保存用户头像
					$this->db->update('sd_user','id='.$userid.'',['uface'=>$apiuser['face']]);
					#清理数据
					session('api_login_openid','[del]');
					session('api_login_info','[del]');
				}
				$arr['state']='success';
				#更新邮箱验证码状态
				if($eid>0)
				{
					$this->db->update("sd_code","id=".$eid."",['isover'=>1]);
					session('sendcode','[del]');
				}
				if(C('user_reg_type')!=3)
				{
					#直接变登录状态
					$rs=$this->db->row("select id,uname,upass,islock,logintimes,uid,uface from sd_user where uname='".$uname."' limit 1");
					session('user_info',$rs);
					$this->success('注册成功');
				}
				else
				{
					$this->success('注册成功，您的账户需要审核后才能登录');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			if(USER_ID!=0)
			{
				gourl(N('user'));
				return;
			}
			$lasturl=PRE_URL;
			if(!strlen($lasturl))
			{
				$lasturl=N('user');
			}
			else
			{
				if(strrpos($lasturl,'reg')||strrpos($lasturl,'login')||strrpos($lasturl,'getpass'))
				{
					$lasturl=N('user');
				}
			}
			if(C('user_open')==2)
			{
				$this->error_tips('系统未开启会员注册');
				return;
			}
			$apiuser=session('api_login_openid');
			if(!isempty($apiuser))
			{
				$lasturl=N('user');
				$isapi=1;
				$api_info=session('api_login_info');
			}
			else
			{
				$isapi=0;
				$api_info='';
			}
			session("lasturl",$lasturl);
			$this->assign('lasturl',$lasturl);
			$this->assign('isapi',$isapi);
			$this->assign('ispai',$isapi);
			$this->assign('api_info',$api_info);
			$this->display(T('reg'));
		}
	}

	public function login()
	{
		if(IS_POST)
		{
			$code=session('ucode');
			$uname=F('uname');
			$upass=F('upass');
			$data=[
				[$uname,'username','用户名为3-12位字符'],
				[$upass,'password','密码为5-16位字符']
			];
			if(C('user_login_auth')==1)
			{
				$data=array_merge($data,[[F('code'),'null','验证码不能为空'],[$code,'null','无法获取系统验证码'],[$code==md5(strtolower(F('code'))),'other','验证码不正确']]);
			}
			if(in_array($upass,$this->badpass))
			{
				$this->error('系统检测到您的密码过于简单');
				return;
			}
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rs=$this->db->row("select id,uname,upass,islock,logintimes,uid,uface from sd_user where uname='".$uname."' and upass='".md5($upass)."' limit 1");
				if(!$rs)
				{
					$this->error('用户名或密码错误');
				}
				else
				{
					if($rs['islock']==0)
					{
						$this->error('用户被锁定，不能登录');
					}
					else
					{
						$uface=$rs['uface'];
						unset($rs['uface']);
						$userid=$rs['id'];
						$logintimes=$rs['logintimes'];
						session('user_info',$rs);
						$this->db->update('sd_user','id='.$userid.'',['logintimes'=>$logintimes+1,'lastlogindate'=>time(),'lastloginip'=>getip()]);
						#新增OpenId
						$api_login=session('api_login_openid');
						if(!isempty($api_login))
						{
							$openid=$api_login['openid'];
							$unionid=$api_login['unionid'];
							$apiuser=session('api_login_info');
							$this->db->add('sd_user_login',['userid'=>$userid,'type'=>$apiuser['type'],'openid'=>$openid,'unionid'=>$unionid]);
							if($uface=='')
							{
								#保存用户头像
								$this->db->update('sd_user','id='.$userid.'',['uface'=>$apiuser['face']]);
							}
							#清理数据
							session('api_login_openid','[del]');
							session('api_login_info','[del]');
						}
						$this->success('登录成功');
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
			if(USER_ID!=0)
			{
				gourl(N('user'));
			}
			$lasturl=PRE_URL;
			if(!strlen($lasturl))
			{
				$lasturl=N('user');
			}
			else
			{
				if(strrpos($lasturl,'reg')||strrpos($lasturl,'login')||strrpos($lasturl,'getpass'))
				{
					$lasturl=N('user');
				}
			}
			$apiuser=session('api_login_openid');
			if(!isempty($apiuser))
			{
				$lasturl=N('user');
				$isapi=1;
				$api_info=session('api_login_info');
			}
			else
			{
				$isapi=0;
				$api_info='';
			}
			session("lasturl",$lasturl);
			$this->assign('isapi',$isapi);
			$this->assign('api_info',$api_info);
			$this->assign('lasturl',$lasturl);
			$this->display(T('login'));
		}
	}

	public function out()
	{
		session('user_info','[del]');
		session('openid','[del]');
		gourl(N('login'));
	}

	public function apiout()
	{
		#清理数据
		session('api_login_openid','[del]');
		session('api_login_info','[del]');
		gourl(PRE_URL);
	}

	private function check()
	{
		if(USER_ID==0)
		{
			gourl(N('login'));
		}
		else
		{
			$rs=$this->db->row("select id from sd_user where id=".USER_ID." and islock=1 limit 1");
			if(!$rs)
			{
				session('user_info','[del]');
				gourl(N('login'));
			}
		}
	}

	public function code()
	{
		$c=new sdcms_captcha();
        $c->doimg();
        $code=$c->getCode();
        session('ucode',$code);
	}

}