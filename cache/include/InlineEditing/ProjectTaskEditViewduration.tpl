
{if strlen($fields.duration.value) <= 0}
{assign var="value" value=$fields.duration.default_value }
{else}
{assign var="value" value=$fields.duration.value }
{/if}  
<input type='text' name='{$fields.duration.name}' 
id='{$fields.duration.name}' size='30'  value='{sugar_number_format precision=0 var=$value}' title='' tabindex='1'    >