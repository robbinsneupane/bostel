/**
 * Advanced OpenWorkflow, Automating SugaremailM.
 * @package Advanced OpenWorkflow for SugaremailM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 *
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: JS file for Sending SMS from Workflow
 * 
 */

var currentln;
var smsln = new Array();
function show_edit_template_link(field, ln) {
    var field1 = document.getElementById('aow_actions_edit_template_link' + ln);
    if (field.selectedIndex == 0) {
        field1.style.visibility = "hidden";
    } else {
        field1.style.visibility = "visible";
    }
}

function refresh_sms_template_list(template_id, template_name) {
    refresh_template_list(template_id, template_name,currentln);
}

function refresh_template_list(template_id, template_name, ln) {
    var field = document.getElementById('aow_actions_param_sms_template' + ln);
    var bfound = 0;
    for (var i = 0; i < field.options.length; i++) {
        if (field.options[i].value == template_id) {
            if (field.options[i].selected == false) {
                field.options[i].selected = true;
            }
            field.options[i].text = template_name;
            bfound = 1;
        }
    }
    //add item to selection list.
    if (bfound == 0) {
        var newElement = document.createElement('option');
        newElement.text = template_name;
        newElement.value = template_id;
        field.options.add(newElement);
        newElement.selected = true;
    }

    //enable the edit button.
    var field1 = document.getElementById('aow_actions_sms_template_link' + ln);
    field1.style.visibility = "visible";
}

function open_sms_template_form(ln) {
    currentln = ln;
    URL = "index.php?module=tac_sms_templates&action=EditView";//ak
    URL += "&showJs=1&line="+currentln;

    windowName = 'tac_sms_templates';
    windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

    win = window.open(URL, windowName, windowFeatures);
    if (window.focus) {
        // put the focus on the popup if the browser supports the focus() method
        win.focus();
    }
}

function edit_sms_template_form(ln) {
    currentln = ln;
    var field = document.getElementById('aow_actions_param_sms_template' + ln);
    URL = "index.php?module=tac_sms_templates&action=EditView";//ak
    if (field.options[field.selectedIndex].value != 'undefined') {
        URL += "&record=" + field.options[field.selectedIndex].value;
    }
    URL += "&showJs=1";

    windowName = 'tac_sms_templates';
    windowFeatures = 'width=600' + ',height=600' + ',resizable=1,semailollbars=1';

    win = window.open(URL, windowName, windowFeatures);
    if (window.focus) {
        // put the focus on the popup if the browser supports the focus() method
        win.focus();
    }
}

function show_smsField(ln, cln, value){
    if (typeof value === 'undefined') { value = ''; }

    flow_module = document.getElementById('flow_module').value;
    var aow_smstype = document.getElementById('aow_actions_param'+ln+'_sms_target_type'+cln).value;
    if(aow_smstype != ''){
        var callback = {
            success: function(result) {
                document.getElementById('smsLine'+ln+'_field'+cln).innerHTML = result.responseText;
                SUGAR.util.evalScript(result.responseText);
                enableQS(false);
            },
            failure: function(result) {
                document.getElementById('smsLine'+ln+'_field'+cln).innerHTML = '';
            }
        }

        var aow_field_name = "aow_actions_param["+ln+"][sms]["+cln+"]";

        YAHOO.util.Connect.asyncRequest ("GET", "index.php?module=AOW_WorkFlow&action=getSMSField&aow_module="+flow_module+"&aow_newfieldname="+aow_field_name+"&aow_type="+aow_smstype+"&aow_value="+value,callback);
    }
    else {
        document.getElementById('smsLine'+ln+'_field'+cln).innerHTML = '';
    }
}

function load_smsline(ln, to, type, value){
    cln = add_smsLine(ln);
    document.getElementById("aow_actions_param"+ln+"_sms_to_type"+cln).value = to;
    document.getElementById("aow_actions_param"+ln+"_sms_target_type"+cln).value = type;
    show_smsField(ln, cln, value);
}

