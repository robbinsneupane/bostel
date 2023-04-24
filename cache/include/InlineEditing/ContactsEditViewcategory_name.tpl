
<input type="text" name="{$fields.category_name.name}" class="sqsEnabled" tabindex="1" id="{$fields.category_name.name}" size="" value="{$fields.category_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.category_name.id_name}" 
	id="{$fields.category_name.id_name}" 
	value="{$fields.category_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.category_name.name}" id="btn_{$fields.category_name.name}" tabindex="1" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup_modal(
    "{$fields.category_name.module}", 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.category_name.id_name}"{literal},"name":{/literal}"{$fields.category_name.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.category_name.name}" id="btn_clr_{$fields.category_name.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.category_name.name}', '{$fields.category_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.category_name.name}']) != 'undefined'",
		enableQS
);
</script>