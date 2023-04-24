<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class LeadsViewDetail extends ViewDetail
{
    public function display()
    {
        global $sugar_config;

        require_once('custom/modules/AOS_PDF_Templates/formLetter.php');
        formLetter::DVPopupHtml('Leads');

        //If the convert lead action has been disabled for already converted leads, disable the action link.
        $disableConvert = ($this->bean->status == 'Converted' && !empty($sugar_config['disable_convert_lead'])) ? true : false;
        $this->ss->assign("DISABLE_CONVERT_ACTION", $disableConvert);
        parent::display();
    }
}
