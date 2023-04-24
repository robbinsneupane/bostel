<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio configurator action
 * 
 */

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



require_once('modules/tac_sms_templates/license/OutfittersLicense.php');
$validate_license = OutfittersLicense::isValid('tac_sms_templates');
if($validate_license !== true) {
    if(is_admin($current_user)) {
        SugarApplication::appendErrorMessage('SuiteCRM Twilio SMS Service is no longer active due to the following reason: '.$validate_license.' Users will have limited to no access until the issue has been addressed.');
    }
    echo '<h2><p class="error">SuiteCRM Twilio SMS Service is no longer active</p></h2><p class="error">Please renew your subscription or check your license configuration.</p>';
}
else
{
	// Configuration continue from here
	global $current_user, $sugar_config;
	global $mod_strings;
	global $app_list_strings;
	global $app_strings;
	global $theme;

	if (!is_admin($current_user)) sugar_die("Unauthorized access to administration.");

	require_once('modules/Configurator/Configurator.php');


	echo getClassicModuleTitle(
		"Administration",
		array(
			"<a href='index.php?module=Administration&action=index'>" . translate('LBL_MODULE_NAME', 'Administration') . "</a>",
			$mod_strings['LBL_AUTHENTICATION_DESCRIPTION'],
		),
		false
	);

	$cfg = new Configurator();
	$sugar_smarty = new Sugar_Smarty();
	$errors = array();

	if (isset($_REQUEST['do']) && $_REQUEST['do'] == 'save') {
		$cfg->config['twilio_auth_token'] = !empty($_REQUEST['twilio_auth_token']);
		$cfg->config['twilio_account_sid'] = !empty($_REQUEST['twilio_account_sid']);
		$cfg->config['twilio_phone_no'] = !empty($_REQUEST['twilio_phone_no']);
		$cfg->config['limit_of_twilio_schedular_trials'] = !empty($_REQUEST['limit_of_twilio_schedular_trials']);
		if(!empty($_REQUEST['enabled_twilio_modules'])){
		$enabled_twilio_modules = $_REQUEST['enabled_twilio_modules'];
		$enabled_twilio_module = implode(',', $enabled_twilio_modules);
		$cfg->config['enabled_modules_twilio'] = $enabled_twilio_module;
		}
		$cfg->saveConfig();
		header('Location: index.php?module=Administration&action=index');
	   
	}

	$sugar_smarty->assign('MOD', $mod_strings);
	$sugar_smarty->assign('APP', $app_strings);
	$sugar_smarty->assign('APP_LIST', $app_list_strings);
	$sugar_smarty->assign('LANGUAGES', get_languages());
	$sugar_smarty->assign("JAVASCRIPT", get_set_focus_js());

	$sugar_smarty->assign('config', $sugar_config);
	$sugar_smarty->assign('error', $errors);

	$topbuttons = <<<EOQ
    <input title="{$app_strings['LBL_SAVE_BUTTON_TITLE']}"
                       accessKey="{$app_strings['LBL_SAVE_BUTTON_KEY']}"
                       class="button primary"
                       type="submit"
                       name="save_header"
                       id="save_header"
                       onclick="return check_form('ConfigureTwilio');"
                       value="  {$app_strings['LBL_SAVE_BUTTON_LABEL']}  " >
                &nbsp;<input title="{$mod_strings['LBL_CANCEL_BUTTON_TITLE']}"  onclick="document.location.href='index.php?module=Administration&action=index'" class="button"  type="button" name="cancel_header" value="  {$app_strings['LBL_CANCEL_BUTTON_LABEL']}  " >
EOQ;
	$bottombuttons = <<<EOQ
    <input title="{$app_strings['LBL_SAVE_BUTTON_TITLE']}"
                       accessKey="{$app_strings['LBL_SAVE_BUTTON_KEY']}"
                       class="button primary"
                       type="submit"
                       name="save_bottom"
                       id="save_bottom"
                       onclick="return check_form('ConfigureTwilio');"
                       value="  {$app_strings['LBL_SAVE_BUTTON_LABEL']}  " >
                &nbsp;<input title="{$mod_strings['LBL_CANCEL_BUTTON_TITLE']}"  onclick="document.location.href='index.php?module=Administration&action=index'" class="button"  type="button" name="cancel_bottom" value="  {$app_strings['LBL_CANCEL_BUTTON_LABEL']}  " >
EOQ;
	$sugar_smarty->assign("TOPBUTTONS", $topbuttons);
	$sugar_smarty->assign("BOTTOMBUTTONS", $bottombuttons);

	$sugar_smarty->display('custom/modules/Administration/tac_twilio_config.tpl');

	$javascript = new javascript();
	$javascript->setFormName('ConfigureTwilio');
	echo $javascript->getScript();

}
