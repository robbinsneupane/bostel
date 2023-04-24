<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Edit View Action
 * 
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class tac_sms_templatesViewEdit extends ViewEdit
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
		// Action Template Pop-up
		
 		$INSERT='<input type="button" name="insert_var_button" id="insert_var_button" value="Insert">';
 		$this->ss->assign('INSERT_VARIABLE_BUTTON',$INSERT);
 		if(isset($_REQUEST['showJs']) && $_REQUEST['showJs']==1)
		{
			$line= $_REQUEST['line'];
			$showInPopup="<input type='hidden' name='showInPopup' id='showInPopup' value='1'>";
			$showInPopup .="<input type='hidden' name='showInPopupLine' id='showInPopupLine' value='$line'>";
			$this->ss->assign('showInPopup',$showInPopup);
		}
		if(isset($_REQUEST['showJsInPopUpListView']) && $_REQUEST['showJsInPopUpListView']==1)
		{
			$line= $_REQUEST['line'];
			$showInPopup="<input type='hidden' name='showInPopup' id='showInPopup' value='showJsInPopUpListView'>";
			$showInPopup .="<input type='hidden' name='showInPopupLine' id='showInPopupLine' value='$line'>";
			$this->ss->assign('showInPopup',$showInPopup);
		}
		
 		parent::display();
 		echo "<script src='modules/tac_sms_templates/js/SmsTemplate.js'></script>";
 		echo "<script src='include/javascript/mozaik/vendor/tinymce/tinymce/tinymce.min.js'></script> 
 		<script>
 		tinymce.init({ selector:'#sms_body_html', plugins: 'autoresize', autoresize_bottom_margin: 50, setup: function(editor) {
			editor.on('blur', function(e) {
				console.log('blur');
				rawtext = tinyMCE.activeEditor.getContent({format:'text'});
				$('#sms_body').val(rawtext);
			});
		}});</script>";
		
		
 	}
}
