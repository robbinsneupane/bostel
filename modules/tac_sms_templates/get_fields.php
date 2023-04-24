<!--
 *
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Get Fields for module Entry Point Action file
 *
-->
</select>
		Fields:<select name='module_fields' id='module_fields' tabindex="50">
<?php
$module= $_REQUEST['module'];
$bean = BeanFactory::getBean($module);
echo '<option value="">Select Field</option>';
foreach($bean->field_name_map as $key=>$value){				
	echo '<option value='.$key.'>'.$key.'</option>';
}
?>
</select>
