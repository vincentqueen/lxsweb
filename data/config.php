<?php
/**
 * 作用：参数配置
 * 官网：Https://www.sdcms.cn
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

return [
	#前缀
	'PREFIX'         => 'sdcms_3514',
	#后台目录：仅需修改后面部分
	'ADMIN'          => 'admin',
	#缓存目录
	'COMPILE_DIR'    => 'cache',
	#页面缓存开关
	'HTML_CACHE'     => false,
	#页面缓存目录
	'HTML_CACHE_DIR' => 'html',
	#页面缓存时间，单位分钟
	'HTML_CACHE_TIME'=> 5,
	#页面代码压缩
	'HTML_ZIP'       => false,
	#不支持Path_Info时使用的变量字符，支持时请留空
	'PATHINFO'       => '',
	#是否显示程序查询次数和内存
	'PROCESSED'     => true,
	#数据库
	'DEFAULT_DB'     => [
		#数据库类型（支持：mysql和sqlite）
		'DB_TYPE'    => 'mysql',
		#表前缀
		'DB_PREFIX'  => 'sd_',
		#Sqlite数据库名称
		'DB_NAME'  => '',
		#数据库IP
		'DB_HOST'    => '127.0.0.1',
		#数据库端口
		'DB_PORT'    => '3306',
		#数据库名称
		'DB_BASE'    => 'www_lxssm_com',
		#数据库用户名
		'DB_USER'    => 'www_lxssm_com',
		#数据库密码
		'DB_PASS'    => 'h61x6AH5ew62xnyd',
		
	]
];