<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 

$hook_array['after_login'][] = Array(199, 'Redirect To Mobile Home Page', 'custom/modules/Users/LogicHooks/redirect.php','Redirect', 'redirect'); // this will be called at last for redirecting after login page.

?>