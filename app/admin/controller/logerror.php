<?php
/**
 * 作用：错误日志
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class LogError extends AdminsController
{
	public function index()
	{
		$root='data/log';
		$db=self::deal_arr(scandir($root),$root);
		$this->assign('db',$db[0]);
		$this->display("system/error.php");
	}

	public function view()
	{
		$key=$this->decode(F('key'));
		$key=str_replace('..','',$key);
		if(!is_file('data/log/'.$key))
		{
			echo '日志文件名错误';
		}
		else
		{
			echo file_get_contents('data/log/'.$key);
		}
	}

	public function del()
	{
		$key=$this->decode(F('get.key'));
		$key=str_replace('..','',$key);
		@unlink('data/log/'.$key);
		$this->success('删除成功');
	}

	public function clear()
	{
		$root='data/log';
		$db=self::deal_arr(scandir($root),$root);
		foreach ($db[0] as $rs)
		{
			@unlink($root.'/'.$rs[0]);
		}
		$this->success('清理成功');
	}
	
	public function deal_arr($data,$root)
	{
		if(!$data)
		{
			die('【scandir】函数不支持，请在Php.ini中找到去掉限制');
		}
		unset($data[0]);unset($data[1]);
		$a=[];
		foreach ($data as $key=>$val)
		{
			if(is_file($root.'/'.$val))
			{
				$time=filemtime($root.'/'.$val);
				$a[$time]=['0'=>iconv("gb2312","utf-8",$val),'1'=>$time,'2'=>formatBytes(filesize($root.'/'.$val))];
				$a[$time][3]=$this->encode($a[$time][0]);
			}
			else
			{
				unset($data[$key]);
			}
		}
		return ['0'=>$a];
	}
}