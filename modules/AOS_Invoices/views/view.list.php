<?php

require_once 'include/MVC/View/views/view.list.php';

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class AOS_InvoicesViewList extends ViewList
{
    private $roles;
    public function AOS_InvoicesViewList()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);
        parent::__construct();
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
