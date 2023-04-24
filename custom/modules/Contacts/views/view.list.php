<?php

require_once('modules/Contacts/ContactsListViewSmarty.php');

class ContactsViewList extends ViewList
{
    private $roles;
    public function __construct()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);
        parent::__construct();
    }
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay()
    {
        global $current_user;
        require_once('modules/AOS_PDF_Templates/formLetter.php');
        formLetter::LVPopupHtml('Contacts');
        parent::preDisplay();
        $this->lv = new ContactsListViewSmarty();
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
