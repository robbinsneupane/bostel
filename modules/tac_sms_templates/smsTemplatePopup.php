<?php

/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: SMS Template Pop View
 * 
 */

global $db;

$modal=
'<div id="smsTempModal" class="modal fade" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">X</button>
				<h4 class="modal-title">Action</h4>
			</div>
			<div class="modal-body" style="overflow-x:auto;">';
				$modal .='<form id="smsListViewForm" action="index.php?entryPoint=sendSMSFromListView&module='.$module.'&view='.$GLOBALS['app']->controller->action.'" method="Post">
				<input type="hidden" id="uid" name="uid">
				Sms Template:<select id="aow_actions_param_sms_template0" name="aow_actions_param_sms_template0">
								<option value="">--None--</option>';
				
				$fetch_templates = 'Select * from tac_sms_templates WHERE deleted=0 order by date_entered desc';
				$result=$db->query($fetch_templates);
				while($row=$db->fetchByAssoc($result)){
				//print_r($row);
					$modal .='<option value="'.$row['id'].'">'.$row['name'].'</option>';
				}
				$modal .='</select>
				<input type="button" id="create_sms_template" class="btn btn-default" value="Create">
				<input type="button" id="edit_sms_template" class="btn btn-default" value="Edit">
				<br/>
				<br/>Send to assigned user:<input type="checkbox" id="send_assigned_user" name="send_assigned_users">
				<div id="individual_smsTempModal">
					<br/>Template for assigned user:<select name="aow_actions_param_sms_template1" id="aow_actions_param_sms_template1">
														<option value="">--None--</option>';
					
					$fetch_templates_for_user = 'Select * from tac_sms_templates WHERE deleted=0 order by date_entered desc';
					$result_for_users=$db->query($fetch_templates_for_user);
					while($row_user_template=$db->fetchByAssoc($result_for_users)){
						$modal .='<option value="'.$row_user_template['id'].'">'.$row_user_template['name'].'</option>';
					}
					$modal.='</select>
					<input type="button" id="create_assigned_user_sms_template" class="btn btn-default" value="Create">
					<input type="button" id="edit_assigned_user_sms_template" class="btn btn-default" value="Edit">
				</div>
				<br/><br/><button type="submit" class="btn btn-default">Send</button>
				</form>';
				$modal .='
			</div>
		</div>
	</div>
</div>';


echo $modal;
?>

