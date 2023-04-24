<?php

if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
$hook_array['after_ui_frame'][] = array(179, 'after_ui_frame remove Send SMS link which added from twillio', 'custom/include/RemoveSendMail.php', 'RemoveSendMail', 'remove');
