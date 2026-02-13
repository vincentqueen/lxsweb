<?php
/**
 * 作用：在线支付记录
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Useronline extends AdminsController
{
	private $tbname,$temproot;
	public function __construct()
	{
		parent::__construct();
		$this->tbname='sd_onlinepay';
		$this->temproot='user/online/';
	}
 
	public function btach()
	{
		$id=F('id');
		self::btach_clear($id);
		$this->success('操作成功');
	}
 
	public function btach_clear($id)
	{
		$arr=explode(',',$id);
		foreach($arr as $key=>$val)
		{
			$val=getint($val,0);
			$rs=$this->db->row("select aid from ".$this->tbname." where aid=$val");
			if($rs)
			{
				$this->db->del($this->tbname,'aid='.$val.'');
			}
		}
	}
 
	public function index()
	{
		$where='1=1 ';
		$keyword=trim(F('get.keyword'));
		if(strlen($keyword)>0)
		{
			$where.=" and (orderid like binary '%".$keyword."%' or pay_no like binary '%".$keyword."%')";
		}
		$type=getint(F('get.type'),0);
		switch($type)
		{
			case '1':
				$where.=' and ispay=1';
				break;
			case "2":
				$where.=' and ispay=0';
				break;
		}
		$userid=getint(F('get.userid'),0);
		if($userid>0)
		{
			$where.=" and userid=$userid";
		}
		$this->assign("where",$where);
		$this->assign("type",$type);
		$this->assign("keyword",$keyword);
		$this->display($this->temproot."index.php");
	}
 
	public function del()
	{
		$id=getint(F('get.id'),0);
		$this->db->del($this->tbname,"aid=$id");
		$this->success('删除成功');
	}

}