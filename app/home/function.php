<?php
/**
 * 作用：前端相关函数
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#处理表单默认值
#{php:now}
#{php:get.classid}
function deal_default($a)
{
	$num=preg_match_all("/\{php:(.+?)}/",$a,$match);
	if($num)
	{
		for($i=0;$i<$num;$i++)
		{
			switch ($match[1][$i])
			{
				case 'now':
					return date('Y-m-d');
					break;
				default:
					if(strpos($match[1][$i],"."))
					{
						list($type,$val)=explode(".",$match[1][$i]);
						if($type=='get')
						{
							if(C('url_mode')==1)
							{
								return F('get.'.$val.'');
							}
							else
							{
								if(isset($_GET[$val]))
								{
									$keyword=theme_html((rawurldecode($_GET[$val])));
									$encode=mb_detect_encoding($keyword,['UTF-8','GBK','GB2312']);
									if($encode!='UTF-8')
									{
										$keyword=mb_convert_encoding($keyword,'utf-8',$encode);   
									}
									return $keyword;
								}
								else
								{
									return '';
								}
							}
						}
						elseif($type=='post')
						{
							return F($val);
						}
					}
					else
					{
						return $a;
					}
					break;
			}
		}
	}
	else
	{
		return $a;
	}
}

#首页调用自定义字段：{get_field($rs[字段key],'字段key',字段ID,$this->db)}
function get_field($val,$key,$id,$db)
{
	$base=[];
	$rs=$db->row("select * from sd_model_field where id=$id and islock=1 order by ordnum,id");
	if($rs)
	{
		$base[$key]=$rs;
		return deal_field($val,$key,$base);
	}
	else
	{
		return $val;	
	}
}