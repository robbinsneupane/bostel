<?php

require_once('modules/Leads/LeadsListViewSmarty.php');

class LeadsViewList extends ViewList
{
    private $roles;
    function __construct()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);
    }

    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay()
    {

        require_once('modules/AOS_PDF_Templates/formLetter.php');
        formLetter::LVPopupHtml('Leads');
        parent::preDisplay();

        $this->lv = new LeadsListViewSmarty();
    }

    public function listViewProcess()
    {
        // custom code added by Rupendra for hide checkboxes start
        if (in_array('Bostel Clients', $this->roles)) {
            $this->lv->setup($this->seed, 'custom/include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            echo $this->lv->display();
        } else {
            parent::listViewProcess();
        }
        // custom code added by Rupendra for hide checkboxes end

    }
}
