
{if strval($fields.noninheritable.value) == "1" || strval($fields.noninheritable.value) == "yes" || strval($fields.noninheritable.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.noninheritable.name}" value="0"> 
<input type="checkbox" id="{$fields.noninheritable.name}" 
name="{$fields.noninheritable.name}" 
value="1" title='' tabindex="1" {$checked} >