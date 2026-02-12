<?php
/**
 * 作用：财务管理
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class UserMoney extends AdminsController
{
	
	private $tbname,$temproot;
	public function __construct()
	{
		parent::__construct();
		$this->tbname='sd_user_money';
		$this->temproot='user/money/';
	}

	public function index()
	{
		$type=getint(F('get.type'),0);
		$where='1=1 ';
		$keyword=F('get.keyword');
		if(strlen($keyword)>0)
		{
			$where.=" and (uname like binary '%".$keyword."%' or title like binary '%".$keyword."%')";
		}
		switch($type)
		{
			case '1':
				$where.=' and types='.$type.'';
				break;
			case "2":
				$where.=' and types='.$type.'';
				break;
		}
		$this->assign("where",$where);
		$this->assign("type",$type);
		$this->assign("keyword",$keyword);
		$this->display($this->temproot."index.php");
	}

	public function add()
	{
		if(IS_POST)
		{
			$data=[[F('t0'),'username','用户名不能为空'],[F('t3'),'null','备注不能为空']];
			$userid=0;
			$umoney=0;
			#检查用户名是否存在
			$rs=$this->db->row("select id,umoney from sd_user where uname='".F('t0')."' limit 1");
			if(!$rs)
			{
				$data=array_merge($data,[[(1>1),'other','用户名不存在，请检查']]);
			}
			else
			{
				$userid=$rs['id'];
				$umoney=$rs['umoney'];
				$oldmoney=$umoney;
				if(getint(F('t2'),2)==2)
				{
					if($umoney<getint(F('t1'),0))
					{
						$data=array_merge($data,[[(1>1),'other','用户余款不足，无法完成扣款']]);
					}
					else
					{
						$umoney=$umoney-F('t1');
					}
				}
				else
				{
					$umoney=$umoney+F('t1');
				}
			}
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d['userid']=$userid;
				$d['amount']=F('t1');
				$d['types']=getint(F('t2'),2);
				$d['title']=F('t3');
				$d['oldmoney']=$oldmoney;
				$d['newmoney']=$umoney;
				$d['createdate']=time();
				$this->db->add($this->tbname,$d);
				$this->db->update('sd_user',"id=$userid",['umoney'=>$umoney]);
				$this->success('入账成功');
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->display($this->temproot."add.php");
		}
	}

	public function del()
	{
		$id=getint(F('get.id'),0);
		$this->db->del($this->tbname,'aid='.$id.'');
		$this->success('删除成功');
	}

}