<?php

if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
$hook_array['after_ui_frame'][] = array(181, 'after_ui_frame update footer-create-link for mobile view', 'custom/include/AfterUiFrame.php', 'AfterUiFrame', 'updateFooterCreateLink');
