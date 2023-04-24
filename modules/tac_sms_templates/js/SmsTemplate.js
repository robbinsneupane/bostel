
$( document ).ready(function() {
	
	//$('#sms_body').prop('readonly', true);
	$("#sms_body").parent().parent().hide();
	
    $("#sms_body_plaintext").parent().parent().hide();
	var val1= $("#modules").val();
	$.ajax({
		method:'POST',
		url:'index.php?entryPoint=getFields',
		data:'module='+val1,
		success:function(data){
			$("#module_fields").html(data);
		}
	}); 
	
	if($('#send_text_only').is(":checked")) {
		$("#sms_body_plaintext").parent().parent().show(); 
		//var iframe = $('#sms_body_html_ifr');
		//$('#tinymce[data-id="sms_body_html"]', iframe.contents()).empty();
			
	} 
	else {
		$("#sms_body_plaintext").parent().parent().hide(); 
		//$("#sms_body_plaintext").empty();
	}	
	
	$("#modules").change(function(){
		var val= $(this).val();
		$.ajax({
			method:'POST',
			url:'index.php?entryPoint=getFields',
			data:'module='+val,
			success:function(data){
				$("#module_fields").html(data);
			}
		}); 
	}); 
	$("#module_fields").change(function(){
		var mod_val=$("#modules option:selected").text().toLowerCase();
		var mod_field=$(this).val();
		$("#insert_variable").val('$'+mod_val+'_'+mod_field);
	});

	$("#insert_var_button").click(function(){
		var val=$("#insert_variable").val();
		//var iframe = $('#sms_body_html_ifr');
		//var getContent = $('#tinymce[data-id="sms_body_html"]', iframe.contents()).html();
		
		if($('#send_text_only').is(":checked")) {
			var textAreaTxt = $("#sms_body_plaintext").val();
			var caretPos = $("#sms_body_plaintext")[0].selectionStart;
			$("#sms_body_plaintext").val(textAreaTxt.substring(0, caretPos) + val + textAreaTxt.substring(caretPos) );	
		}
		else {
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, val );
		}	
	});
	
	$('#send_text_only').click(function() {
		if($(this).is(":checked")) {
			$("#sms_body_plaintext").parent().parent().show(); 
			
		} else {
			$("#sms_body_plaintext").parent().parent().hide(); 
		}		      
    });
    
	
});
