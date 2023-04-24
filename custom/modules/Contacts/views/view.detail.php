<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class ContactsViewDetail extends ViewDetail
{
    /**
     * @see SugarView::display()
     *
     * We are overridding the display method to manipulate the portal information.
     * If portal is not enabled then don't show the portal fields.
     */
    public function display()
    {
        global $sugar_config;

        $aop_portal_enabled = !empty($sugar_config['aop']['enable_portal']) && !empty($sugar_config['aop']['enable_aop']);

        $this->ss->assign("AOP_PORTAL_ENABLED", $aop_portal_enabled);

        require_once('custom/modules/AOS_PDF_Templates/formLetter.php');
        formLetter::DVPopupHtml('Contacts');

        $admin = new Administration();
        $admin->retrieveSettings();
        if (isset($admin->settings['portal_on']) && $admin->settings['portal_on']) {
            $this->ss->assign("PORTAL_ENABLED", true);
        }
        // echo $this->dv->display();
        parent::display();
    }
}
