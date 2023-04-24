
{if strlen($fields.location.value) <= 0}
{assign var="value" value=$fields.location.default_value }
{else}
{assign var="value" value=$fields.location.value }
{/if}  
<input type='text' name='{$fields.location.name}' 
    id='{$fields.location.name}' size='30' 
    maxlength='50' 
    value='{$value}' title=''  tabindex='1'      >