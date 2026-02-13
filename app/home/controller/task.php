<?php
/**
 * 作用：定时任务
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$time=time();
$dt=$this->db->load("select id from sd_content where islock=0 and isauto=1 and createdate<=$time limit 10");
if($dt)
{
	foreach($dt as $key=>$val)
	{
		$this->db->update("sd_content","id=".$val['id']."",['islock'=>1,'isauto'=>0]);
	}
}
unset($dt);