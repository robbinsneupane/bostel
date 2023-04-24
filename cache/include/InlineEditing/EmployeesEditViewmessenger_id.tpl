
{if strlen($fields.messenger_id.value) <= 0}
{assign var="value" value=$fields.messenger_id.default_value }
{else}
{assign var="value" value=$fields.messenger_id.value }
{/if}  
<input type='text' name='{$fields.messenger_id.name}' 
    id='{$fields.messenger_id.name}' size='30' 
    maxlength='100' 
    value='{$value}' title=''  tabindex='1'      >