<?php
/**
 * 作用：关注回复
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Wxsubscribe extends AdminsController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id=getint(F('get.id'),0);
		if(IS_POST)
		{
			$data=[[F('t0'),'null','是否开启不能为空']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d['reply_type']=F('t0');
				$d['reply_text']=F('t1');
				$d['reply_id']=F('t2');
				$this->db->update('sd_auto_reply',"reply_key='subscribe'",$d);
				$this->success('保存成功');
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$rs=$this->db->row("select * from sd_auto_reply where reply_key='subscribe' limit 1");
			if($rs)
			{
				foreach($rs as $key=>$val)
				{
					$this->assign($key,$val);
				}
				$this->display("weixin/subscribe.php");
			}
		}
	}

	public function all()
	{
		$this->display("weixin/mater/all.php");
	}

}