
</select>
		Fields:<select name='module_fields' id='module_fields' tabindex="50">
<?php
$module= strtolower($_REQUEST['module']);
if(!empty($_REQUEST['module'])) {
	$query ="SHOW COLUMNS FROM ".$module;
	$results = $GLOBALS['db']->query($query);
	
	while($fields = $GLOBALS['db']->fetchByAssoc($results)) {
	echo '<option value='.$fields['Field'].'>'.$fields['Field'].'</option>';
	}
	$checktable = $GLOBALS['db']->query("SHOW TABLES LIKE '".$module."_cstm'");
	if($GLOBALS['db']->getRowCount($checktable) > 0){
		$query_c ="SHOW COLUMNS FROM ".$module."_cstm";
		$results_c = $GLOBALS['db']->query($query_c);
		
		while($fields_c = $GLOBALS['db']->fetchByAssoc($results_c)) {
		echo '<option value='.$fields_c['Field'].'>'.$fields_c['Field'].'</option>';
		}
	}
}
?>
</select>
