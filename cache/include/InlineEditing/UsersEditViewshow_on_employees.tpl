
{if strval($fields.show_on_employees.value) == "1" || strval($fields.show_on_employees.value) == "yes" || strval($fields.show_on_employees.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.show_on_employees.name}" value="0"> 
<input type="checkbox" id="{$fields.show_on_employees.name}" 
name="{$fields.show_on_employees.name}" 
value="1" title='' tabindex="1" {$checked} >