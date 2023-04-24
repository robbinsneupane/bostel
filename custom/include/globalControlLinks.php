<?php

unset($global_control_links['employees']);
$global_control_links['training'] = array(
    'linkinfo' => array($app_strings['LBL_SUPPORT'] => 'index.php?module=Home&action=Support'),
    'submenu' => ''
);
$global_control_links['sales_setting'] = array(
    'linkinfo' => array($app_strings['LBL_SALES_SETTING'] => 'index.php?module=MySettings&action=sales_setting'),
    'submenu' => ''
);
