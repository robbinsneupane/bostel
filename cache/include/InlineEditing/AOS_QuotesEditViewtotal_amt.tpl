
{if strlen($fields.total_amt.value) <= 0}
{assign var="value" value=$fields.total_amt.default_value }
{else}
{assign var="value" value=$fields.total_amt.value }
{/if}  
<input type='text' name='{$fields.total_amt.name}' 
id='{$fields.total_amt.name}' size='30' maxlength='26,6' value='{sugar_number_format var=$value}' title='' tabindex='1'
 >