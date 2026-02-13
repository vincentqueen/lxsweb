<?php
/**
 * 作用：赞、踩
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;

$id=getint(F("id"),0);
$act=F("act");
$act='up';
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
		self::success($old);
	}
}	