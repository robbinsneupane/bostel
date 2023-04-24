<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Send SMS Twilio Action
 * 
 */

use Twilio\Rest\Client;
require_once('modules/tac_sms_templates/license/OutfittersLicense.php');
$validate_license = OutfittersLicense::isValid('tac_sms_templates');
if($validate_license !== true) {
    if(is_admin($current_user)) {
        SugarApplication::appendErrorMessage('SuiteCRM Twilio SMS Service is no longer active due to the following reason: '.$validate_license.' Users will have limited to no access until the issue has been addressed.');
    }
    echo '<h2><p class="error">SuiteCRM Twilio SMS Service is no longer active</p></h2><p class="error">Please renew your subscription or check your license configuration.</p>';
    $status="[LICENSE]: SuiteCRM Twilio SMS Service is no longer active.Please renew your subscription or check your license configuration.";
}
else
{
	// Continue Flow
	global $db,$sugar_config;
	$siteUrl = $sugar_config['site_url'];
	
	if(isset($sugar_config['twilio_account_sid']) && isset($sugar_config['twilio_auth_token']) && isset($sugar_config['twilio_phone_no'])){
		$sid = $sugar_config['twilio_account_sid'];
		$token = $sugar_config['twilio_auth_token'];
		$from= $sugar_config['twilio_phone_no'];
		
		if($sid!='' && $token!='' && $from!=''){
			require_once "Twilio/autoload.php";
			$client = new Client($sid, $token);
			try{
				$message = $client->messages->create(
				  $sendTo, // Text this number
				  array(
					'from' => $from, // From a valid Twilio number
					'body' => $smsBody,
					'statusCallback' => $siteUrl."/index.php?entryPoint=statusCallBack&bean_module=".$note_parent_type."&bean_id=".$note_parent_id."&body=".rawurlencode($smsBody)
				  )
				);
				$status ="[SUCCESS]: Sent Successfully!";
			}
			catch(Exception $e){
				echo $status = "[FATAL]: ".$e->getCode() . ' : ' . $e->getMessage();
			 }
		}
		else{
			$status="[ERROR]: Twilio Account settings is blank. Please set your Twilio Account First.";
		}	
	}
	else{
		$status="[ERROR]: Twilio Account is not set. Please go to admin panel for Twilio settings.";
	}

}

