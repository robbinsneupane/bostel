
{if strlen($fields.quote_number.value) <= 0}
{assign var="value" value=$fields.quote_number.default_value }
{else}
{assign var="value" value=$fields.quote_number.value }
{/if}  
<input type='text' name='{$fields.quote_number.name}' 
id='{$fields.quote_number.name}' size='30' maxlength='11' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='1'    >