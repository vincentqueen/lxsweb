<?php
/**
 * 控制器
 * By IT平民
**/

class PlugController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$plugname=PLUG_NAME;
		$this->tp->isCache=false;
		$this->tp->skinDir="app/plug/$plugname/view/";
		$this->tp->cacheDir="app/plug/$plugname/html/";
		$this->tp->compileDir=C('COMPILE_DIR')."/plug/$plugname/";
	}

	public function display($a,$b='')
	{
		if(F('get.token')!='' && ACTION_NAME=='move')
		{
			$token=F('get.token');
		}
		else
		{
			$token=md5(uniqid('',true));
		}
		session('_token_plug_',$token);
		$this->assign("token",$token);
		$this->tp->display($a,$b);
	}

	public function check_admin()
	{
		if(ADMIN_ID==0)
		{
			die('没有管理权限');
		}
		#是否后台只读模式
		define('APP_DEMO',(get_admin_info('readonly')==1?true:false));
		if(getint(get_admin_info('pid'),0)!=0)
		{
			define('PAGE_LEVER',get_admin_info('page_list'));
			if(strlen(PAGE_LEVER)==0)
			{
				die('没有管理权限');
			}
			else
			{
				$rs=$this->db->load("select cname from sd_admin_menu where followid>0 and id in(".PAGE_LEVER.")");
				if($rs)
				{
					$mname=C('ADMIN');
					foreach($rs as $key=>$value)
					{
						$rs[$key]=$mname.'/'.$value['cname'];
					}
					if(!(in_array(''.$mname.'/plug',$rs)))
					{
						die('没有管理权限');
					}
				}
			}
		}
	}

	public function _before_action()
	{
		if(IS_POST && defined('APP_DEMO'))
		{
			if(APP_DEMO)
			{
				$this->success('操作成功！！');
				exit();
			}
		}
	}

}