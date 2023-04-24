<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Action file for Sending SMS from Workflow
 * 
 */

require_once('modules/AOW_Actions/actions/actionBase.php');
class actionSendSMS extends actionBase {

	private $messagableModules = array();
	
    function __construct($id = ''){
        parent::__construct($id);
         echo '';
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function actionSendSMS($id = ''){
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if(isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        }
        else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct($id);
    }
      function loadJS(){
		 
        return array('custom/modules/AOW_Actions/actions/actionSendSMS.js');
    }
    
    function edit_display($line,SugarBean $bean = null, $params = array()){
        global $app_list_strings;
        $mob_no_templates_arr = get_bean_select_array(true, 'tac_sms_templates','name');//
	
        if(!in_array($bean->module_dir,getEmailableModules())) unset($app_list_strings['aow_sms_type_list']['Record SMS']);
        $targetOptions = getRelatedEmailableFields($bean->module_dir);
        if(empty($targetOptions)) unset($app_list_strings['aow_sms_type_list']['Related Field']);

        $html = '<input type="hidden" name="aow_sms_type_list" id="aow_sms_type_list" value="'.get_select_options_with_id($app_list_strings['aow_sms_type_list'], '').'">
				 <input type="hidden" name="aow_sms_to_list" id="aow_sms_to_list" value="to">';


        $checked = '';
        if(isset($params['individual_sms']) && $params['individual_sms']) $checked = 'CHECKED';
        $html .= "<table border='0' cellpadding='0' cellspacing='0' width='auto'>";
        $html .= "<tr>";
        $html .= '<td id="relate_label" scope="row" valign="top">'.translate("LBL_INDIVIDUAL_SMS","AOW_Actions").':';
        $html .= '</td>';
        $html .= "<td valign='top' width='100px'>";
        $html .= "<input type='hidden' name='aow_actions_param[".$line."][individual_sms]' value='0' >";
        $html .= "<input type='checkbox' id='aow_actions_param[".$line."][individual_sms]' name='aow_actions_param[".$line."][individual_sms]' value='1' $checked></td>";
        $html .= '</td>';

        if(!isset($params['sms_template'])) $params['sms_template'] = '';
        $hidden = "style='visibility: hidden;'";
        if($params['sms_template'] != '') $hidden = "";

        $html .= '<td id="name_label" scope="row" valign="top" width="12.5%">'.translate("LBL_SMS_TEMPLATE","AOW_Actions").':<span class="required">*</span></td>';
        $html .= "<td valign='top' width='37.5%'>";
        $html .= "<select name='aow_actions_param[".$line."][sms_template]' id='aow_actions_param_sms_template".$line."' onchange='show_edit_template_link(this,".$line.");' >".get_select_options_with_id($mob_no_templates_arr, $params['sms_template'])."</select>";//ak

        $html .= "&nbsp;<a href='javascript:open_sms_template_form(".$line.")' >".translate('LBL_CREATE_SMS_TEMPLATE','AOW_Actions')."</a>";
        $html .= "&nbsp;<span name='edit_template' id='aow_actions_edit_template_link".$line."' $hidden><a href='javascript:edit_sms_template_form(".$line.")' >".translate('LBL_EDIT_SMS_TEMPLATE','AOW_Actions')."</a></span>";//ak
        $html .= "</td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= '<td id="name_label" scope="row" valign="top" width="12.5%">'.translate("LBL_SMS","AOW_Actions").':<span class="required">*</span></td>';
        $html .= '<td valign="top" scope="row" width="37.5%">';

        $html .='<input type="hidden" id="sms_to_button_click'.$line.'" name="sms_to_button_click'.$line.'" value=""><button type="button" onclick="add_smsLine('.$line.')"><img src="'.SugarThemeRegistry::current()->getImageURL('id-ff-add.png').'"></button>';
        $html .= '<table id="smsLine'.$line.'_table" width="auto"></table>';
        $html .= '</td>';
        $html .= "</tr>";
        $html .= "</table>";
		
        $html .= "<script id ='aow_script".$line."'>addToValidate(\"EditView\",\"sms_to_button_click".$line."\",\"varchar\",true,\"Please add an option\");
if(document.getElementById(\"aow_actions_param_sms_template".$line."\")){ addToValidate(\"EditView\",\"aow_actions_param_sms_template".$line."\",\"enum\",true,\"Please select a sms template\");}";

        //backward compatible
        if(isset($params['sms_target_type']) && !is_array($params['sms_target_type'])){
            $email = '';
            switch($params['sms_target_type']){
                case 'Mobile Number':
                    $mob_no = $params['sms'];
                    break;
                case 'Specify User':
                    $mob_no = $params['sms_user_id'];
                    break;
                case 'Related Field':
                    $mob_no = $params['sms_target'];
                    break;
            }
            $html .= "load_smsline('".$line."','to','".$params['sms_target_type']."','".$mob_no."');";
        }
        //end backward compatible

        if(isset($params['sms_target_type'])){
            foreach($params['sms_target_type'] as $key => $field){
                if(is_array($params['sms'][$key]))$params['sms'][$key] = json_encode($params['sms'][$key]);
					$html .= "load_smsline('".$line."','".$params['sms_to_type'][$key]."','".$params['sms_target_type'][$key]."','".$params['sms'][$key]."');";
            }
        }
        $html .= "</script>";

        return $html;

    }

    private function getSmsFromParams(SugarBean $bean, $params){
		
        $mob_no = array();
        //backward compatible
        if(isset($params['sms_target_type']) && !is_array($params['sms_target_type'])){
            $mob_nos = '';
            switch($params['sms_target_type']){
                case 'Mobile Number':
                    $params['sms'] = array($params['sms']);
                    break;
                case 'Specify User':
                    $params['sms'] = array($params['sms_user_id']);
                    break;
                case 'Related Field':
                    $params['sms'] = array($params['sms_target']);
                    break;
            }
            $params['sms_target_type'] = array($params['sms_target_type']);
            $params['sms_to_type'] = array('to');
        }
        //end backward compatible
        if(isset($params['sms_target_type'])){
            foreach($params['sms_target_type'] as $key => $field){
                switch($field){
                    case 'Mobile Number':
                        if(trim($params['sms'][$key]) != '')
                           $mob_no[$params['sms_to_type'][$key]][] = $params['sms'][$key];
                        break;
                    case 'Specify User':
                        $user = new User();
                        $user->retrieve($params['sms'][$key]);
                        $user_mob = $user->phone_mobile;
                        if(trim($user_mob) != '') {
                            $mob_no[$params['sms_to_type'][$key]][] = $user_mob;
                            $mob_no['template_override'][$user_mob] = array('Users' => $user->id);
                        }

                        break;
                    case 'Users':
                        $users = array();
                        switch($params['sms'][$key][0]) {
                            Case 'security_group':
                                if(file_exists('modules/SecurityGroups/SecurityGroup.php')){
                                    require_once('modules/SecurityGroups/SecurityGroup.php');
                                    $security_group = new SecurityGroup();
                                    $security_group->retrieve($params['sms'][$key][1]);
                                    $users = $security_group->get_linked_beans( 'users','User');
                                    $r_users = array();
                                    if($params['sms'][$key][2] != ''){
                                        require_once('modules/ACLRoles/ACLRole.php');
                                        $role = new ACLRole();
                                        $role->retrieve($params['sms'][$key][2]);
                                        $role_users = $role->get_linked_beans( 'users','User');
                                        foreach($role_users as $role_user){
                                            $r_users[$role_user->id] = $role_user->name;
                                        }
                                    }
                                    foreach($users as $user_id => $user){
                                        if($params['sms'][$key][2] != '' && !isset($r_users[$user->id])){
                                            unset($users[$user_id]);
                                        }
                                    }
                                    break;
                                }
                            //No Security Group module found - fall through.
                            Case 'role':
                                require_once('modules/ACLRoles/ACLRole.php');
                                $role = new ACLRole();
                                $role->retrieve($params['sms'][$key][2]);
                                $users = $role->get_linked_beans( 'users','User');
                                break;
                            Case 'all':
                            default:
                                global $db;
                                $sql = "SELECT id from users WHERE status='Active' AND portal_only=0 ";
                                $result = $db->query($sql);
                                while ($row = $db->fetchByAssoc($result)) {
                                    $user = new User();
                                    $user->retrieve($row['id']);
                                    $users[$user->id] = $user;
                                }
                                break;
                        }
                        foreach($users as $user){
                            $user_mob = $user->phone_mobile;
                            if(trim($user_mob) != '') {
                                $mob_no[$params['sms_to_type'][$key]][] = $user_mob;
                                $mob_no['template_override'][$user_mob] = array('Users' => $user->id);
                            }
                        }
                        break;
                    case 'Related Field':
                        $smsTarget = $params['sms'][$key];
                        $relatedFields = array_merge($bean->get_related_fields(), $bean->get_linked_fields());
                        $field = $relatedFields[$smsTarget];
                        if($field['type'] == 'relate') {
                            $linkedBeans = array();
                            $idName = $field['id_name'];
                            if(($bean->$idName)!='')
                            {
								$id = $bean->$idName;
								$linkedBeans[] = BeanFactory::getBean($field['module'], $id);
							}
							else
							{
								$id = $bean->parent_id;
								$linkedBeans[] = BeanFactory::getBean($field['module'], $id);
							}
                        }
                        else if($field['type'] == 'link'){
                            $relField = $field['name'];
                            if(isset($field['module']) && $field['module'] != '') {
                                $rel_module = $field['module'];
                            } else if($bean->load_relationship($relField)){
                                $rel_module = $bean->$relField->getRelatedModuleName();
                            }
                            $linkedBeans = $bean->get_linked_beans($relField,$rel_module);
                        }else{
                            $linkedBeans = $bean->get_linked_beans($field['link'],$field['module']);
                        }
                        if($linkedBeans){
                            foreach($linkedBeans as $linkedBean) {
								if($linkedBean->phone_mobile)
									$rel_sms = $linkedBean->phone_mobile;
								else if($linkedBean->phone_alternate)
									$rel_sms = $linkedBean->phone_alternate;	
                                if (trim($rel_sms) != '') {
                                    $mob_no[$params['sms_to_type'][$key]][] = $rel_sms;
                                    $mob_no['template_override'][$rel_sms] = array($linkedBean->module_dir => $linkedBean->id);
                                }
                            }
                        }
                        break;
                    case 'Record SMS':
						if($bean->phone_mobile)
							$recordSms = $bean->phone_mobile;
						else if($bean->phone_alternate)
							$recordSms = $bean->phone_alternate;
                        if(trim($recordSms) != '')
                            $mob_no[$params['sms_to_type'][$key]][] = $recordSms;
                        break;
                }
            }
        }
        
        return $mob_no;
    }

    function run_action(SugarBean $bean, $params = array(), $in_save=false){
		$GLOBALS['log']->fatal($bean->name.' ran in Wokflow!!!');
		 
		include_once('modules/tac_sms_templates/tac_sms_templates.php');
        $smsTemp = new tac_sms_templates();
        $smsTemp->retrieve($params['sms_template']);

        if($smsTemp->id == ''){
            return false;
        }
		
        $mob_no = $this->getSmsFromParams($bean,$params);
		
        if(isset($params['individual_sms']) && $params['individual_sms']){
			
            foreach($mob_no['to'] as $mob_noto){
                $smsTemp = new tac_sms_templates();
                $smsTemp->retrieve($params['sms_template']);
				$template_override = isset($mob_no['template_override'][$mob_noto]) ? $mob_no['template_override'][$mob_noto] : array();
                $this->parse_template($bean, $smsTemp,$template_override);
                if($smsTemp->send_text_only=='1')
				{
					$sms_body_html = $smsTemp->sms_body_plaintext;
				}
				else 
				{
					$sms_body_html = $smsTemp->sms_body;
				}
                $this->sendSMS(array($mob_noto), $sms_body_html, $bean->id, $bean->module_dir);
            }

        } else {
            $this->parse_template($bean, $smsTemp);
			if($smsTemp->send_text_only=='1')
			{
				$sms_body_html = $smsTemp->sms_body_plaintext;
			}
			else 
			{
				$sms_body_html = $smsTemp->sms_body;
			}
            return $this->sendSMS($mob_no['to'], $sms_body_html, $bean->id, $bean->module_dir);       
        }
        return true;
        
    }

    function parse_template(SugarBean $bean, &$template, $object_override = array()){
        global $sugar_config;

        require_once('modules/AOW_Actions/actions/templateParser.php');

        $object_arr[$bean->module_dir] = $bean->id;

        foreach($bean->field_defs as $bean_arr){
            if($bean_arr['type'] == 'relate'){
                if(isset($bean_arr['module']) &&  $bean_arr['module'] != '' && isset($bean_arr['id_name']) &&  $bean_arr['id_name'] != '' && $bean_arr['module'] != 'EmailAddress'){
                    $idName = $bean_arr['id_name'];
                    if(isset($bean->field_defs[$idName]) && $bean->field_defs[$idName]['source'] != 'non-db'){
                        if(!isset($object_arr[$bean_arr['module']])) $object_arr[$bean_arr['module']] = $bean->$idName;
                    }
                }
            }
            else if($bean_arr['type'] == 'link'){
                if(!isset($bean_arr['module']) || $bean_arr['module'] == '') $bean_arr['module'] = getRelatedModule($bean->module_dir,$bean_arr['name']);
                if(isset($bean_arr['module']) &&  $bean_arr['module'] != ''&& !isset($object_arr[$bean_arr['module']])&& $bean_arr['module'] != 'EmailAddress'){
                    $linkedBeans = $bean->get_linked_beans($bean_arr['name'],$bean_arr['module'], array(), 0, 1);
                    if($linkedBeans){
                        $linkedBean = $linkedBeans[0];
                        if(!isset($object_arr[$linkedBean->module_dir])) $object_arr[$linkedBean->module_dir] = $linkedBean->id;
                    }
                }
            }
        }

        $object_arr['Users'] = is_a($bean, 'User') ? $bean->id : $bean->assigned_user_id;

        $object_arr = array_merge($object_arr, $object_override);

        $parsedSiteUrl = parse_url($sugar_config['site_url']);
        $host = $parsedSiteUrl['host'];
        if(!isset($parsedSiteUrl['port'])) {
            $parsedSiteUrl['port'] = 80;
        }

        $port		= ($parsedSiteUrl['port'] != 80) ? ":".$parsedSiteUrl['port'] : '';
        $path		= !empty($parsedSiteUrl['path']) ? $parsedSiteUrl['path'] : "";
        $cleanUrl	= "{$parsedSiteUrl['scheme']}://{$host}{$port}{$path}";

        $url =  $cleanUrl."/index.php?module={$bean->module_dir}&action=DetailView&record={$bean->id}";
		
        $template->sms_body = str_replace("\$contact_user","\$user",$template->sms_body);
        $template->sms_body_plaintext = str_replace("\$contact_user","\$user",$template->sms_body_plaintext);
        $template->sms_body = aowTemplateParser::parse_template($template->sms_body, $object_arr);
        $template->sms_body = str_replace("\$url",$url,$template->sms_body);
        $template->sms_body_plaintext = aowTemplateParser::parse_template($template->sms_body_plaintext, $object_arr);
        $template->sms_body_plaintext = str_replace("\$url",$url,$template->sms_body_plaintext);
    }
    
    function sendSMS($sendTo,$smsBody,$note_parent_id,$note_parent_type){
		$my_file = 'Twilio.log';
		$handle = fopen($my_file, 'a') or die('Permission Denied: Cannot open file:  '.$my_file);
		$status ="";
		fwrite($handle, $status);
		$sendTo[0]=str_replace(' ','',$sendTo[0]);
		$sendTo[0];
		if (strpos($sendTo[0], '+') !== false) {
		}
		else
		{
			$sendTo[0]='+'.$sendTo[0];
		}
		
		include "custom/include/twilio-php-master/sendsms.php";
		
		$result = file_get_contents('https://requestb.in/1ab9px11');
		
		$date = date('D M j G:i:s T Y');
		$status .="\n";
		fwrite($handle, $date.'  [LOG]:  '.$status);
	}

     
    
}










?>
