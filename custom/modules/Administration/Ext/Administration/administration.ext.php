<?php 
 //WARNING: The contents of this file are auto-generated



global $sugar_version;

$admin_option_defs=array();

if(preg_match( "/^6.*/", $sugar_version) ) {
    $admin_option_defs['Administration']['samplelicenseaddon_info']= array('helpInline','LBL_SAMPLELICENSEADDON_LICENSE_TITLE','LBL_SAMPLELICENSEADDON_LICENSE','./index.php?module=tac_sms_templates&action=license');
} else {
    $admin_option_defs['Administration']['samplelicenseaddon_info']= array('helpInline','LBL_SAMPLELICENSEADDON_LICENSE_TITLE','LBL_SAMPLELICENSEADDON_LICENSE','javascript:parent.SUGAR.App.router.navigate("#bwc/index.php?module=tac_sms_templates&action=license", {trigger: true});');
}

$admin_group_header[]= array('LBL_SAMPLELICENSEADDON','',false,$admin_option_defs, '');


/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Adding admin panel for Twilio Suite configuration
 * 
 */

// Create panel In Administration
$admin_options_defs=array();
$admin_options_defs['Administration']['Twilio_Manager']=array(       
        'ModuleLoader',
        'LBL_TWILIO_SETTING',
        'LBL_TWILIO_DESCRIPTION',
        'index.php?module=Administration&action=tac_twilio_config'
        );
$admin_options_defs['Administration']['Twilio_Log']=array(       
        'ModuleLoader',
        'LBL_TWILIO_LOG',
        'LBL_TWILIO_LOG_DESCRIPTION',
        'index.php?module=Administration&action=tac_twilio_log_view'
        );
$admin_group_header[]=array(
		'LBL_TWILIO_SETTING_TITLE',
		'',
		false,
		$admin_options_defs,
);


?>