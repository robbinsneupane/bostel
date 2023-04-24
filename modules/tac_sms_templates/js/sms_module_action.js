/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: SMS module Acion JS File
 * 
 */
$(document).ready(function(){
		$("#edit_sms_template").hide();
		$("#edit_assigned_user_sms_template").hide();
		$("#individual_smsTempModal").hide(); 
		var button = $('<li class="noBullet" id="sendSMS_li"><a id="sendSMS_link">Send SMS</a></li>');
		$(".selectActions li ul").append(button);	
		$('#sendSMS_li a').click(function(evt) {
			$("#smsTempModal").modal("show");
			sugarListView.get_checks();
			var uids=document.MassUpdate.uid.value;
			$("#uid").val(uids);
		});
		
		$("#edit_sms_template").click(function(){
			var sms_templates_id = $("#aow_actions_param_sms_template0").val();
			URL = "index.php?module=tac_sms_templates&action=EditView&record="+sms_templates_id+"&showJsInPopUpListView=1&line=1";

			windowName = 'tac_sms_templates';
			windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

			win = window.open(URL, windowName, windowFeatures);
			if (window.focus) {
				// put the focus on the popup if the browser supports the focus() method
				win.focus();
			}
		});
		
		$("#create_sms_template").click(function(){
			URL = "index.php?module=tac_sms_templates&action=EditView&showJsInPopUpListView=1&line=0";

			windowName = 'tac_sms_templates';
			windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

			win = window.open(URL, windowName, windowFeatures);
			if (window.focus) {
				// put the focus on the popup if the browser supports the focus() method
				win.focus();
			}
		});
		
		$("#edit_assigned_user_sms_template").click(function(){
			var user_sms_templates_id = $("#aow_actions_param_sms_template1").val();
			URL = "index.php?module=tac_sms_templates&action=EditView&record="+user_sms_templates_id+"&showJsInPopUpListView=1&line=1";

			windowName = 'tac_sms_templates';
			windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

			win = window.open(URL, windowName, windowFeatures);
			if (window.focus) {
				// put the focus on the popup if the browser supports the focus() method
				win.focus();
			}
		});
		
		$("#create_assigned_user_sms_template").click(function(){
			URL = "index.php?module=tac_sms_templates&action=EditView&showJsInPopUpListView=1&line=1";

			windowName = 'tac_sms_templates';
			windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

			win = window.open(URL, windowName, windowFeatures);
			if (window.focus) {
				win.focus();
			}
				
		});
		
		$('#send_assigned_user').click(function() {
			if($(this).is(":checked")) {
				$("#individual_smsTempModal").show(); 
			} else {
				$("#individual_smsTempModal").hide(); 
				removeFromValidate('ListView' , 'aow_actions_param_sms_template1');
			}		      
		});
		
		
		$('#smsListViewForm').on('submit', function() {
			if($("#aow_actions_param_sms_template0").val()==''){
				alert("Template is required");
				$("#aow_actions_param_sms_template0").css("border", "2px solid red");
				return false;
			}
			else{
				$("#aow_actions_param_sms_template0").css("border", "2px solid green");
				//return true;
			}
			if($('#send_assigned_user').is(":checked")){
				if($("#aow_actions_param_sms_template1").val()==''){
						alert("User template is required");
						$("#aow_actions_param_sms_template1").css("border", "2px solid red");
						return false;
					}
					else{
						$("#aow_actions_param_sms_template1").css("border", "2px solid green");
						return true;
					}
			}		
		});
		
		$('#aow_actions_param_sms_template0').change(function(){
			if($(this).val()!='')
				$("#edit_sms_template").show();
			else
				$("#edit_sms_template").hide();

		});		
		
		$('#aow_actions_param_sms_template1').change(function(){
            if($(this).val()!='')
                $("#edit_assigned_user_sms_template").show();
            else
                $("#edit_assigned_user_sms_template").hide();

        });	
});
// DetailView
function showModal(uid){
	$("#uid").val(uid);
	$("#smsTempModal").modal("show");
}
