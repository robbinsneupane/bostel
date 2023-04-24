
{if strlen($fields.full_name.value) <= 0}
{assign var="value" value=$fields.full_name.default_value }
{else}
{assign var="value" value=$fields.full_name.value }
{/if}  
<input type='text' name='{$fields.full_name.name}' 
    id='{$fields.full_name.name}' size='30' 
    maxlength='510' 
    value='{$value}' title=''  tabindex='1'      >