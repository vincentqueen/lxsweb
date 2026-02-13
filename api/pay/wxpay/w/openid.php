<?php
/**
 * 作用：微信公众号支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../wxpay.php';

$type=getint(F('get.type'),0);
session("lasttype",$type);
if(session('wx_lasturl')=='')
{
	session('wx_lasturl',PRE_URL);
}
$wx=new sdcms_weixin();
$wx->openid($type);