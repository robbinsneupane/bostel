

<table border="0" cellpadding="0" cellspacing="0" class="dateTime">
<tr valign="middle">
<td nowrap class="dateTimeComboColumn">
<input autocomplete="off" type="text" id="{$fields.date_due.name}_date" class="datetimecombo_date" value="{$fields[$fields.date_due.name].value}" size="11" maxlength="10" title='' tabindex="1" onblur="combo_{$fields.date_due.name}.update();" onchange="combo_{$fields.date_due.name}.update(); "    >
	<button type="button" id="{$fields.date_due.name}_trigger" class="btn btn-danger" onclick="return false;"><span class="suitepicon suitepicon-module-calendar"  alt="{$APP.LBL_ENTER_DATE}"></span></button>
</td>
<td nowrap class="dateTimeComboColumn">
<div id="{$fields.date_due.name}_time_section" class="datetimecombo_time_section"></div>
</td>
</tr>
</table>
<input type="hidden" class="DateTimeCombo" id="{$fields.date_due.name}" name="{$fields.date_due.name}" value="{$fields[$fields.date_due.name].value}">
<script type="text/javascript" src="{sugar_getjspath file="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"}"></script>
<script type="text/javascript">
var combo_{$fields.date_due.name} = new Datetimecombo("{$fields[$fields.date_due.name].value}", "{$fields.date_due.name}", "{$TIME_FORMAT}", "1", '', false, true);
//Render the remaining widget fields
text = combo_{$fields.date_due.name}.html('');
document.getElementById('{$fields.date_due.name}_time_section').innerHTML = text;

//Call eval on the update function to handle updates to calendar picker object
eval(combo_{$fields.date_due.name}.jsscript(''));

addToValidateBinaryDependency('{$form_name}',"{$fields.date_due.name}_hours", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_HOURS}" ,"{$fields.date_due.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.date_due.name}_minutes", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MINUTES}" ,"{$fields.date_due.name}_date");
addToValidateBinaryDependency('{$form_name}', "{$fields.date_due.name}_meridiem", 'alpha', false, "{$APP.ERR_MISSING_REQUIRED_FIELDS} {$APP.LBL_MERIDIEM}","{$fields.date_due.name}_date");

YAHOO.util.Event.onDOMReady(function()
{ldelim}

	Calendar.setup ({ldelim}
	onClose : update_{$fields.date_due.name},
	inputField : "{$fields.date_due.name}_date",
    form : "",
	ifFormat : "{$CALENDAR_FORMAT}",
	daFormat : "{$CALENDAR_FORMAT}",
	button : "{$fields.date_due.name}_trigger",
	singleClick : true,
	step : 1,
	weekNumbers: false,
        startWeekday: {$CALENDAR_FDOW|default:'0'},
	comboObject: combo_{$fields.date_due.name}
	{rdelim});

	//Call update for first time to round hours and minute values
	combo_{$fields.date_due.name}.update(false);

{rdelim}); 
</script>