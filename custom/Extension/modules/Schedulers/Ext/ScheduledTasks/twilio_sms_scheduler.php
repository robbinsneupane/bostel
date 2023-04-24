<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio SMS Scheduler which is sending undelivered sms 
 * 
 */
 
$job_strings[] = 'twilio_sms_scheduler';

function twilio_sms_scheduler(){
        global $db,$sugar_config;
	$schLimit = $sugar_config['limit_of_twilio_schedular_trials'];
       	$sql="SELECT * FROM tac_inbound_message where status!='delivered' AND status!='recieved' AND is_delivered!=1 AND scheduler_count<$schLimit AND deleted=0 ";
	$result= $db->query($sql);
        if($db->getRowCount($result)>0){
                while($row=$db->fetchByAssoc($result)){
                        $suite_sms_id = $row['id'];
                       	$smsBody=$row['name'];
                        $to= $row['to_phone'];
			$segment= $row['segment'];
			$scheduler_count= $row['scheduler_count'];
                        $bean="Select * from tac_inbound_message_bean_rel where message_id='".$row['id']."' AND deleted=0";
                        $result_bean = $db->query($bean);
                        if($db->getRowCount($result_bean)>0){
                       		while($bean_row=$db->fetchByAssoc($result_bean)){
                        	        $parent_id = $bean_row['bean_id'];
                               		$parent_type = $bean_row['bean_module'];
                                	sendSMS($to,$smsBody,$parent_id,$parent_type,$suite_sms_id,$segment);
                                }
                     	}
                      
                }
        }
}

function sendSMS($sendTo,$smsBody,$note_parent_id,$note_parent_type,$suite_sms_id,$segment){
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

        include "custom/include/twilio-php-master/sendsmsFromSchedular.php";
        $date = date('D M j G:i:s T Y');
        $status .="\n";
        fwrite($handle, $date.'  [LOG]:  '.$status);
}


