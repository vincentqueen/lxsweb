<?php
/**
 * 作用：充值记录
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class UserPay extends AdminsController
{
	public function index()
	{
		$this->display("user/pay/index.php");
	}

	public function del()
	{
		$id=getint(F('get.id'),0);
		$this->db->del('sd_user_pay',"ispay=0 and aid=$id");
		$this->success('删除成功');
	}

	public function clear()
	{
		$str=strtotime("-1 day");
		$this->db->del('sd_user_pay',"ispay=0 and createdate<=$str");
		$this->success('删除成功');
	}

}