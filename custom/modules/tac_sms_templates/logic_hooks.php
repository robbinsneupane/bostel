<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Redirect logic hook for popup actions
 * 
 */
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(123, 'Redirect Detail View', 'modules/tac_sms_templates/RedirectDetail.php','RedirectDetail', 'RedirectDetailMethod'); 

?>
