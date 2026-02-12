<?php if(!defined('IN_SDCMS')) exit;?>
<table class="ui-table ui-table-border ui-table-hover ui-table-striped ui-mb ui-mt">
	<thead class="ui-thead-gray">
		<tr>
			{foreach $field as $key}
			<th>{$key['field_title']}</th>
			{/foreach}
			<th width="120">发布日期</th>
			<th width="100">操作</th>
		</tr>
	</thead>
	<tbody>
	{sdcms:rs pagesize="20" table="$tablename" where="$where" order="ordnum desc,id desc"}
	{rs:eof}
	<tr>
		<td colspan="{php echo count($field)+3}">暂无数据</td>
	</tr>
	{/rs:eof}
	<tr>
		{foreach $field as $key}
		{php $name=$key['field_key']}
		<td>{$rs['.$name.']}</td>
		{/foreach}
		<td>{date('Y-m-d',$rs[createdate])}</td>
		<td><a href="{U('form/show/','fid='.$fid.'&id='.$rs[id].'')}">查看明细</a></td>
	</tr>
	{/sdcms:rs}
	</tbody>
</table>
<div class="ui-page ui-page-center ui-page-mid"><ul>{$showpage}</ul></div>