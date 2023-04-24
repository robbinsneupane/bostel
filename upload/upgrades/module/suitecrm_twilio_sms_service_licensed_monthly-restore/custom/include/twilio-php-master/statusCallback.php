<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Action to get status callback from Twilio while sending ams
 * 
 */

global $db;

// Get request
$status = $_REQUEST['MessageStatus'];
$to = $_REQUEST['To'];
$from = $_REQUEST['From'];
$module = $_REQUEST['bean_module'];
$bean_id = $_REQUEST['bean_id'];
$body = $_REQUEST['body'];
$sms_sid = $_REQUEST['SmsSid'];
$date=date('Y-m-d H:i:s');
$segment= $_REQUEST['segment'];
// In schedular 
if(isset($_REQUEST['in_schedular']) && ($_REQUEST['in_schedular']=='true')){
	if(isset($_REQUEST['suite_sms_id']) && $_REQUEST['suite_sms_id']!=''){
        	$message_id= $_REQUEST['suite_sms_id'];
        	$Obj = BeanFactory::getBean('tac_inbound_message', $message_id);
	        $Obj -> status = $status;
		$Obj -> segment = $segment+1;
		if($Obj-> sms_sid != $sms_sid){                                    // This is to increase counter for unique sms_sid
			$Obj -> scheduler_count = $Obj->scheduler_count +1;
			$Obj -> sms_sid = $sms_sid;
		}
	        if($status == 'delivered'){
        	        $Obj -> is_delivered = 1;
                	$Obj -> date_delivered = $date;
		}
	        $Obj -> save();
	}
}
else{
	$sql="Select * from tac_inbound_message WHERE sms_sid='".$sms_sid."' AND deleted=0";
	$result=$db->query($sql);
	if($db->getRowCount($result)>0){
		$row= $db->fetchByAssoc($result);
		$message_id= $row['id'];
		$Obj = BeanFactory::getBean('tac_inbound_message', $message_id);
		$Obj -> status = $status;
		$Obj -> date_delivered = $date;
		$Obj -> segment = $row['segment']+1;
		if($status == 'delivered')
			$Obj -> is_delivered = 1;
		$Obj -> save();
	}
	// Add Message log     
	else{         
		$messageObj= new tac_inbound_message();
		$messageObj->name =  $body;
		$messageObj->from_phone =  $from;
		$messageObj->to_phone =  $to;
		$messageObj->status =  $status;
		$messageObj->sms_sid = $sms_sid;
		$messageObj->segment = 1;
		$messageObj->save();

		$message_id = $messageObj->id;

		// Bean Rel
		$rel_id=create_guid();
	
		$insert_bean="INSERT INTO `tac_inbound_message_bean_rel`(`id`, `message_id`, `bean_id`, `bean_module`, `date_modified`, `deleted`) VALUES ('$rel_id','$message_id','$bean_id','$module','$date',0)";
		$db->query($insert_bean);
	}
}
