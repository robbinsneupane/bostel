<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
global $mod_strings;
global $current_user;
$module_menu=array();

if (empty($_REQUEST['record'])) {
    $employee_id = '';
} else {
    $employee_id = $_REQUEST['record'];
}

if (is_admin($current_user)) {
    $module_menu[] = array("index.php?module=Employees&action=EditView&return_module=Employees&return_action=DetailView", $mod_strings['LNK_NEW_EMPLOYEE'],"Create");
    $module_menu[] = array("index.php?module=Employees&action=index&return_module=Employees&return_action=DetailView", $mod_strings['LNK_EMPLOYEE_LIST'],"List");

}
    
