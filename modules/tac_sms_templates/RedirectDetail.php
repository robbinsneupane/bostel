<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Redirect Detail Logichook Action file
 * 
 */
 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class RedirectDetail{
	
	function RedirectDetailMethod($bean, $event, $arguments){
			if(isset($_POST['showInPopup']) && ($_POST['showInPopup']==1)){
				$line=$_POST['showInPopupLine'];
				SugarApplication::redirect("index.php?module=tac_sms_templates&action=DetailView&record=$bean->id&showInPopup=1&showInPopupLine=$line");
			}
			if(isset($_POST['showInPopup']) && ($_POST['showInPopup']=='showJsInPopUpListView')){
				$line=$_POST['showInPopupLine'];
				SugarApplication::redirect("index.php?module=tac_sms_templates&action=DetailView&record=$bean->id&showJsInPopUpListView=1&showInPopupLine=$line");
			}
	}
}


?>
