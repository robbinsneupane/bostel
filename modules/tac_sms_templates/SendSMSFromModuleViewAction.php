<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Sending SMS from Module View Action File: List, Detail
 * 
 */

require_once 'modules/AOW_WorkFlow/aow_utils.php';
$recordIds				=	explode(',',$_REQUEST['uid']);
$module					=	$_REQUEST['module'];
$record_template_id		=	$_REQUEST['aow_actions_param_sms_template0'];
$user_template_id		=	$_REQUEST['aow_actions_param_sms_template1'];
$send_assigned_users	=	$_REQUEST['send_assigned_users'];
$view    =       $_REQUEST['view'];
$sms_body_html='';
$count=count($recordIds);
$bean_id='';
for($i=0;$i<$count;$i++){
	$sendTo='';
	
	$bean_id=$recordIds[$i];
	
	$bean = BeanFactory::getBean($module, $bean_id);
	
	$note_parent_id= $bean_id;
	$note_parent_type= $module;
	$note_subject= 'SMS To:'.$bean->name;
	
	if($bean->phone_mobile && $bean->phone_mobile!='')
		$sendTo=$bean->phone_mobile;	
	else if($bean->phone_alternate && $bean->phone_alternate!='')
		$sendTo=$bean->phone_alternate;
	
	// Retrieve Call Module Phone
	if($module=='Calls' || $module=='Meetings'){
		$parent_type = $bean-> parent_type;
		if($parent_type=='Accounts' || $parent_type=='Contacts' || $parent_type=='Leads'){
			$parent_id = $bean-> parent_id;
			$parent_bean = BeanFactory::getBean($parent_type, $parent_id);
			
			if($parent_bean->phone_mobile && $parent_bean->phone_mobile!='')
				$sendTo=$parent_bean->phone_mobile;	
			else if($parent_bean->phone_alternate && $parent_bean->phone_alternate!='')
				$sendTo=$parent_bean->phone_alternate;
			
			$note_parent_id = $parent_id;
			$note_parent_type = $parent_type;
			$note_subject = 'SMS To:['.$module.']'.$bean->name;
		}
	}
	// For Cases
	if($module=='Cases'){
		
		$parent_type = 'Accounts';
		$parent_id = $bean-> account_id;
		$parent_bean = BeanFactory::getBean($parent_type, $parent_id);	
		$sendTo=$parent_bean->phone_alternate;
		
		$note_parent_id = $parent_id;
		$note_parent_type = $parent_type;
		$note_subject = 'SMS To:['.$module.']'.$bean->name;
	}
	
	
	//Record Template
	unset($recordTemplateObj);
	$recordTemplateObj= BeanFactory::getBean('tac_sms_templates', $record_template_id);
	parse_template($bean, $recordTemplateObj);
	if($recordTemplateObj->send_text_only=='1')
	{
		$sms_body_html = $recordTemplateObj->sms_sms_body_plaintext;
	}
	else 
	{
		$sms_body_html = $recordTemplateObj->sms_sms_body;
	}
	
	
	// Send SMS
	sendSMS($sendTo,$sms_body_html,$note_parent_id,$note_parent_type,$note_subject,$module,$bean_id);
	
	
	if($send_assigned_users=='on')
	{
		//User Template
		// Assigned User 
		$userObj= BeanFactory::getBean('Users', $bean->assigned_user_id);
		
		unset($assignedUserTemplateObj);
		$assignedUserTemplateObj= BeanFactory::getBean('tac_sms_templates', $user_template_id);
		
		$note_subject = 'SMS To Assigned User:['.$module.']'.$userObj->name;
		
		parse_template($bean, $assignedUserTemplateObj);
		if($assignedUserTemplateObj->send_text_only=='1')
		{
			$sms_body_html = $assignedUserTemplateObj->sms_sms_body_plaintext;
		}
		else 
		{
			$sms_body_html = $assignedUserTemplateObj->sms_sms_body;
		}
		if($userObj->phone_mobile!='')
		{
			$sendToUser=$userObj->phone_mobile;
			sendSMS($sendToUser,$sms_body_html,$note_parent_id,$note_parent_type,$note_subject,$module,$bean_id);
		}
			
	}
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
        $sms_body = str_replace("\$contact_user","\$user",$template->sms_body);
        $sms_body_plaintext = str_replace("\$contact_user","\$user",$template->sms_body_plaintext);
        $sms_body = aowTemplateParser::parse_template($sms_body, $object_arr);
        $template->sms_sms_body = str_replace("\$url",$url,$sms_body);
        $sms_body_plaintext = aowTemplateParser::parse_template($sms_body_plaintext, $object_arr);
        $template->sms_sms_body_plaintext = str_replace("\$url",$url,$sms_body_plaintext);
    }
    
    function sendSMS($sendTo,$smsBody,$note_parent_id,$note_parent_type,$note_subject,$module,$bean_id){
		$my_file = 'Twilio.log';
		$handle = fopen($my_file, 'a') or die('Permission Denied: Cannot open file:  '.$my_file);
		$status ="";
		fwrite($handle, $status);
		if($sendTo!='')
		{
			$sendTo=str_replace(' ','',$sendTo);
			include "custom/include/twilio-php-master/sendsms.php";
		}
		else
			$status="[FETAL]: No Mobile Number found";
		
		$date = date('D M j G:i:s T Y');
		$status .="\n";
		fwrite($handle, $date.'  [LOG]:  '.$status);
		
		// Add Notes
		
		$noteObj=new Note();
		$noteObj->name =  $note_subject;
		$noteObj->parent_id =  $note_parent_id;
		$noteObj->parent_type =  $note_parent_type;
		$noteObj->description =  $status;
		if($module=='Contacts')
			$noteObj->contact_id=$bean_id;
		$noteObj->save();
		
	}
if($view=='DetailView')
	SugarApplication::redirect("index.php?module=$module&action=$view&record=$bean_id");
else
	SugarApplication::redirect("index.php?module=$module");
