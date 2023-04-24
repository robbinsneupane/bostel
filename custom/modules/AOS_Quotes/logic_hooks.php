<?php
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(123, 'Create Quotes number', 'custom/modules/AOS_Quotes/QuoteNumber.php','QuoteNumber', 'QuoteNumberMethod'); 

?>
