<?php
/**
 * 作用：微信免签-公众号支付
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#加载核心文件
require '../../api.php';
require '../weixin.php';

function decode($a,$b='')
{
    $pre=($b!='')?$b:C('prefix');
    $a=jsdecode(authcode($a,'D',$pre));
    $a=$a?$a:[];
    return $a;
}

if(!isweixin())
{
    echo '请在微信下访问';
    return '';
}

if(session('pay_openid')=='')
{
    if(F('get.openid')=='')
    {
        $url="https://pay.sdcms.net/?backkey=freepay&backurl=".WEB_URL.THIS_LOCAL;
        gourl($url);
        return;
    }
    else
    {
        $openid=F('get.openid');
        session('pay_openid',$openid);
    }
}
gourl("api.php");