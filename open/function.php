<?php
/**
 * 作用：小程序函数处理
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

function app_field_show($field,$record,$domain)
{
	$data=[];
	foreach($field as $key=>$rs)
	{
		switch ($rs['field_type'])
		{
			case '2':
				$data[$rs['field_key']]=date('Y-m-d',$record[$rs['field_key']]);
				break;
			case '10':
				$data[$rs['field_key']]=deal_checkbox($record[$rs['field_key']],$rs['field_list']);
				break;
			case '9':
			case '11':
				$data[$rs['field_key']]=deal_defaults($record[$rs['field_key']],$rs['field_list']);
				break;
			case '13':
				$piclist=jsdecode($record[$rs['field_key']]);
				if(is_array($piclist))
				{
					$piclist=array_values($piclist);
					foreach($piclist as $kk=>$vv)
					{
						$pic=$vv['image'];
						if(!strpos($pic,"://"))
						{
							$vv['image']=$domain.$vv['image'];
							$piclist[$kk]=$vv;
						}
					}
					$piclist=str_replace(PHP_EOL,'\n',$piclist);
				}
				$data[$rs['field_key']]=$piclist;
				break;
			case '15':
				$downlist=jsdecode($record[$rs['field_key']]);
				if(is_array($downlist))
				{
					$downlist=array_values($downlist);
					foreach($downlist as $kk=>$vv)
					{
						$downurl=$vv['url'];
						if(!strpos($downurl,"://"))
						{
							$vv['url']=$domain.$vv['url'];
							$downlist[$kk]=$vv;
						}
					}
					$downlist=str_replace(PHP_EOL,'\n',$downlist);
				}
				$data[$rs['field_key']]=$downlist;
				break;
			default:
				$data[$rs['field_key']]=$record[$rs['field_key']];
				break;
		}
	}
	return $data;
}

function is_image($t0)
{
	if(isempty($t0) || is_array($t0))
	{
		return 0;
	}
	if(!strpos($t0,"."))
	{
		return 0;
	}
	if(strpos("11".$t0,"http://") || strpos("11".$t0,"https://"))
	{
		return 0;
	}
	list($a,$b)=explode('.',$t0);
	if(in_array(strtolower($b),['jpg','jpeg','gif','png','bmp']))
	{
		return 1;
	}
	else
	{
		return 0;
	}
}