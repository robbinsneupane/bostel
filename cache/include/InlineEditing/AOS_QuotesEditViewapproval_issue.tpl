
{if empty($fields.approval_issue.value)}
{assign var="value" value=$fields.approval_issue.default_value }
{else}
{assign var="value" value=$fields.approval_issue.value }
{/if}




<textarea  id='{$fields.approval_issue.name}' name='{$fields.approval_issue.name}'
rows="2"
cols="32"
title='' tabindex="1" 
 >{$value}</textarea>


{literal}{/literal}