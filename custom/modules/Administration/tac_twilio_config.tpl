<!-- 
 *
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio configuration action file
 * 
-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<form id="ConfigureTwilio" name="ConfigureTwilio" enctype='multipart/form-data' method="POST"
      action="index.php?module=Administration&action=tac_twilio_config&do=save">
	<h2>{$MOD.LBL_TWILIO_SETTING}</h2>
    <span class='error'>{$error.main}</span>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="actionsContainer">
        <tr>
            <td>
                {$TOPBUTTONS}
                 </td>
        </tr>
    </table>

     <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr>
            <th align="left" scope="row" colspan="4">
                <h4>{$MOD.TWILIO_SETTINGS}</h4>
            </th>
        </tr>
        <tr>
            <td nowrap width="10%" scope="row">{$MOD.TWILIO_ACCOUNT_SID}: </td>
            <td width="25%">
                <input type='text' name='twilio_account_sid' id='twilio_account_sid' size="60" value='{$config.twilio_account_sid}'>
            </td>
            
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr>
         <td nowrap width="10%" scope="row">{$MOD.TWILIO_AUTH_TOKEN}: </td>
            <td width="25%">
                <input type='text' name='twilio_auth_token' id='twilio_auth_token' size="60" value='{$config.twilio_auth_token}'>
            </td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr>
        <td nowrap width="10%" scope="row">{$MOD.TWILIO_PHONE_NO}: </td>
            <td width="25%">
				<input type='text' name='twilio_phone_no' id='twilio_phone_no' size="60" value='{$config.twilio_phone_no}'>
            </td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr>
            <th align="left" scope="row" colspan="4">
                <h4>{$MOD.LBL_TWILIO_MESSAGE_LOG_SETTING}</h4>
            </th>
        </tr>
        <tr>
		<td nowrap width="10%" scope="row">{$MOD.LBL_ENABLE_MODULES}</td>		
			<td width="25%">
				<select id="enabled_twilio_modules" name="enabled_twilio_modules[]" multiple>
					{php}
					global $sugar_config;
					$enabled_modules = explode(',',$sugar_config['enabled_modules_twilio']);
					if($sugar_config['enabled_modules_twilio']!='')
					{
						foreach ($enabled_modules as $key=>$value)
						{
						{/php}<option value="{php}echo $value;{/php}" selected>{php}echo $value;{/php}</option>
						{php}
						}
					}
					$module_list[0]=$GLOBALS['moduleList'];
					$modules =array_diff($module_list[0],$enabled_modules);
					
					foreach ($modules as $key=>$value)
					{
						$bean = BeanFactory::getBean($value);
						if($bean->field_name_map['phone_alternate'] || $bean->field_name_map['phone_mobile'] || $bean->field_name_map['phone_mobile_c']){
							{/php}<option value="{php}echo $value;{/php}">{php}echo $value;{/php}</option>
							{php}
						}	
					}
					{/php}
				
				</select>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
        <tr>
            <th align="left" scope="row" colspan="4">
                <h4>{$MOD.LBL_CONFIG_SCHEDULER_TRIALS}</h4>
            </th>
        </tr>
		<tr>
            <td nowrap width="10%" scope="row">{$MOD.LBL_LIMIT_OF_SCHEDULER_TRIALS}: </td>
            <td width="25%">
                <input type="number" name="limit_of_twilio_schedular_trials" id="limit_of_twilio_schedular_trials" value="{$config.limit_of_twilio_schedular_trials}">
		<span><abbr  data-toggle="tooltip" title="Limit indicates maximum number of trials from scheduler to send undelivered sms"><img src="themes/SuiteP/images/calendar_info.png"></abbr></span>
            </td>
            
        </tr>
		<tr><td>&nbsp;</td></tr>
    </table>
    <div style="padding-top: 2px;">
        {$BOTTOMBUTTONS}
    </div>
    {$JAVASCRIPT}
</form>
<script type="text/javascript">
     	$("#enabled_twilio_modules").select2();
	$('[data-toggle="tooltip"]').tooltip();
</script>

