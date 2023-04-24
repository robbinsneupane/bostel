
{if strlen($fields.phone_number.value) <= 0}
{assign var="value" value=$fields.phone_number.default_value }
{else}
{assign var="value" value=$fields.phone_number.value }
{/if}  
<input type='text' name='{$fields.phone_number.name}' 
    id='{$fields.phone_number.name}' size='30' 
    maxlength='100' 
    value='{$value}' title=''  tabindex='1'      >