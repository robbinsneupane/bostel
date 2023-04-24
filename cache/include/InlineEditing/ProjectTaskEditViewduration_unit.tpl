
{if empty($fields.duration_unit.value)}
{assign var="value" value=$fields.duration_unit.default_value }
{else}
{assign var="value" value=$fields.duration_unit.value }
{/if}




<textarea  id='{$fields.duration_unit.name}' name='{$fields.duration_unit.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}