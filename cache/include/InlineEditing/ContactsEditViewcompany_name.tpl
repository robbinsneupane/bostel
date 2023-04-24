
{if strlen($fields.company_name.value) <= 0}
{assign var="value" value=$fields.company_name.default_value }
{else}
{assign var="value" value=$fields.company_name.value }
{/if}  
<input type='text' name='{$fields.company_name.name}' 
    id='{$fields.company_name.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >