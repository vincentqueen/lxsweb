<?php
/**
 * 作用：购买记录
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class UserBuy extends AdminsController
{
	public function index()
	{
		$this->display("user/buy/index.php");
	}

	public function del()
	{
		$id=getint(F('get.id'),0);
		$this->db->del('sd_user_buy',"aid=$id");
		$this->success('删除成功');
	}

	function view()
	{
		$id=getint(F('id'),0);
		$rs=$this->db->row("select id,classid,alias from sd_content where id=$id limit 1");
		if($rs)
		{
			gourl(showurl($rs['id'],$rs['alias'],$rs['classid']));
		}
		else
		{
			echo '内容不存在';
		}

	}

}