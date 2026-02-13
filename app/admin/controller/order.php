<?php
/**
 * 作用：订单管理
 * 官网：Http://www.sdcms.cn
 * 作者：IT平民
 * ===========================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 未经授权不允许对程序代码以任何形式任何目的的再发布。
 * ===========================================================================
**/

class Order extends AdminsController
{
	public function switchs()
	{
		$id=getint(F('get.id'),0);
		$state=getint(F('state'),0);
		$rs=$this->db->row("select id from sd_order where id=".$id." limit 1");
		if($rs)
		{
			$this->db->update('sd_order','id='.$id.'',['isover'=>$state]);
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
				self::btach_some("isover",1,$id);
				break;
			case '2':
				self::btach_some("isover",0,$id);
				break;
			case '3':
				self::btach_del($id);
				break;
		}
		$this->success('操作成功');
	}

	public function btach_some($field,$val,$id)
	{
		$d=[];
		$d[$field]=$val;
		$arr=explode(',',$id);
		foreach($arr as $key=>$val)
		{
			$val=getint($val,0);
			$this->db->update("sd_order","id=$val",$d);
		}
	}

	public function btach_del($id)
	{
		$arr=explode(',',$id);
		foreach($arr as $key=>$val)
		{
			$val=getint($val,0);
			$this->db->del('sd_order','id='.$val.'');
		}
	}

	public function index()
	{
		$type=getint(F('get.type'),0);
		$where='1=1 ';
		$keyword=rawurldecode(F('get.keyword'));
		if(strlen($keyword)>0)
		{
			$where.=" and (orderid like binary '%".$keyword."%' or truename like binary '%".$keyword."%' or mobile like binary '%".$keyword."%')";
		}
		switch ($type)
		{
			case '1':
				$where.=' and ispay=0';
				break;
			case "2":
				$where.=' and ispay=1';
				break;
			case '3':
				$where.=' and isover=0';
				break;
			case "4":
				$where.=' and isover=1';
				break;
			case '0':
				break;
		}
		$this->assign("where",$where);
		$this->assign("type",$type);
		$this->assign("keyword",$keyword);
		$this->display("extend/order/index.php");
	}

	public function edit()
	{
		$id=getint(F('get.id'),0);
		if(IS_POST)
		{
			$data=[[F('t4'),'null','姓名不能为空'],[F('t5'),'null','手机不能为空']];
			$v=new sdcms_verify($data);
			if($v->result())
			{
				$d['truename']=F('t4');
				$d['mobile']=F('t5');
				$d['address']=F('t6');
				$d['remark']=F('t7');
				$d['isover']=getint(F('t8'),0);
				$this->db->update('sd_order','id='.$id.'',$d);
				$this->success('保存成功');
			}
			else
			{
				$this->error($v->msg);
			}
		}
		else
		{
			$rs=$this->db->row("select * from sd_order where id=".$id." limit 1");
			if($rs)
			{
				foreach($rs as $key=>$val)
				{
					$this->assign($key,$val);
				}
				$this->display("extend/order/edit.php");
			}
		}
	}

	public function del()
	{
		$id=getint(F('get.id'),0);
		self::btach_del($id);
		$this->success('删除成功');
	}

}