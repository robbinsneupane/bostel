<?php 
 //WARNING: The contents of this file are auto-generated


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



/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: EntryPoint to send SMS from Module View i.e., ListView and DetailView
 * 
 */
    $entry_point_registry['sendSMSFromListView'] = array(
        'file' => 'modules/tac_sms_templates/SendSMSFromModuleViewAction.php',
        'auth' => true
    );


/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: EntryPoint to View Twilio Log
 * 
 */
    $entry_point_registry['TwilioLog'] = array(
        'file' => 'custom/modules/Administration/TwilioLog.php',
        'auth' => true
    );


/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: Entry Point to get SMS fields In SMS Template Modules
 * 
 */
    $entry_point_registry['getFields'] = array(
        'file' => 'modules/tac_sms_templates/get_fields.php',
        'auth' => true
    );


/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: EntryPoint to get Status Call Back from Twilio
 * 
 */
    $entry_point_registry['statusCallBack'] = array(
        'file' => 'custom/include/twilio-php-master/statusCallback.php',
        'auth' => false
    );


$entry_point_registry['privacy_policy'] = array(
	'file' => 'custom/modules/Home/privacy_policy.php',
	'auth' => false
);

$entry_point_registry['file_uploads'] = array(
	'file' => 'custom/include/multiFileUpload/upload.php',
	'auth' => true
);

$entry_point_registry['customGeneratePdf'] = array(
	'file' => 'custom/modules/AOS_PDF_Templates/generatePdf.php',
	'auth' => false
);

$entry_point_registry['customFormLetter'] = array(
	'file' => 'custom/modules/AOS_PDF_Templates/formLetterPdf.php',
	'auth' => false
);
