
{if empty($fields.pdfheader.value)}
{assign var="value" value=$fields.pdfheader.default_value }
{else}
{assign var="value" value=$fields.pdfheader.value }
{/if}




<textarea  id='{$fields.pdfheader.name}' name='{$fields.pdfheader.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}