<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio Webhook Action for Receiving the SMS
 * 
 */

$number = $_REQUEST['From'];
$to_number = $_REQUEST['To'];
$body = addslashes($_REQUEST['Body']);
$msgObj = new tac_inbound_message();
$msgObj->name = $body;
$msgObj->from_phone = $number;
$msgObj->to_phone = $to_number;
$msgObj->status = 'recieved';
$msgObj->save();
$message_id=$msgObj->id;


require_once('modules/tac_sms_templates/license/OutfittersLicense.php');
$validate_license = OutfittersLicense::isValid('tac_sms_templates');
if($validate_license !== true) {
    if(is_admin($current_user)) {
        SugarApplication::appendErrorMessage('SuiteCRM Twilio SMS Service is no longer active due to the following reason: '.$validate_license.' Users will have limited to no access until the issue has been addressed.');
    }
    echo '<h2><p class="error">SuiteCRM Twilio SMS Service is no longer active</p></h2><p class="error">Please renew your subscription or check your license configuration.</p>';
}
else
{
	//Continue Flow
	// Search Phone in Enabled modules
	global $sugar_config,$db;
	$count= count($sugar_config['enabled_twilio_modules']);
	$date=date('Y-m-d H:i:s');
	for($i=0;$i<$count;$i++)
	{
		$upper_module=$sugar_config['enabled_twilio_modules'][$i];
		$module=$sugar_config['enabled_twilio_modules'][$i];
		$module=strtolower($module);
		if($module=='accounts'){
			$search_qry1= "Select id from $module where phone_alternate='$number' AND deleted=0";
			$res1=$db->query($search_qry1);
			if($db->getRowCount($res1)>0)
			{
				while($row1=$db->fetchByAssoc($res1))
				{
					$bean_id= $row1['id'];
								$rel_id=create_guid();
								$insert_bean="INSERT INTO `tac_inbound_message_bean_rel`(`id`, `message_id`, `bean_id`, `bean_module`, `date_modified`, `deleted`) VALUES ('$rel_id','$message_id','$bean_id','$upper_module','$date',0)";
								$db->query($insert_bean);
				}
			}
		}
		else{
			$search_qry="Select id from $module where phone_mobile='$number'  AND deleted=0";
			$res=$db->query($search_qry);
			if($db->getRowCount($res)>0)
			{
				while($row=$db->fetchByAssoc($res))
				{
								$bean_id=$row['id'];
								$rel_id=create_guid();
								$insert_bean="INSERT INTO `tac_inbound_message_bean_rel`(`id`, `message_id`, `bean_id`, `bean_module`, `date_modified`, `deleted`) VALUES ('$rel_id','$message_id','$bean_id','$upper_module','$date',0)";
					$db->query($insert_bean);
						}
			}
			$cstmModule=$module.'_cstm';
					if ($db->tableExists($cstmModule)){
				$search_qry_cstm="Select id_c from $cstmModule where phone_mobile_c='$number' AND deleted=0";
				$res_cstm=$db->query($search_qry_cstm);
				if($db->getRowCount($res_cstm)>0)
				{
					while($row_cstm=$db->fetchByAssoc($res_cstm))
					{
						$bean_id=$row_cstm['id'];
						$rel_id=create_guid();
						$insert_bean="INSERT INTO `tac_inbound_message_bean_rel`(`id`, `message_id`, `bean_id`, `bean_module`, `date_modified`, `deleted`) VALUES ('$rel_id','$message_id','$bean_id','$upper_module','$date',0)";
						$db->query($insert_bean);
					}
				}
			}
		}
	}
}
header('Content-Type: text/xml');
?>
<Response>
    <Message>
        Hello <?php echo $number ?>.
        You said <?php echo $body ?>
    </Message>
</Response>

