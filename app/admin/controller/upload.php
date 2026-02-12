<?php
/**
 * 作用：后台上传
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Upload extends AdminsController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$result='';
		switch(F('get.action')) 
		{
			case 'image':
				$result=self::editor(1);
				break;
			case 'video':
				$result=self::editor(2);
				break;
			default:
				$result=self::editor(3);
				break;
		}
		echo $result;
	}

	public function editor($type)
	{
		$up=new sdcms_upload('file',$type,1,1);
		if($up->state=='success')
		{
			self::record($up->fileinfo,0);
			$arr=['state'=>'success','msg'=>$up->msg,'name'=>$up->oldname];
		}
		else
		{
			$arr=['state'=>'fail','msg'=>$up->msg];
		}
		return jsencode($arr);
	}

	public function saveRemote($url)
	{
		$info=['state'=>'错误','url'=>'','file'=>[]];
		#演示站原样返回
		if(APP_DEMO) return $info;
		#enhtml可能会造成远程图片保存失败（原因：URL路径中含有非法字符）
		#$url=enhtml($url);
		$url=str_replace('&amp;','&',$url);
		if(strpos($url,'http')!==0)
		{
			$info['state']='链接不是http链接';
			return $info;
		}
		preg_match('/(^https*:\/\/[^:\/]+)/', $url, $matches);
        $host_with_protocol=count($matches)>1? $matches[1]:'';

        #判断是否是合法 url
        if(!filter_var($host_with_protocol, FILTER_VALIDATE_URL))
        {
            $info['state']='非法URL';
			return $info;
        }

        preg_match('/^https*:\/\/(.+)/',$host_with_protocol,$matches);
        $host_without_protocol=count($matches)>1?$matches[1]:'';

        #此时提取出来的可能是 ip 也有可能是域名，先获取 ip
        $ip=gethostbyname($host_without_protocol);
        #判断是否是私有 ip
        if(!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE))
        {
            $info['state']='非法IP';
			return $info;
        }
        #获取请求头并检测死链
        $heads=get_headers($url, 1);
        if (!(stristr($heads[0], "200") && stristr($heads[0], "OK")))
        {
            $info['state']='链接不可用';
			return $info;
        }
        #格式验证(扩展名验证和Content-Type验证)
        if(isset($heads['Content-Type']))
        {
			$heads['Content-Type']=str_replace(';charset=UTF-8','',$heads['Content-Type']);
        	switch($heads['Content-Type'])
        	{
        	 	case 'image/gif':
        	 		$ext='.gif';
        	 		break;
        	 	case 'image/jpeg':
        	 		$ext='.jpg';
        	 		break;
        	 	case 'image/png':
        	 		$ext='.png';
        	 		break;
        	 	case 'image/bmp':
        	 		$ext='.bmp';
        	 		break;
        	 	case 'image/webp':
        	 		$ext='.webp';
        	 		break;
        	 	default:
        	 		$info['state']='非法图片'.$heads['Content-Type'];
        	 		return $info;
        	 		break;
        	 }
        }
        if(!in_array($ext,[".png",".jpg",".jpeg",".gif",".bmp",".webp"]) || !isset($heads['Content-Type']) || !stristr($heads['Content-Type'], "image"))
        {
            $info['state']='链接contentType不正确';
			return $info;
        }
        #打开输出缓冲区并获取远程图片
        ob_start();
        $context=stream_context_create(array('http'=>array('follow_location'=>false)));
        readfile($url,false,$context);
        $img=ob_get_contents();
        ob_end_clean();
        preg_match("/[\/]([^\/]*)[\.]?[^\.\/]*$/",$url,$m);
        if(check_bad($img)!='')
		{
			$info['state']='非法图像文件';
			return $info;
		}
		$size=strlen($img);
        if($size>C('upload_image_max')*1024*1024)
        {
        	$info['state']='文件大小超出网站限制';
			return $info;
        }
        switch(C('upload_file_folder'))
		{
			case '1':
				$filepath='upfile/'.date("Y").'/';
				break;
			case '2':
				$filepath='upfile/'.date("Y").'/'.date("m").'/';
				break;
			case '3':
				$filepath='upfile/'.date("Y").'/'.date("m").'/'.date("d").'/';
				break;
			default:
				$filepath='upfile/'.date("Ym").'/';
		}
		if(!is_dir($filepath))
		{
			if(!mkfolder($filepath))
			{
				$info['state']='文件夹创建失败';
				return $info;
			}
		}
		$newname=time().mt_rand(100,999).$ext;
		if(!(file_put_contents($filepath.$newname, $img) && file_exists($filepath.$newname)))
		{
            $info['state']='移动失败';
        }
        else
        {
	        $fileway=C('file_way');
			if($fileway=='local')
			{
				$info['state']='SUCCESS';
            	$info['url']=WEB_ROOT.$filepath.$newname;
            }
            else
            {
            	$data['tmp_name']=$filepath.$newname;
	        	$data['type']='image/'.$ext;
				$up=new $fileway();
				$result=$up->upload($data,$filepath.$newname);
				if($result)
				{
					$info['url']=$up->backurl;
					$info['state']='SUCCESS';
					#删除本地文件
					@unlink($filepath.$newname);
				}
				else
				{
					$info['state']=$up->msg;
				}
			}
			if($info['state']=='SUCCESS')
			{
				$old=explode('/',$url);
				$local=0;
				switch($fileway)
				{
					case 'oss':
						$local=2;
						break;
					case 'qiniu':
						$local=3;
						break;
				}
				$info['file']=['file_url'=>$info['url'],'file_name'=>enhtml(end($old)),'file_ext'=>strtolower($ext),'file_size'=>$size,'file_type'=>1,'file_update'=>time(),'file_local'=>$local,'file_ip'=>getip()];
			}
        }
        return $info;
	}

	public function outimage()
	{
		$a='';
		if(isset($_POST['content']))
		{
			$a=$_POST['content'];
		}
		if(empty($a))
		{
			echo '';
			exit;
		}
		#去掉反斜杠
		$a=stripslashes($a);
		list($host)=explode(':',$_SERVER['HTTP_HOST']);
		$d=get_all_picurl($a,$host);
		if(is_array($d))
		{
			foreach($d as $key=>$val)
			{
				$info=self::saveRemote($val);
				if($info['state']=='SUCCESS')
				{
					$a=str_replace($val,$info['url'],$a);
					self::record($info['file']);
				}
				/*
				else
				{
					$a=$info['state'];
				}
				*/
			}
		}
		echo $a;
	}

	public function upfile()
	{
		$water=getint(F('get.water'),0);
		$thumb=getint(F('get.thumb'),1);
		$type=getint(F('get.type'),1);
		if($type==0)
		{
			$type=3;
		}
		$islocal=getint(F('get.islocal'),0);
		$gid=getint(F('gid'),0);
		$iseditor=getint(F('get.iseditor'),0);
		if($islocal==1)
		{
			$thumb=0;
			$water=0;
		}
		if($iseditor==1)
		{
			$thumb=1;
			$water=1;
		}
		$up=new sdcms_upload('file',$type,$thumb,$water,0,0,$islocal);
		if($up->state=='success')
		{
			self::record($up->fileinfo,$gid);
		}
		echo $up->showmsg();
	}

	public function imagelist()
	{
		$type=getint(F('get.type'),0);
		$multiple=getint(F('get.multiple'),0);
		$thumb=getint(F('get.thumb'),1);
		$water=getint(F('get.water'),1);
		$islocal=getint(F('get.islocal'),0);
		$iseditor=getint(F('get.iseditor'),0);
		$gid=getint(F('get.gid'),0);
		$keyword=F('get.keyword');
		if($islocal==1)
		{
			$thumb=0;
			$water=0;
		}
		$where="1=1";
		$order="id desc";
		$where_query='';
		if(in_array($type,[1,2,3]))
		{
			$where="file_type=$type";
			$where_query=" and file_type=$type";
		}
		if($type==3 && $iseditor==0)
		{
			$where="file_type>=1";
			$where_query=" and file_type>=1";
		}
		if($keyword!='')
		{
			$where.=" and file_name like '%".$keyword."%'";
		}
		if($gid>0)
		{
			$where.=" and gid=$gid";
		}
		if($gid<0)
		{
			$where.=" and gid=0";
		}
		if($islocal==1)
		{
			$where.=" and file_local=1";
		}
		$all=$this->db->count("select count(1) from sd_attachment");
		$total=$this->db->count("select count(1) from sd_attachment where gid=0");
		$this->assign('type',$type);
		$this->assign('multiple',$multiple);
		$this->assign('thumb',$thumb);
		$this->assign('water',$water);
		$this->assign('islocal',$islocal);
		$this->assign('iseditor',$iseditor);
		$this->assign('gid',$gid);
		$this->assign('keyword',$keyword);
		$this->assign('where',$where);
		$this->assign('where_query',$where_query);
		$this->assign('order',$order);
		$this->assign('total',$total);
		$this->display('other/image.php');
	}

	public function imageupload()
	{
		$type=getint(F('get.type'),0);
		$multiple=getint(F('get.multiple'),0);
		$iseditor=getint(F('get.iseditor'),0);
		$islocal=getint(F('get.islocal'),0);
		$gid=getint(F('get.gid'),0);
		$thumb=getint(F('get.thumb'),0);
		$water=getint(F('get.water'),0);
		$this->assign('type',$type);
		$this->assign('multiple',$multiple);
		$this->assign('iseditor',$iseditor);
		$this->assign('islocal',$islocal);
		$this->assign('thumb',$thumb);
		$this->assign('water',$water);
		$this->assign('gid',$gid);
		$this->display('other/upload.php');
	}

	public function addgroup()
	{
		if(IS_POST)
		{
			$data=[[F('name'),'null','分组名称不能为空']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rs=$this->db->row("select * from sd_attachment_group where gname='".F('name')."' limit 1");
				if($rs)
				{
					$this->error('分组名称已存在');
				}
				else
				{
					$d['gname']=F('name');
					$d['ordnum']=0;
					$d['islock']=1;
					$this->db->add('sd_attachment_group',$d);
					$this->success('添加成功');
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
	}

	private function record($data=[],$gid=0)
	{
		if(!APP_DEMO && is_array($data))
		{
			$data['file_adminid']=ADMIN_ID;
			$data['gid']=$gid;
			$this->db->add("sd_attachment",$data);
		}
	}

}