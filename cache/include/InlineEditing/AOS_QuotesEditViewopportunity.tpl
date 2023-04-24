
<input type="text" name="{$fields.opportunity.name}" class="sqsEnabled" tabindex="1" id="{$fields.opportunity.name}" size="" value="{$fields.opportunity.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.opportunity.id_name}" 
	id="{$fields.opportunity.id_name}" 
	value="{$fields.opportunity_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.opportunity.name}" id="btn_{$fields.opportunity.name}" tabindex="1" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup_modal(
    "{$fields.opportunity.module}", 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.opportunity.id_name}"{literal},"name":{/literal}"{$fields.opportunity.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.opportunity.name}" id="btn_clr_{$fields.opportunity.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.opportunity.name}', '{$fields.opportunity.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.opportunity.name}']) != 'undefined'",
		enableQS
);
</script>