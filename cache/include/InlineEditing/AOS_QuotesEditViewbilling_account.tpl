
<input type="text" name="{$fields.billing_account.name}" class="sqsEnabled" tabindex="1" id="{$fields.billing_account.name}" size="" value="{$fields.billing_account.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.billing_account.id_name}" 
	id="{$fields.billing_account.id_name}" 
	value="{$fields.billing_account_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.billing_account.name}" id="btn_{$fields.billing_account.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup_modal(
    "{$fields.billing_account.module}", 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.billing_account.id_name}"{literal},"name":{/literal}"{$fields.billing_account.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.billing_account.name}" id="btn_clr_{$fields.billing_account.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.billing_account.name}', '{$fields.billing_account.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.billing_account.name}']) != 'undefined'",
		enableQS
);
</script>