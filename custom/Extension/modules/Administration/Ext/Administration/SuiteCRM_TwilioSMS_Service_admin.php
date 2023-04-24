<?php

global $sugar_version;

$admin_option_defs=array();

if(preg_match( "/^6.*/", $sugar_version) ) {
    $admin_option_defs['Administration']['samplelicenseaddon_info']= array('helpInline','LBL_SAMPLELICENSEADDON_LICENSE_TITLE','LBL_SAMPLELICENSEADDON_LICENSE','./index.php?module=tac_sms_templates&action=license');
} else {
    $admin_option_defs['Administration']['samplelicenseaddon_info']= array('helpInline','LBL_SAMPLELICENSEADDON_LICENSE_TITLE','LBL_SAMPLELICENSEADDON_LICENSE','javascript:parent.SUGAR.App.router.navigate("#bwc/index.php?module=tac_sms_templates&action=license", {trigger: true});');
}

$admin_group_header[]= array('LBL_SAMPLELICENSEADDON','',false,$admin_option_defs, '');
