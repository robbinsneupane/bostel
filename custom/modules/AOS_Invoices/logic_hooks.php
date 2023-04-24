<?php
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(123, 'Create Invoice number', 'custom/modules/AOS_Invoices/InvoiceNumber.php','InvoiceNumber', 'InvoiceNumberMethod'); 

?>
