<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Adding admin panel for Twilio Suite configuration
 * 
 */

// Create panel In Administration
$admin_options_defs = array();
$admin_options_defs['Administration']['Twilio_Manager'] = array(
        'ModuleLoader',
        'LBL_TWILIO_SETTING',
        'LBL_TWILIO_DESCRIPTION',
        'index.php?module=Administration&action=tac_twilio_config'
);
$admin_options_defs['Administration']['Twilio_Log'] = array(
        'ModuleLoader',
        'LBL_TWILIO_LOG',
        'LBL_TWILIO_LOG_DESCRIPTION',
        'index.php?module=Administration&action=tac_twilio_log_view'
);
$admin_group_header[] = array(
        'LBL_TWILIO_SETTING_TITLE',
        '',
        false,
        $admin_options_defs,
);
