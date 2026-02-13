<?php
/**
 * 作用：Http类
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

final class sdcms_http
{
	public function __construct()
	{
		if(!function_exists('curl_init'))
	    {
			exit('curl_init函数未开启，请检查');
	    }
	}
	
	public static function get($url,$type=0,$timeout=30,$head='')
	{
		$head=($head=='')?FALSE:$head;
		$ch=curl_init();
		#设置超时
		curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
		//Url
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch,CURLOPT_HEADER,false);
		$header=['User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.54'];
		if(empty($head))
		{
			$head=$header;
		}
		#设置header
		curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		#要求结果为字符串且输出到屏幕上
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		$result=curl_exec($ch);
		$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($type==1)?['state'=>$code,'msg'=>$result]:$result;
	}

	public static function state($url)
	{
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_TIMEOUT,30);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		#要求结果为字符串且输出到屏幕上
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		$result=curl_exec($ch);
		$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $code;
	}


	public static function post($url,$data,$type=0,$timeout=30,$head='')
	{
		$head=($head=='')?[]:$head;
		$ch=curl_init();
		#设置超时
		curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
		#Url
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		#设置header
		curl_setopt($ch,CURLOPT_HEADER,false);
		curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
		#要求结果为字符串且输出到屏幕上
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		#post提交方式
		curl_setopt($ch,CURLOPT_POST,TRUE);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		$result=curl_exec($ch);
		$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($type==1)?['state'=>$code,'msg'=>$result]:$result;
	}

	public static function del_oss($url,$head)
	{
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$head);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
        $result=curl_exec($ch);
        curl_close($ch);
		return $result;
	}

	public static function del_qiniu($url,$head)
	{
		$ch=curl_init();
		$options=array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_URL => $url,
        );
        $headers=[];
        foreach ($head as $key => $val)
        {
            array_push($headers,"$key: $val");
        }
        $options[CURLOPT_HTTPHEADER]=$headers;
        curl_setopt_array($ch,$options);
        $result=curl_exec($ch);
        $code=curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ['state'=>$code,'msg'=>$result];
	}
	
}