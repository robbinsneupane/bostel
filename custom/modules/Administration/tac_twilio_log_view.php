<!-- 
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio Log File View and Clear
 * 
-->

<h2>View Log</h2>
<script type="text/javascript">
	
$(document).ready(function(){
$('#clear_log').hide();
	$('#workflow').on('click', function(){
			$('#clear_log').show();
			$.ajax({url: "index.php?entryPoint=TwilioLog&viewLog=true", success: function(result){
				$("#viewLog").html('<pre>'+result+'</pre>');
			}});
		});
	$('#clear_log').on('click', function(){
			$.ajax({url: "index.php?entryPoint=TwilioLog&clearLog=true", success: function(result){
				$("#viewLog").html('<pre>'+result+'</pre>');
			}});
		});
});
</script>
<button name="workflow" id="workflow">View Log</button>
<button name="clear_log" id="clear_log">Clear Log</button>
<div id='viewLog'></div>


