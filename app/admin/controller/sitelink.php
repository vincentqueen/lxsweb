<?php
/**
 * 作用：内链管理
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Sitelink extends AdminsController
{
	public function switchs()
	{
		$id=getint(F('get.id'),0);
		$islock=getint(F('islock'),0);
		$rs=$this->db->row("select id from sd_sitelink where id=".$id." limit 1");
		if($rs)
		{
			$this->db->update('sd_sitelink','id='.$id.'',['islock'=>$islock]);
		}
		$this->success('修改成功');
	}

	public function btach()
	{
		$type=getint(F('type'),0);
		$id=F('id');
		switch ($type)
		{
			case '1':
				self::btach_some("islock",1,$id);
				break;
			case '2':
				self::btach_some("islock",0,$id);
				break;
			case '3':
				self::btach_del($id);
				break;
		}
		$this->success('操作成功');
		$this->cache();
	}

	public function btach_some($field,$val,$id)
	{
		$d=[];
		$d[$field]=$val;
		$arr=explode(',',$id);
		foreach($arr as $key=>$val)
		{
			$val=getint($val,0);
			$this->db->update("sd_sitelink","id=$val",$d);
		}
	}

	public function btach_del($id)
	{
		$arr=explode(',',$id);
		foreach($arr as $key=>$val)
		{
			$val=getint($val,0);
			$this->db->del('sd_sitelink','id='.$val.'');
		}
	}

	public function index()
	{
		if(IS_POST)
		{
			$mid=F('mid');
			$ordnum=F('ordnum');
			foreach($mid as $key=>$val)
			{
				$this->db->update('sd_sitelink','id='.getint($val,0).'',['ordnum'=>getint($ordnum[$key],0)]);
			}
			$this->success('保存成功');
			$this->cache();
		}
		else
		{
			$this->display("extend/sitelink/index.php");
		}
	}

	public function cache()
	{
		$rs=$this->db->load("select title,url,num from sd_sitelink where islock=1 order by ordnum,id limit 50");
		$data="<?php\nif(!defined('IN_SDCMS')) exit;\nreturn ".var_export($rs, true).";\n?>";
		file_put_contents('data/config/sitelink.php', $data);
		unset($data);
	}

	public function add()
	{
		if(IS_POST)
		{
			$data=[[F('t0'),'null','关键字不能为空'],[F('t1'),'null','链接网址不能为空']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$rs=$this->db->row("select * from sd_sitelink where title='".F('t0')."' limit 1");
				if($rs)
				{
					$this->error('关键字已存在');
				}
				else
				{
					$d['title']=F('t0');
					$d['url']=F('t1');
					$d['num']=getint(F('t2'),0);
					$d['ordnum']=getint(F('t3'),0);
					$d['islock']=getint(F('t4'),0);
					$this->db->add('sd_sitelink',$d);
					$this->success('添加成功');
					$this->cache();
				}
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$this->display("extend/sitelink/add.php");
		}
	}

	public function edit()
	{
		$id=getint(F('get.id'),0);
		if(IS_POST)
		{
			$data=[[F('t0'),'null','关键字不能为空'],[F('t1'),'null','链接网址不能为空']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d['title']=F('t0');
				$d['url']=F('t1');
				$d['num']=getint(F('t2'),0);
				$d['ordnum']=getint(F('t3'),0);
				$d['islock']=getint(F('t4'),0);
				$this->db->update('sd_sitelink','id='.$id.'',$d);
				$this->success('保存成功');
				$this->cache();
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$rs=$this->db->row("select * from sd_sitelink where id=".$id." limit 1");
			if($rs)
			{
				foreach($rs as $key=>$val)
				{
					$this->assign($key,$val);
				}
				$this->display("extend/sitelink/edit.php");
			}
		}
	}

	public function del()
	{
		$id=getint(F('get.id'),0);
		$this->db->del('sd_sitelink',"id=".$id."");
		$this->success('删除成功');
		$this->cache();
	}

}