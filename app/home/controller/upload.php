<?php
/**
 * 作用：上传
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Upload extends HomeController
{
	public function index()
	{
		$result='';
		switch(F('get.action')) 
		{
			case 'image':
				$result=self::editor(3);
				break;
			case 'video':
				$result=self::editor(3);
				break;
			default:
				$result=self::editor(3);
				break;
		}
		echo $result;
	}

	public function upfile()
	{
		$water=getint(F('get.water'),0);
		$thumb=getint(F('get.thumb'),1);
		$type=getint(F('get.type'),1);
		$type=1;
		if(USER_ID==0)
		{
			echo jsencode(['state'=>'error','msg'=>'请先登录或注册']);
		}
		else
		{
			$up=new sdcms_upload('file',$type,$thumb,$water,0,0,0);
			if($up->state=='success')
			{
				$arr=['state'=>'SUCCESS','url'=>$up->msg,'original'=>$up->oldname,'title'=>$up->oldname];
				#记录到附件
				$data=$up->fileinfo;
				$data['file_userid']=USER_ID;
				$this->db->add("sd_attachment",$data);
			}
			echo $up->showmsg();
		}
	}

	public function editor($type)
	{
		if(USER_ID==0)
		{
			$arr=['state'=>'fail','msg'=>'请先登录或注册'];
		}
		else
		{
			$up=new sdcms_upload('file',$type,1,1);
			if($up->state=='success')
			{
				$arr=['state'=>'success','msg'=>$up->msg,'name'=>$up->oldname];
				#记录到附件
				$data=$up->fileinfo;
				$data['file_userid']=USER_ID;
				$this->db->add("sd_attachment",$data);
			}
			else
			{
				$arr=['state'=>'fail','msg'=>$up->msg];
			}
		}
		return jsencode($arr);
	}

}