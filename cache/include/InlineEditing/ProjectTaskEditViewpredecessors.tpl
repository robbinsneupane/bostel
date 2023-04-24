
{if empty($fields.predecessors.value)}
{assign var="value" value=$fields.predecessors.default_value }
{else}
{assign var="value" value=$fields.predecessors.value }
{/if}




<textarea  id='{$fields.predecessors.name}' name='{$fields.predecessors.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}