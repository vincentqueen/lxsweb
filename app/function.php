<?php
/**
 * 作用：常用函数
 * 官网：Https://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

#XSS过滤
define('XSS_LIST','FSCommand|onAbort|onActivate|onAfterPrint|onAfterUpdate|onBeforeActivate|onBeforeCopy|onBeforeCut|onBeforeDeactivate|onBeforeEditFocus|onBeforePaste|onBeforePrint|onBeforeUnload|onBeforeUpdate|onBegin|onBlur|onBounce|onCellChange|onChange|onClick|onContextMenu|onControlSelect|onCopy|onCut|onDataAvailable|onDataSetChanged|onDataSetComplete|onDblClick|onDeactivate|onDrag|onDragEnd|onDragLeave|onDragEnter|onDragOver|onDragDrop|onDragStart|onDrop|onEnd|onError|onErrorUpdate|onFilterChange|onFinish|onFocus|onFocusIn|onFocusOut|onHashChange|onHelp|onInput|onKeyDown|onKeyPress|onKeyUp|onLayoutComplete|onLoad|onLoseCapture|onMediaComplete|onMediaError|onMessage|onMouseDown|onMouseEnter|onMouseLeave|onMouseMove|onMouseOut|onMouseOver|onMouseUp|onMouseWheel|onMove|onMoveEnd|onMoveStart|onOffline|onOnline|onOutOfSync|onPaste|onPause|onPopState|onProgress|onPropertyChange|onReadyStateChange|onRedo|onRepeat|onReset|onResize|onResizeEnd|onResizeStart|onResume|onReverse|onRowsEnter|onRowExit|onRowDelete|onRowInserted|onScroll|onSeek|onSelect|onSelectionChange|onSelectStart|onStart|onStop|onStorage|onSyncRestored|onSubmit|onTimeError|onTrackChange|onUndo|onUnload|onURLFlip|seekSegmentTime');

#系统资源
function C($a=null)
{
	static $_config=[];
	if(empty($a))
	{
		return $_config;
	}
	if(is_string($a))
	{
		if(!strpos($a,'.'))
		{
			$a=strtoupper($a);
			return isset($_config[$a])?$_config[$a]:null;
		}
		else
		{
			$a=explode('.',$a);
			$a[0]=strtoupper($a[0]);
			return isset($_config[$a[0]][$a[1]])?$_config[$a[0]][$a[1]]:null;
		}
	}
	if(is_array($a))
	{
		$_config=array_merge($_config,array_change_key_case($a,CASE_UPPER));
		return null;
	}
	return null;
}

#模板资源
function T($a)
{
	$b=isset(C('sys_theme_config')[$a])?C('sys_theme_config')[$a]:'';
	if($b=='') exit('【'.$a.'】模板配置不存在');
	return $b;
}

#F函数（get和post）
function F($a,$b='',$c=0)
{
	$a=strtolower($a);
	if(!strpos($a,'.'))
	{
		$method='other';
	}
	else
	{
		list($method,$a)=explode('.',$a,2);
	}
	switch ($method)
	{
		case 'get':
			$input=$_GET;
			break;
		case 'post':
			$input=$_POST;
			break;
		case 'other':
			switch (REQUEST_METHOD)
			{
				case 'GET':
					$input=$_GET;
					break;
				case 'POST':
					$input=$_POST;
					break;
				default:
					return '';
					break;
			}
			break;
		default:
			return '';
			break;
	}
	$data=isset($input[$a])?$input[$a]:$b;
	if(defined('MODULE_NAME'))
	{
		if(MODULE_NAME!=C('admin'))
		{
			$data=filter_html($data);
		}
	}
	$c=($a=="count_code")?2:0;
	if(is_string($data))
	{
		if(!in_array($a,['city_class_mid','city_content_mid']))
		{
			$data=trim($data);
		}
		$data=enhtml($data,$c);
	}
	return $data;
}

#解决部分服务器获取不到：REQUEST_URI
function getlocal()
{
	if(isset($_SERVER['REQUEST_URI']))
	{ 
		$_SERVER['REQUEST_URI']=$_SERVER['REQUEST_URI'];
	}
	elseif(isset($_SERVER['HTTP_X_REWRITE_URL']))
	{
		$_SERVER['REQUEST_URI']=$_SERVER['HTTP_X_REWRITE_URL'];
	}
	elseif(isset($_SERVER['REDIRECT_URL']))
	{ 
		$_SERVER['REQUEST_URI']=$_SERVER['REDIRECT_URL'];
	}
	elseif(isset($_SERVER['ORIG_PATH_INFO']))
	{
		$_SERVER['REQUEST_URI']=$_SERVER['ORIG_PATH_INFO'];
		if(!empty($_SERVER['QUERY_STRING']))
		{
			$_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING'];
		}
	}
	return enhtml(mb_convert_encoding($_SERVER['REQUEST_URI'],'utf-8','gbk'));
}

function filter_query($var)
{
	deal_even($var);
	return deal_str($var);
}

function deal_str($a)
{
	if(is_array($a))
	{
		foreach($a as $key=>$val)
		{
			$a[$key]=deal_str($val);
		}
	}
	else
	{
		$a=addslashes($a);
	}
	return $a;
}

#副域名处理，使用301重定向
function domain()
{
	#副域名处理，使用301重定向
	if(C('web_domain')!='' && C('web_domains')!='')
	{
		if(in_array($_SERVER['HTTP_HOST'],explode("\r\n",C('web_domains'))))
		{
			if($_SERVER['HTTP_HOST']!=C('web_domain'))
			{
				$url=THIS_URL;
				Header("HTTP/1.1 301 Moved Permanently");
				Header("Location:$url");
				exit();
			}
		}
	}
}

#是否手机域名访问
function iswap()
{
	$_ismobile=false;
	if(C('mobile_open')==1)
	{
		if(!isempty(C('mobile_domain')))
		{
			list($sys_domain)=explode(':',$_SERVER['HTTP_HOST'],2);
			if(strtolower(C('mobile_domain'))==$sys_domain)
			{
				$_ismobile=true;
			}
			unset($sys_domain);
		}
	}
	return $_ismobile;
}

#获取主域名
function getdomain()
{
	$domain='';
	if(iswap())
	{
		if(!isempty(C('mobile_domain')))
		{
			$domain=WEB_HTTP.C('mobile_domain');
		}
	}
	else
	{
		if(isempty(C('web_domain')))
		{
			$domain=WEB_URL;
		}
		else
		{
			$domain=WEB_HTTP.C('web_domain');
		}
	}
	return $domain.WEB_ROOT;
}

#去掉bom
function require_bom($a)
{
	if(!is_file($a))
	{
		exit("无法读取文件：{$a}");
	}
	$b=file_get_contents($a);
	$c[1]=substr($b,0,1);
    $c[2]=substr($b,1,1);
    $c[3]=substr($b,2,1);
	if(ord($c[1])==239&&ord($c[2])==187&&ord($c[3])==191)
	{
		$d=substr($b,3);
        file_put_contents($a,$d);
	}
	unset($b);
	unset($c);
	return (array)require($a);
}

function jsencode($a)
{
	return str_replace('\t','',json_encode($a,320));
}

function jsdecode($a,$b=0)
{
	if(isempty($a))
	{
		return false;
	}
	if($b==1)
	{
		$a=str_replace("\r","\\r",$a);
		$a=str_replace("\n","\\n",$a);
	}
	return json_decode($a,true);
}

function versiontonum($a)
{
    $b=explode(".",$a);
    if(count($b)<=2)
    {
    	return $a;
    }
    else
    {
    	$c=$b[0];
    	unset($b[0]);
    	$d=implode('',$b);
    	return (float)($c.".".$d);
    }
}

function badwords($a,$b)
{
	if(is_array($a))
	{
		foreach($a as $key => $val)
		{
			$a[$key]=badwords($val);
		}
	}
	else
	{
		$a=strtr($a,$b);
	}
	return $a;
}

#分词处理
function split_word($keyword,$type=1)
{
	return [$keyword];
}

#筛选URL
function filter_url($a,$b,$c)
{
	#如果别名为空
	if(empty($a))
	{
		if(C('url_mode')==1)
		{
			return cateurl($b).$c;
		}
		$url1=U('cate','classid='.$b);
		$url2=U('cate','classid='.$b.$c);
		$url3=cateurl($b);
		$ext=C('url_ext');
		if(strlen($ext))
		{
			$url1=substr($url1,0,strlen($url1)-strlen($ext));
			$url2=substr($url2,0,strlen($url2)-strlen($ext));
			$url3=substr($url3,0,strlen($url3)-strlen($ext));
		}
		$url=str_replace($url1,'',$url2);
		return $url3.$url.$ext;
	}
	else
	{
		$e=C('url_mid');
		$d=str_replace('=',$e,$c);
		$d=str_replace('&',$e,$d);
		#检查是否有绑定域名
		$domain=get_cate_info($b,'catedomain');
		$domain=($domain!='')?(C('category_http').$domain.WEB_ROOT):WEB_DOMAIN;
		switch(C('url_mode'))
		{
			case '1':
				return $domain."?m=$a".$c;
				break;
			case '2':
				if(isempty(C('pathinfo')))
				{
					return $domain."index.php/$a".$d.C('url_ext');
				}
				else
				{
					return $domain."index.php?".C('pathinfo')."=$a".$d.C('url_ext');
				}
				break;
			case '3':
				return $domain."$a".$d.C('url_ext');
				break;
		}
	}
}

#URL组装
function U($a='',$b='',$c=1,$d=0)
{
	return str_replace('+','%20',sdcms::geturl($a,$b,$c,$d));
}

#$d是否不显示分站信息
#$e是否使用主域名
function N($a,$b=0,$c='',$d=0,$e=0)
{
	if($b==0 || $b=='') $b=C('URL_MODE');
	if(strlen($c))
	{
		if($b==1)
		{
			$c='&'.$c;
		}
		else
		{
			$umid=C('url_mid');
			$c=str_replace(['=','&'],$umid,$c);
			$c=$umid.$c;
		}
	}
	$str='';
	$city=$GLOBALS['city']['root'];
	$isdomain=$GLOBALS['city']['isdomain'];
	$webroot=($a==C('admin'))?WEB_ROOT:WEB_DOMAIN;
	if($isdomain==1)
	{
		$webroot=WEB_ROOT;
	}
	if($e==1)
	{
		$webroot=WEB_DOMAIN;
	}
	if($e==2)
	{
		$webroot=WEB_ROOT;
	}
	if(iswap())
	{
		$webroot=WEB_ROOT;
	}
	if($city!='' && $d==0 && $isdomain==0)
	{
		if($b==1)
		{
			$str='city='.$city.'&';
		}
		else
		{
			$str=$city.C('url_mid');
		}
	}
	
	$last=C('url_cate_ext');
	switch($b)
	{
		case '1':
			if($e==1)
			{
				return $webroot.'?city='.$a;
			}
			else
			{
				return $webroot.'?'.$str.'m='.$a.$c;
			}
			break;
		case '2':
			return $webroot.'index.php'.((isempty(C('pathinfo')))?'/':('?'.C('pathinfo').'=')).$str.$a.$c.$last;
			break;
		case '3':
			return $webroot.$str.$a.$c.$last;
			break;
	}
}

function is_really_writable($file)
{
    if(is_dir($file))
    {
        $file=rtrim($file,'/').'/'.'sdcmstest.html';
        if(($fp=@fopen($file,'ab'))===FALSE)
        {
            return FALSE;
        }
        fclose($fp);
        @chmod($file,0777);
        unlink($file);
        return TRUE;
    }
    elseif(($fp=@fopen($file,'ab'))===FALSE)
    {
        return FALSE;
    }
    fclose($fp);
    return TRUE;
}

function savefile($file,$data)
{
	if(!is_really_writable($file))
	{
		return false;
	}
	else
	{
		if(@file_put_contents($file,$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

#判断是否空值
function isempty($a)
{
	return (SYSVERSION)?($a==''):(empty($a));
}


function session($a,$b='')
{
	$prefix=C('PREFIX').$a;
	if($b=='')
	{
		return isset($_SESSION[$prefix])?$_SESSION[$prefix]:null;
	}
	elseif($b=='[del]')#删除单个变量
	{
		unset($_SESSION[$prefix]);
	}
	elseif($b=='[delete]')#删除全部
	{
		session_unset();
        session_destroy();
	}
	else
	{
		$_SESSION[$prefix]=$b;
	}
}

function cookie($a,$b='')
{
	$prefix=C('PREFIX').$a;
	if($b=='')
	{
		return isset($_COOKIE[$prefix])?$_COOKIE[$prefix]:null;
	}
	elseif($b=='[del]')
	{
		setcookie($prefix,'',time()-1,'/','','');
	}
	else
	{
		setcookie($prefix,$b,time()+86400,'/','','');
	}
}

function theme_html($a)
{
	return str_replace(['&',"'",'"','<','>'],['&amp;','&#39;','&#34;','&lt;','&gt'],$a);
}

function enhtml($a,$b=0)
{
	if(is_array($a))
	{
		foreach($a as $key=>$val)
		{
			$a[$key]=enhtml($val,$b);
		}
	}
	else
	{
		$a=($a!='')?$a:'';
		$a=str_replace(["+","/"],["jiaplus","slantingbar"],$a);
		$a=urldecode($a);
		$a=preg_replace('/^\\\\|\.\.\/|\.\/|&colon;|base64_______/i','',$a);
		$a=preg_replace('/&#([0-9]{1,3})/','',$a);
		$a=htmlspecialchars(stripslashes($a),ENT_QUOTES,'UTF-8');
		if($b>=1)
		{
			$a=str_replace(["&lt;","&gt;","&quot;"],["<",">","\""],$a);
		}
		if(defined('CONTROLLER_NAME'))
		{
			if((CONTROLLER_NAME."-".ACTION_NAME)!='theme-edit')
			{
				if($b!=2)
				{
					$a=preg_replace('/<script[\s\S]*?/i','',$a);
				}
			}
		}
		$a=preg_replace('/('.XSS_LIST.')=/i','',$a);
		$a=str_replace(["jiaplus","slantingbar","&amp;"],["+","/","&"],$a);
		return $a;
	}
}

function dehtml($a)
{
	return htmlspecialchars_decode($a);
}

function nohtml($a)
{
	if(is_string($a))
	{
		$a=dehtml($a);
		$a=str_replace('_sdcms_content_page_','',$a);
		$a=str_replace('　','',$a);
		$a=str_replace('	','',$a);
		$a=str_replace("\r\n",'',$a);
		$a=preg_replace("@<style(.*?)</style>@is",'',$a);
		$a=trim(strip_tags($a));
	}
	return $a;
}

function filter_html($a)
{
	if(is_array($a))
	{
		foreach($a as $key=>$val)
		{
			$a[$key]=filter_html($val);
		}
		return $a;
	}
	else
	{
		$a=preg_replace(["/<(\/?)(script|iframe|applet|meta|xml|blink|link|style|embed|object|layer|bgsound|base|\?|\%)([^>]*?)>/isU"],'',$a);
		return $a;
	}
}

function deal_even($a)
{
	if(is_array($a))
	{
		if(count($a)==0)
		{
			return;
		}
		foreach($a as $key=>$val)
		{
			$a[$key]=deal_even($val);
		}
	}
	else
	{
		$a=addslashes($a);
		$a=urldecode($a);
		$html=rawurldecode(htmlspecialchars_decode($a));
		$html=preg_replace('/&#([0-9]{1,3})/','',$html);
		$html=rawurldecode(htmlspecialchars_decode($a));
		$num=preg_match_all("/\<([\w.]+)(.*?)\>/s",$html,$match);
		$res='';
		if($num)
		{
			for($i=0;$i<$num;$i++)
			{
				$param=$match[2][$i];
				$n=preg_match_all('/('.XSS_LIST.')=(.*?)/i',$param,$m);
				if($n>0)
				{
					$res=($m[1][0]);
					break;
				}
				$n=preg_match_all('/(alert\(|eval\(|expression\(|prompt\(|base64\(|vbscript\(|msgbox\(|unescape\()/i',$param,$m);
				if($n>0)
				{
					$res=($m[1][0]);
					break;
				}
			}
		}
		if($res!='')
		{
			echo jsencode(['state'=>'error','msg'=>'请勿提交非法参数：'.$res]);
			exit();
		}
		$res=check_bad($html);
		if($res!='')
		{
			echo jsencode(['state'=>'error','msg'=>'请勿提交非法参数'.$res]);
			exit();
		}
	}
}

function check_bad($str)
{
	$num=preg_match_all("/(phpinfo\(|php:\/\/|zip:\/\/|zlib:\/\/|bzip2:\/\/|phar:\/\/|file:\/\/|data:\/\/|eval\(|getcwd\(|=\`ls\`|error_reporting\(|\)goto|proc_close\(|proc_nice\(|proc_terminate\(|escapeshellarg\(|escapeshellcmd\(|set_time_limit\(|base64_decode\(|require\(|include_once\(|require_once\(|pack\(|str_rot13\(|system\(|eval\(|request\[|execute\(|savefile\(|file_put_contents\(|file_get_contents\(|exec\(|chroot\(|scandir\(|chgrp\(|chown\(|shell_exec\(|pcntl_exec\(|proc_open\(|popen\(|fget\(|putenv\(|proc_get_status\(|error_log\(|pfsockopen\(|syslog\(|readlink\(|fscanf\(|symlink\(|stream_socket_server\(|preg_replace\(|delfolder\(|unlink\(|mkdir\(|fopen\(|fread\(|fwrite\(|fputs\(|tmpfile\(|flock\(|load_file\(|outfile\(|chmod\(|fflush\(|fputcsv\(|delete\(|payload\(|fclose\(|copy\(|feof\(|fgetc\(|fgets\(|assert\(|cmdshell\(|wshshell\(|show_source\(|parse_ini_file\(|_post\[|_get\[|_file\(|create_function\(|call_user_func\(|call_user_func_array\(|passthru\(|array_walk|getenv\(|register_|escapeshellcmd\(|rmdir\(|rename\(|readfile\(|array_filter|array_flip|var_dump\(|array_merge\(|shell_|parse_str\(|extract\(|get_defined_vars\(|get_defined_constants\(|get_include_files\(|glob\(|array_map\(|ob_start\(|is_numeric\(|ini_get\(|ini_set\(|ini_alter\(|ini_restore\(|import_|move_uploaded_file\(|get_included_files\(|SplFileObject\(|SplFileInfo)/Ui",str_replace(["'.'","\".\""],"",$str),$match);
	if($num>0)
	{
		return $match[0][0];
	}
	$num=preg_match_all('/\\$([\w])\.\\$([\w])/',$str,$match);
	if($num>0)
	{
		return $match[0][0];
	}
	return '';
}

function getint($a,$b=0)
{
	if(is_array($a))
	{
		$a=implode($a);
	}
	$c=($a!='')?(!preg_match("/^[-0-9.]+$/",$a))?$b:substr($a,0,11):$b;
	return floatval($c);
}

function iif($a,$b,$c)
{
	return $a?$b:$c;
}

#cutstr函数
function cutstr($a,$b,$c=0)
{
	$d=mb_strcut($a,0,$b,'UTF8');
	if(strlen($a)>$b&&$c==1) $d.='…';
	return $d;
}

#getip函数
function getip($type=0)
{
	$ip='';
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
    	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
	elseif(isset($_SERVER['HTTP_X_REAL_IP'])) 
	{
        $ip=$_SERVER['HTTP_X_REAL_IP'];
    }
    elseif(isset($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_ALI_CDN_REAL_IP']))
    {
        $ip=$_SERVER['HTTP_ALI_CDN_REAL_IP'];
    }
    if($ip=='' || strpos($ip,":"))
    {
    	$ip=$_SERVER['REMOTE_ADDR'];
    }
    $arr=explode(',',$ip);
    $ip=enhtml(nohtml(trim($arr[0])));
    return filter_var($ip,FILTER_VALIDATE_IP)?$ip:'0.0.0.0';
}

#跳转
function gourl($url,$time=0,$msg='')
{
	$msg=(isempty($msg))?"系统将在{$time}秒之后自动跳转到【{$url}】":$msg;
	if($time===0)
	{
		header('Location:'.$url);
		exit();
	}
	else
	{
		header("refresh:{$time};url={$url}");
		echo $msg;
	}
}

#发邮件
function send_mail($a,$b,$c)
{
	$mail=new sdcms_mail();
	return $mail->send($a,$b,$c);
}

function ismobile()
{
	if(isweixin())
	{
		#return true;
	}
    if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    }
    if(isset($_SERVER['HTTP_VIA']))
    {
    	if(strpos($_SERVER['HTTP_VIA'],"wap"))
        {
        	return true;
        }
    }
    if(isset($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ("android","phone","ipod","mqqbrowser","blackberry","nokia","windowsce","symbian","lg","ucweb","skyfire","webos","incognito","blackberry","mobile","bada"); 
        if(preg_match("/(".implode('|', $clientkeywords).")/i",strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        }
	}
    if(isset($_SERVER['HTTP_ACCEPT']))
    { 
        if((strpos($_SERVER['HTTP_ACCEPT'],'vnd.wap.wml')!==false)&&(strpos($_SERVER['HTTP_ACCEPT'],'text/html')===false||(strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml')<strpos($_SERVER['HTTP_ACCEPT'],'text/html'))))
        {
            return true;
        }
    }
    return false;
}

#是否微信浏览器
function isweixin()
{
	if(isset($_SERVER['HTTP_USER_AGENT']))
	{
		return (bool)(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'micromessenger'));	
	}
	else
	{
		return false;
	}
}

#是否Ipad
function isipad()
{
	if(isset($_SERVER['HTTP_USER_AGENT']))
	{
		return (bool)(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'ipad'));
	}
	else
	{
		return false;
	}
}

#是否mp4视频
function is_video($a)
{
	return (strtolower(substr($a,-4))=='.mp4')?1:0;
}

#获取内容中所有图片，返回数组
function get_all_picurl($a,$b='')
{
	#去掉反斜杠
	$a=stripslashes($a);
	$num=preg_match_all('/<img.*?src="(.*?)".*?>/is',$a,$match);
	if($num)
	{
		$d=[];
		for($i=0;$i<$num;$i++)
		{
			if(isempty($b))
			{
				$d[$i]=$match[1][$i];
			}
			else
			{
				if(!strpos($match[1][$i],$b)&&strpos($match[1][$i],"://"))
				{
					$d[$i]=$match[1][$i];
				}
			}
		}
		return array_unique($d);
	}
	else
	{
		return '';
	}
}

#处理筛选参数
function deal_filter($data,$field,$default)
{
	$str='';
	foreach($data as $key=>$val)
	{
		if($key!=$field)
		{
			$str.='&'.$key.'='.$val.'';
		}
		else
		{
			$str.='&'.$key.'='.$default.'';
		}
	}
	return $str;
}

#文件单位
function formatBytes($size)
{ 
	$units=array('B','K','M','G','TB'); 
	for($i=0;$size>=1024&&$i<4;$i++)
	{
		$size/=1024;
	}
	return round($size,2).' '.$units[$i]; 
}

#创建文件夹(无限级)
function mkfolder($a)
{
	if(!is_dir($a))
	{
		return mkdir($a,0777,true);
	}
}

#删除文件夹(包含子目录)
function delfolder($a)
{
    $a=str_replace('','/',$a);
    $a=substr($a,-1)=='/'?$a:$a.'/';
    if(!is_dir($a))
    {
        return false;
    }
    $b=opendir($a);
    while(false!==($file=readdir($b)))
    {
        if($file=='.'||$file=='..')
        {
            continue;
        }
        if(!is_dir($a.$file))
        {
            unlink($a.$file);
        }
        else
        {
            delfolder($a.$file);
        }
    }
    closedir($b);
    return rmdir($a);
}

#生成缩略图
function thumb($file,$width=200,$height=200,$type=1)
{
	if($type==0 || C('thumb_auto')==0)
	{
		return $file;
	}
	if(isempty($file))
	{
		return '';
	}
	if(strpos($file,'://'))
	{
		return $file;
	}
	if(preg_match(WEB_ROOT."upfile(.*)\$/",$file,$matches))
    {
        $file=$matches[0];
    }
    else
    {
    	return $file;
    }
    if(!file_exists(SYS_PATH.$file))
    {
    	return WEB_ROOT.$file;
    }
    $newpic=dirname($file).'/thumb_'.$width.'_'.$height.'_'.basename($file);
    if(!file_exists(SYS_PATH.$newpic)||filemtime(SYS_PATH.$newpic)<filemtime(SYS_PATH.$file))
    {
    	$image=new sdcms_image();
    	return $image->thumb($file,$width,$height,$newpic);
    }
    return WEB_ROOT.$newpic;
}

#数据库相关
function sysdb($a)
{
	return C($a=strtoupper($a));
}

function getword($db)
{
	$rs=$db->row("select words from sd_badword where id=1 limit 1");
	if(!isempty($rs['words']))
	{
		$data=explode('@@',$rs['words']);
		$dt=[];
		foreach($data as $key => $val)
		{
			list($a,$b)=explode('|',$val);
			$dt[$a]=$b;
		}
		return $dt;
	}
	else
	{
		return [];
	}
}

function get_model_field($id,$where,$db)
{
	$rs=$db->load("select * from sd_model_field where model_id=$id and islock=1 $where order by ordnum,id");
	return ($rs)?$rs:'';
}

function get_extent_field($id,$db)
{
	$rs=$db->load("select * from sd_extend_field where eid=$id and islock=1 order by ordnum,id");
	return ($rs)?$rs:[];
}

function mail_temp($id,$key,$db)
{
	$where='where islock=1 and ';
	if($key=='')
	{
		$where.="id=$id";
	}
	else
	{
		$where.="mkey='$key'";
	}
	$rs=$db->row("select mail_title,mail_content from sd_temp_mail $where");
	if($rs)
	{
		return $rs;
	}
	else
	{
		return [];
	}
}

function add_city($str,$type)
{
	$city=$GLOBALS['city']['name'];
	if($type==1 && C('city_class')==1 && C('city_open')==1)
	{
		return $city.C('city_class_mid').$str;
	}
	if($type==2 && C('city_content')==1 && C('city_open')==1)
	{
		return $city.C('city_content_mid').$str;
	}
	if($type==3)
	{
		return str_replace('{$city}',$city,$str);
	}
	return $str;
}

function is_active($classid,$pid=0,$style=' class="hover"',$type=0)
{
	if($style!=' class="hover"')
	{
		$style=' class="'.$style.'"';
	}
	if($type==1)
	{
		$style=str_replace(["class=","\""],'',$style);
	}
	return(in_array($classid,explode(',',$pid)))?$style:'';
}

function get_cate_info($id,$field,$default='')
{
	$arr=C('category');
	$a=isset($arr[$id])?($arr[$id][$field]?$arr[$id][$field]:$default):$default;
	if($field=='cate_extend')
	{
		$a=getint($a);
	}
	return $a;
}

#获取栏目父ID
function get_followid($id)
{
	return get_cate_info($id,'followid',0);
}

#获取栏目名称
function get_catename($id,$val='')
{
	return get_cate_info($id,'catename',$val);
}

#获取栏目别名
function get_catealias($id)
{
	if(get_cate_info($id,'catetype')==-2)
	{
		return '';
	}
	return get_cate_info($id,'cateurl');
}

#获取某一分类的子类数量
function get_sonid_num($id)
{
	return get_cate_info($id,'child',0);
}

#查找某一分类的所有子类
function get_sonid_all($id)
{
	$str='';
	$dt=explode(',',$id);
	foreach($dt as $key => $val)
	{
		$str.=','.get_cate_info($val,'sonid',$val);
	}
	return trim($str,',');
}

#查找某一分类的所有父类
function get_tree_parent($id)
{
	return get_cate_info($id,'parent',$id);
}

function get_cate_self($t0,$t1,$t2,$t3)
{
	if($t0!="")
	{
		return $t0;
	}
	else
	{
		if(get_cate_info($t1,'catetype')==-2)
		{
			return '';
		}
		$t4=get_cate_info($t1,$t2);
		if(strlen($t4))
		{
			return $t4;
		}
		else
		{
			return $t3;
		}
	}
}

#递归获取类别的别名
function getalias($c)
{
	$a=get_catealias($c);
	$b=get_followid($c);
	if($a!='')
	{
		return $a;
	}
	else
	{
		return ($b!=0)?getalias($b):'';
	}
}

#栏目URL
function cateurl($a)
{
	$cate=C('category');
	$a=(string)$a;
	if(!isset($cate[$a]))
	{
		return '';
	}
	$d=$cate[$a];
	$b=(is_array($d))?$d['cateurl']:'';
	$c=0;
	$e=$d['catedomain'];
	if(!isempty($e) && !ismobile())
	{
		$city=$GLOBALS['city']['root'];
		$isdomain=$GLOBALS['city']['isdomain'];
		if($city!='')
		{
			$e.='/'.$city.C('url_mid');
		}
		return C('category_http').$e;
	}
	if(is_array($d))
	{
		if($d['catetype']=='-2')
		{
			$arr=['book','city','sitemap','tags','bbs','user','reg','login','out'];
			if(in_array($d['cateurl'],$arr))
			{
				return N($d['cateurl']);
			}
			return $d['cateurl'];
		}
	}
	return link_url($a,$b,0,1);
}

#内容URL
function showurl($a,$b='',$c=0)
{
	return link_url($a,$b,$c,2);
}

#$a：栏目或内容ID
#$b：别名
#$c：内容的栏目ID
#$d：（1：栏目，2：内容）
function link_url($a,$b,$c,$d)
{
	$webroot=WEB_DOMAIN;
	$city=$GLOBALS['city']['root'];
	$isdomain=$GLOBALS['city']['isdomain'];
	$cityroot='';
	if($city!='')
	{
		if($isdomain==0)
		{
			if(C('url_mode')==3)
			{
				$webroot.=$city.C('url_mid');
			}
			if(C('url_mode')==2)
			{
				$cityroot=$city.C('url_mid');
			}
		}
		else
		{
			$webroot=WEB_ROOT;
		}
	}
	#$b是别名
	if(isempty($b))
	{
		if($d==1)
		{
			#获取栏目
			if(C('url_mode')==1)
			{
				return U('home/index/cate','classid='.$a.'');
			}
			else
			{
				if(!isempty(C('url_list')))
				{
					$prefix='';
					if(C('url_mode')==2)
					{
						$prefix=isempty(C('pathinfo'))?'index.php/':'index.php?'.C('pathinfo').'=';
					}
					$domain=get_cate_info($a,'catedomain');
					$pid=explode(',',get_tree_parent($a));
					#获取顶级分类ID
					$topid=$pid[0];
					$domain=get_cate_self($domain,$topid,'catedomain','');
					if($domain=='')
					{
						$domain=$webroot;
					}
					else
					{
						$domain=C('category_http').$domain.WEB_ROOT;
						if($city!='')
						{
							if($isdomain==0)
							{
								$domain.=$city.C('url_mid');
							}
							else
							{
								$domain=$webroot;
							}
						}
					}
					if(iswap())
					{
						$domain=WEB_ROOT;
					}

					return $domain.$prefix.$cityroot.C('url_list').C('url_mid').$a.C('url_ext');
				}
				else
				{
					return U('home/index/cate','classid='.$a.'');
				}
			}
		}
		else
		{
			if(C('url_mode')==1)
			{
				return U('home/index/show','id='.$a.'');
			}
			else
			{
				#获取内容所在类别的别名
				#$alias=get_cate_info($c,'cateurl',0);
				$alias=getalias($c);

				$domain=get_cate_info($c,'catedomain');
				$pid=explode(',',get_tree_parent($c));
				#获取顶级分类ID
				$topid=$pid[0];
				#如果当前栏目没有别名，则获取顶级栏目的别名，如果顶级栏目没有别名，则调用系统内容的映射
				$alias=get_cate_self($alias,$topid,'cateurl',C('url_show'));

				if(get_cate_info($topid,'catetype',0)==-2 && $alias=='')
				{
					$alias=C('url_show');
				}

				$domain=get_cate_self($domain,$topid,'catedomain','');
				if($domain=='')
				{
					$domain=$webroot;
				}
				else
				{
					$domain=C('category_http').$domain.WEB_ROOT;
					if($city!='')
					{
						if($isdomain==0)
						{
							$domain.=$city.C('url_mid');
						}
						else
						{
							$domain=$webroot;
						}
					}
				}
				if(iswap())
				{
					$domain=WEB_ROOT;
				}
				if(!isempty($alias))
				{
					$prefix='';
					if(C('url_mode')==2)
					{
						$prefix=isempty(C('pathinfo'))?'index.php/':'index.php?'.C('pathinfo').'=';
					}
					return $domain.$prefix.$cityroot.$alias.C('url_mid').$a.C('url_ext');
				}
				else
				{
					return U('home/index/show','id='.$a.'');
				}
			}
		}
	}
	else
	{
		$ext=C('url_cate_ext');
		$domain=get_cate_info($a,'catedomain','');
		$pid=explode(',',get_tree_parent(($d==2)?$c:$a));
		#获取顶级分类ID
		$topid=$pid[0];
		$domain=get_cate_self($domain,$topid,'catedomain','');
		if($domain=='')
		{
			$domain=$webroot;
		}
		else
		{
			$domain=C('category_http').$domain.WEB_ROOT;
		}
		if(iswap())
		{
			$domain=WEB_ROOT;
		}
		switch (C('url_mode'))
		{
			case '1':
				if($city!='' && $isdomain==0)
				{
					return $domain."?city=$city&m=$b";
				}
				else
				{
					return $domain."?m=$b";
				}
				break;
			case '2':
				if(C('pathinfo')=='')
				{
					return $domain."index.php/$cityroot$b$ext";
				}
				else
				{
					return $domain."index.php?".C('pathinfo')."=$cityroot$b$ext";
				}
				break;
			default:
				return $domain."$b$ext";
				break;
		}
	}
}

#处理副栏目查询
function deal_subid($subid)
{
	$str='';
	if(!empty($subid))
	{
		$arr=explode(',', $subid);
		foreach ($arr as $key=>$val)
		{
			$val=",".$val.",";
			if($str=='')
			{
				$str.=" subid like binary '%$val%'";
			}
			else
			{
				$str.=" or subid like binary '%$val%'";
			}
		}
		if(!isempty($str))
		{
			$str=" or ($str)";
		}
	}
	return $str;
}

#内容分页
function pagelist($a,$b=0,$c=5)
{
	if($b<=1)
	{
		return '';
	}
	$page=new sdcms_page($a,$b,20,$a);
	return $page->pageList($c);
}

function deal_sqlite($sql)
{
	if(!DB_TYPE)
	{
		$sql=str_replace('into','\u0069\u006e\u0074\u006f',$sql);
		$sql=str_replace('NOT NULL AUTO_INCREMENT','PRIMARY KEY AUTOINCREMENT NOT NULL',$sql);
		$sql=str_replace('ENGINE=MyISAM DEFAULT CHARSET=utf8','',$sql);
		$sql=preg_replace("/,PRIMARY KEY \((.*?)\)/s",'',$sql);
		$sql=str_replace(['varchar','mediumtext'],'TEXT',$sql);
		$sql=preg_replace("/ (int|smallint|tinyint|decimal)(.*?) /s",' INTEGER ',$sql);
		$sql=str_replace('\u0069\u006e\u0074\u006f','into',$sql);
	}
	return $sql;
}

#列表自定义字段使用
function deal_field($a,$b,$c)
{
	if(isset($c[$b]))
	{
		$rs=$c[$b];
		switch ($rs['field_type'])
		{
			case '2':#日期
				return date('Y-m-d',$a);
				break;
			case '10':#复选框
				return deal_checkbox($a,$rs['field_list']);
				break;
			case '9':#单选按钮
			case '11':#下拉列表
				return deal_defaults($a,$rs['field_list']);
				break;
			default:
				return $a;
				break;
		}
	}
	else
	{
		return $a;
	}
}

#内容页自定义字段相关
function deal_field_show($field,$record)
{
	$data=[];
	foreach($field as $key=>$rs)
	{
		switch ($rs['field_type'])
		{
			case '2':#日期
				$data[$rs['field_title']]=date('Y-m-d',$record[$rs['field_key']]);
				break;
			case '10':#复选框
				$data[$rs['field_title']]=deal_checkbox($record[$rs['field_key']],$rs['field_list']);
				break;
			case '9':#单选按钮
			case '11':#下拉列表
				$data[$rs['field_title']]=deal_defaults($record[$rs['field_key']],$rs['field_list']);
				break;
			case '13':#组图
				$data[$rs['field_title']]=deal_piclist($record[$rs['field_key']]);
				break;
			case '15':#下载
				$data[$rs['field_title']]=deal_downlist($record[$rs['field_key']]);
				break;
			default:
				$data[$rs['field_title']]=$record[$rs['field_key']];
				break;
		}
	}
	return $data;
}

function deal_checkbox($a,$b)
{
	$r='';
	$c=explode(',',$b);
	foreach($c as $key=>$val)
	{
		list($d,$e)=explode('|', $val);
		if(strpos('-_-,'.$a.',',','.$e.','))
		{
			$r.=$d.' ';
		}
	}
	return $r;
}

function deal_defaults($a,$b)
{
	$c=explode(',',$b);
	foreach($c as $key=>$val)
	{
		list($d,$e)=explode('|', $val);
		if($e==$a)
		{
			return $d;
		}
	}
}

function deal_piclist($a)
{
	$str='';
	$b=jsdecode($a);
	if(is_array($b))
	{
		foreach($b as $key=>$val)
		{
			$str.='<a href="'.$val['image'].'" class="ui-lightbox"><img src="'.$val['image'].'"></a><br>';
		}
	}
	return $str;
}

function deal_downlist($a)
{
	$str='';
	$b=jsdecode($a);
	if(is_array($b))
	{
		foreach($b as $key=>$val)
		{
			$str.='<a href="'.$val['url'].'" target="_blank">'.$val['name'].'</a><br>';
		}
	}
	return $str;
}

#以下为自定义表单使用
function deal_rule($a,$b,$c=0)
{
	$d='';
	switch ($a) 
	{
		case '1':
			$d='null';
			break;
		case "2":
			$d='date';
			break;
		case "3":
			$d='int';
			break;
		case "4":
			$d='dot';
			break;
		case "5":
			$d='tel';
			break;
		case "6":
			$d='mobile';
			break;
		case "7":
			$d='email';
			break;
		case "8":
			$d='zipcode';
			break;
		case "9":
			$d='qq';
			break;
		case "10":
			$d='url';
			break;
		case "11":
			$d='username';
			break;
		case "12":
			$d='password';
			break;
		case "13":
			$d='idcard';
			break;
	}
	if($d=='')
	{
		return '';
	}
	else
	{
		$d=str_replace('null','',$d);
		if($c==0)
		{
			return 'data-rule="'.$b.':required;'.$d.'"';
		}
		else
		{
			return 'data-rule="'.$b.':checked;'.$d.'"';
		}
	}
}

#后台相关
function is_admin()
{
	$info=session('admin_info');
	return (isempty($info)?0:$info['adminid']);
}

function get_admin_info($a)
{  
	$info=session('admin_info');
	return (isempty($info)?'':$info[$a]);
}

#会员相关
function is_user()
{
	$info=session('user_info');
	return (empty($info)?0:$info['id']);
}

function get_user_info($a)
{  
	$info=session('user_info');
	return $info[$a];
}

#字符串加密解密
function authcode($string,$type='D',$key='',$expiry=0)
{
	$ckey_length=4;
	$key=md5($key);
	$keya=md5(substr($key,0,16));
	$keyb=md5(substr($key,16,16));
	$keyc=$ckey_length?($type=='D'?substr($string,0,$ckey_length):substr(md5(microtime()),-$ckey_length)):'';
	$cryptkey=$keya.md5($keya.$keyc);
	$key_length=strlen($cryptkey);
	$string=$type=='D'?base64_decode(substr($string,$ckey_length)):sprintf('%010d',$expiry?$expiry+time():0).substr(md5($string.$keyb),0,16).$string;
	$string_length=strlen($string);
	$result='';
	$box=range(0,255);
	$rndkey=array();
	for($i=0;$i<=255;$i++)
	{
		$rndkey[$i]=ord($cryptkey[$i%$key_length]);
	}
	for($j=$i=0;$i<256;$i++)
	{
		$j=($j+$box[$i]+$rndkey[$i])%256;
		$tmp=$box[$i];
		$box[$i]=$box[$j];
		$box[$j]=$tmp;
	}
	for($a=$j=$i=0;$i<$string_length;$i++)
	{
		$a=($a+1)%256;
		$j=($j+$box[$a])%256;
		$tmp=$box[$a];
		$box[$a]=$box[$j];
		$box[$j]=$tmp;
		$result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
	}
	if($type=='D')
	{
		if((substr($result,0,10)==0||substr($result,0,10)-time()>0)&&substr($result,10,16)==substr(md5(substr($result,26).$keyb),0,16))
		{
			return substr($result,26);
		}
		else
		{ 
			return '';
		}
	}
	else
	{  
		return $keyc.str_replace('=','',base64_encode($result));
	}
}

#时间显示
function formatTime($time)
{     
	$rtime=date("Y-m-d",$time);
	$htime=date("H:i",$time);           
	$time=time()-$time;       
	if($time<60)
	{         
		$str='刚刚';     
	}
	elseif($time<60*60)
	{         
		$min=floor($time/60);         
		$str=$min.'分钟前';     
	}
	elseif($time<60*60*24)
	{         
		$h=floor($time/(60*60));         
		$str=$h.'小时前';     
	}
	elseif($time<60*60*24*3)
	{         
		$d=floor($time/(60*60*24));         
		if($d==1)
		{
			$str='昨天 '.$htime;
		}
		else
		{
			$str='前天 '.$htime;     
		}
	}
	else
	{         
		$str=$rtime;     
	}     
	return $str; 
}

#过滤网址中的域名
function filter_domain($url)
{
	$domain=(strlen(C('web_domain'))?C('web_domain'):$_SERVER['HTTP_HOST']);
	$url=str_replace(['http://','https://',$domain],'',$url);
	return $url;
}

function filter_nickname($str)
{
    preg_match_all('/[\x{4e00}-\x{9fa5}a-zA-Z0-9]/u',$str,$result);
    return implode('',$result[0]);
}

#运行时间
function runtime()
{
	$GLOBALS['end']=['0'=>microtime(true),'1'=>memory_get_usage()];
	return 'Processed in '.number_format(($GLOBALS['end'][0]-$GLOBALS['begin'][0]),6).' s , Memory '.formatBytes(($GLOBALS['end'][1]-$GLOBALS['begin'][1])).' , '.$GLOBALS['query'].' queries';
}

#5.4版本不支持此函数
if(!function_exists('curl_file_create'))
{
    function curl_file_create($filename,$mimetype='',$postname='')
    {
        return "@$filename;filename=".($postname?:basename($filename)).($mimetype?";type=$mimetype":'');
    }
}