<?php if(!defined('IN_SDCMS')) exit;?>
{if count($filter)>0}
<div class="ui-filter ui-mb-15">
	{foreach $filter as $rs}
	<div class="ui-row">
		<div class="ui-col-1 ui-filter-left">{$rs['field_title']}：</div>
		<div class="ui-col-11 ui-filter-right">
			<a href="{U('index','fid='.$fid.''.deal_filter($filter_data,$rs['field_key'],0).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==0} class="active"{/if}>全部</a>
			{if $rs['field_type']==14}
			{php $table_=$rs['field_table']}{php $join_=$rs['field_join']}{php $where_=$rs['field_where']}{php $order_=$rs['field_order']}{php $value=$rs['field_value']}{php $label=$rs['field_label']}
			{if $where_==''}{php $where_='1=1'}{/if}
			{if $order_==''}{php $order_="$value desc"}{/if}
			{sdcms:ra top="0" table="$table_" join="$join_" where="$where_" order="$order_"}
			<a href="{U('index','fid='.$fid.''.deal_filter($filter_data,$rs['field_key'],$ra['.$value.']).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$ra['.$value.']} class="active"{/if}>{$ra['.$label.']}</a>
			{/sdcms:ra}
			{else}
			{php $arr=explode(",",$rs['field_list'])}
			{foreach $arr as $j=>$key}
			{php $data=explode("|",$key)}
			<a href="{U('index','fid='.$fid.''.deal_filter($filter_data,$rs['field_key'],$data[1]).'')}"{if getint(F('get.'.$rs['field_key'].''),0)==$data[1]} class="active"{/if}>{$data[0]}</a>
			{/foreach}
			{/if}
		</div>
	</div>
	{/foreach}
</div>
{/if}