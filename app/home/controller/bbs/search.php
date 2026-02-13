<?php
/**
 * 作用：搜索主题
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

if(!defined('IN_SDCMS')) exit;


if(IS_POST)
{
	if(USER_ID==0)
	{
		$this->error_tips(C('lan_bbs_search'),N('login'));
		return;
	}
	$keyword=F('keyword');
	$mode=getint(F('mode'),0);
	if(isempty($keyword))
	{
		$this->error('关键字不能为空');
		return;
	}
	$keyword=urldecode($keyword);
	session("search_bbs",$keyword);
	gourl(U('search'));
}
else
{
	$where='';
	$data=session("search_bbs");
	$keyword=$data;
	if(isempty($keyword))
	{
		$this->error_tips('关键字不能为空');
	}
	$keyword=urldecode($keyword);

	if(strlen($keyword)<2||strlen($keyword)>20)
	{
		$this->error_tips(C('lan_bbs_search_key'),N('bbs'));
		return;
	}
	$where.=" and (";
	$data=split_word($keyword,1);
	$step=0;
	#如果不需要分词，将下面一行的1改成0
	foreach ($data as $key => $val)
	{
		if($step>0)
		{
			$where.=" or ";
		}
		$where.=" title like '%{$val}%' ";
		$step++;
	}
	$where.=")";

	$this->assign('keyword',$keyword);
	$this->assign('where',$where);
	$this->display(T('bbs_search'));
}