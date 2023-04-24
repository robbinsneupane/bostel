<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @author:Akanksha Srivastava
 * Description: Logic hook file to 'Add Send SMS link' button to in ui_frame
 * 
 */

if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
$hook_array['after_ui_frame'][] = array(125, 'after_ui_frame Add Send SMS link to detailview', 'modules/tac_sms_templates/SendSMSFromModuleView.php', 'ModuleActionSendSMS', 'sendSMS');

$hook_array['after_ui_frame'][] = array(167, 'after_ui_frame Show Inbound Message Panel', 'modules/tac_inbound_message/InboundMessagePanel.php', 'InboundMessagePanel', 'showPanel');
