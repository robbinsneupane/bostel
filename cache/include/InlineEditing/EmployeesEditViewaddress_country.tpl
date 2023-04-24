
{if strlen($fields.address_country.value) <= 0}
{assign var="value" value=$fields.address_country.default_value }
{else}
{assign var="value" value=$fields.address_country.value }
{/if}  
<input type='text' name='{$fields.address_country.name}' 
    id='{$fields.address_country.name}' size='30' 
    maxlength='100' 
    value='{$value}' title=''  tabindex='1'      >