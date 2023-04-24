<?php
require_once('include/MVC/View/views/view.list.php');
require_once('include/ListView/ListViewSmarty.php');
class AOR_ReportsViewList extends ViewList
{
    public $roles;
    function AOR_ReportsViewList()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);

        parent::ViewList();
    }

    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay()
    {
        // custom code added by Rupendra for hide checkboxes start
        $this->lv = new ListViewSmarty();
        // custom code added by Rupendra for hide checkboxes end
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
