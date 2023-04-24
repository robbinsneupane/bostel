<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: EntryPoint to get Receive SMS webhook from twilio 
 * 
 */
$entry_point_registry['ReceiveSMS'] = array(
  'file' => 'custom/include/twilio-php-master/receive_sms.php',
  'auth' => false
);
