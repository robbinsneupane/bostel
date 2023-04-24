<?php

/*
 * Created by Taction Software LLC - Copyright 2017
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Global search action view of results
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
 		$INSERT='<input type="button" name="insert_var_button" id="insert_var_button" value="Insert">';
 		$this->ss->assign('INSERT_VARIABLE_BUTTON',$INSERT);
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