function add_smsLine(ln){

    var aow_sms_type_list = document.getElementById("aow_sms_type_list").value;
    document.getElementById("sms_to_button_click"+ln).value=ln;
    if(smsln[ln] == null){smsln[ln] = 0}

    tablebody = document.createElement("tbody");
    tablebody.id = 'smslLine'+ln+'_body' + smsln[ln];
    document.getElementById('smsLine'+ln+'_table').appendChild(tablebody);

    var x = tablebody.insertRow(-1);
    x.id = 'smsLine'+ln+'_line' + smsln[ln];

    var a = x.insertCell(0);
    a.innerHTML = "<input type='hidden' tabindex='116' name='aow_actions_param["+ln+"][sms_to_type]["+smsln[ln]+"]' id='aow_actions_param"+ln+"_sms_to_type"+smsln[ln]+"' value='to'></input> ";
	//a.innerHTML += "";
    a.innerHTML += "To:<select tabindex='116' name='aow_actions_param["+ln+"][sms_target_type]["+smsln[ln]+"]' id='aow_actions_param"+ln+"_sms_target_type"+smsln[ln]+"' onchange='show_smsField(" + ln + "," + smsln[ln] + ");'>" + aow_sms_type_list + "</select> ";

    a.innerHTML += "<span id='smsLine"+ln+"_field"+smsln[ln]+"'><input id='aow_actions_param["+ln+"][sms]["+smsln[ln]+"]' type='text' tabindex='116' size='25' name='aow_actions_param["+ln+"][sms]["+smsln[ln]+"]' onkeypress='javascript:return validatePhone(event,this);'></span>";
    
    a.innerHTML += "<button type='button' id='smsLine"+ln+"_delete" + smsln[ln]+"' class='button' value='Remove Line' tabindex='116' onclick='clear_smsLine(" + ln + ",this);'><img src='themes/default/images/id-ff-remove-nobg.png' alt='Remove Line'></button> ";

	
	addToValidate("EditView","aow_actions_param["+ln+"][sms]["+smsln[ln]+"]",'phone', true,'Please enter mobile number');

    smsln[ln]++;

    return smsln[ln] -1;

}

function clear_smsLine(ln, cln){

    document.getElementById('smsLine'+ln+'_table').deleteRow(cln.parentNode.parentNode.rowIndex);
    var len = $('#smsLine'+ln+'_table  tbody tr').length;
    if(len == 0)
    {
		document.getElementById("sms_to_button_click"+ln).value='';
    }
}

function validatePhone(e,cln) {
	if (e.which < 40 || e.which > 57) {
		//alert("Invalid value");
		cln.style.borderColor = "red";
		return false;
		
	}
	if(cln.value.length>15)
	{
		//alert("Mobile Length must be 10 digits");
		cln.style.borderColor = "red";
		return false;
	}
	else
	{
		cln.style.borderColor = "green";
		return true;
	}
}
function clear_smsLines(ln){

    var sms_rows = document.getElementById('smsLine'+ln+'_table').getElementsByTagName('tr');
    var sms_row_length = sms_rows.length;
    var i;
    for (i=0; i < sms_row_length; i++) {
        document.getElementById('smsLine'+ln+'_table').deleteRow(sms_rows[i]);
    }
}

function hideElem(id){
    if(document.getElementById(id)){
        document.getElementById(id).style.display = "none";
        document.getElementById(id).value = "";
    }
}

function showElem(id){
    if(document.getElementById(id)){
        document.getElementById(id).style.display = "";
    }
}

function targetTypeChanged(ln){
    var elem = document.getElementById("aow_actions_param_sms_target_type"+ln);
    if(elem.value === 'Phone No'){
        showElem("aow_actions_param_sms"+ln);
        hideElem("aow_actions_param_sms_target"+ln);
        hideElem("aow_actions_sms_user_span"+ln);
    }else if(elem.value === 'Specify User'){
        hideElem("aow_actions_param_sms"+ln);
        hideElem("aow_actions_param_sms_target"+ln);
        showElem("aow_actions_sms_user_span"+ln);
    }else if(elem.value === 'Related Field'){
        hideElem("aow_actions_param_sms"+ln);
        showElem("aow_actions_param_sms_target"+ln);
        hideElem("aow_actions_sms_user_span"+ln);
    }else if(elem.value === 'Record Sms'){
        hideElem("aow_actions_param_sms"+ln);
        hideElem("aow_actions_param_sms_target"+ln);
        hideElem("aow_actions_sms_user_span"+ln);
    }
}

