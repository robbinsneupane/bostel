<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Detail View Action
 * 
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class tac_sms_templatesViewDetail extends ViewDetail
{
    /**
 	 * @see SugarView::preDisplay()
 	 */
 	public function preDisplay()
 	{
 		parent::preDisplay();
 	}

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display()
 	{
		$bean_id= $this->bean->id;
		$bean_name= $this->bean->name;
 		if(isset($_REQUEST['showInPopup'])  && $_REQUEST['showInPopup']==1){
			$line= $_REQUEST['showInPopupLine'];
			echo "<script>
			window.opener.refresh_sms_template_list('$bean_id','$bean_name');
			window.close();			
			</script>";
			
		}
 		if(isset($_REQUEST['showJsInPopUpListView'])  && $_REQUEST['showJsInPopUpListView']==1){
			$line= $_REQUEST['showInPopupLine'];
			echo "<script>
			var option = $('<option value=\"$bean_id\" selected>$bean_name</option>');
			var update= window.opener.$('#aow_actions_param_sms_template$line').prepend(option);
			if(update)
			window.close();			
			</script>";
			
		}
			
 		parent::display();
 	}
}
