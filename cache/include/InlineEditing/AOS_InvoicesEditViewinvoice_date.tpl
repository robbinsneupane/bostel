
<span class="dateTime">
{assign var=date_value value=$fields.invoice_date.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.invoice_date.name}" id="{$fields.invoice_date.name}" value="{$date_value}" title=''  tabindex='1'    size="11" maxlength="10" >
    <button type="button" id="{$fields.invoice_date.name}_trigger" class="btn btn-danger" onclick="return false;"><span class="suitepicon suitepicon-module-calendar" alt="{$APP.LBL_ENTER_DATE}"></span></button>
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.invoice_date.name}",
form : "",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.invoice_date.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
