<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Sending SMS from Module View File: List, Detail
 * 
 */
 
class ModuleActionSendSMS {
  
    function sendSMS()
    {
        global $app_strings;
        $config_modules=['Accounts','Contacts','Cases','Leads','Meetings','Calls'];
        $module = $_REQUEST['module'];
        if(isset($_REQUEST['record']) && $_REQUEST['record']!='' && in_array($module,$config_modules)){
            $bean_id = $_REQUEST['record'];
            $bean = BeanFactory::getBean($module, $bean_id);
            $smsTo= $bean->phone_alternate;
        }
        // Based on what action we're in, add some buttons!
        if(in_array($module,$config_modules)){
			switch ($GLOBALS['app']->controller->action) 
			{
				case "DetailView": // Add buttons to Detail View
					$button_code  ='<script  src="modules/tac_sms_templates/js/sms_module_action.js"></script>';
					$button_code .= <<<EOQ
<script type="text/javascript">
    $(document).ready(function(){
        if($("#tab-actions ul")){
			var button = $('<li><input type="button" class="button" id="Send SMS"  value="Send SMS" style="height:48px;" onclick="showModal(\'$bean_id\');" ></li>');
			$("#tab-actions ul").append(button);
        }
        
        else if($(".sugar_action_button ul")){
			var button = $('<li><input type="button" class="button" id="Send SMS"  value="Send SMS" onclick="showModal(\'$bean_id\');" ></li>');
			$(".sugar_action_button ul").append(button);
        }
    });
</script>
EOQ;
					include "modules/tac_sms_templates/smsTemplatePopup.php";
					echo $button_code;
				break;
				
				
				
					
				case "listview": // Add buttons to List View
				
					
					$button_code= <<<EOHTML
<script src="modules/tac_sms_templates/js/sms_module_action.js"></script>
EOHTML;
					include "modules/tac_sms_templates/smsTemplatePopup.php";
					echo $button_code;
				break;
			}
		}
    }
}
