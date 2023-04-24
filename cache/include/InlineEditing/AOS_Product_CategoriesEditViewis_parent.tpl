
{if strval($fields.is_parent.value) == "1" || strval($fields.is_parent.value) == "yes" || strval($fields.is_parent.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.is_parent.name}" value="0"> 
<input type="checkbox" id="{$fields.is_parent.name}" 
name="{$fields.is_parent.name}" 
value="1" title='' tabindex="1" {$checked} >