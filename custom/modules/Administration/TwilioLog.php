<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Twilio Log Entrypoint file for ajax response 
 * 
 */


if(isset($_REQUEST['clearLog']) && $_REQUEST['clearLog']=='true'){
	$myFile = "Twilio.log";
    $file = fopen($myFile, 'w');
    $theData = fwrite($file,'');
    fclose($file);
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    echo $theData;
}

if(isset($_REQUEST['viewLog']) && $_REQUEST['viewLog']=='true'){
	$myFile = "Twilio.log";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    echo $theData;
}
