<?php
require_once('include/ListView/ListViewSmarty.php');
class SecurityGroupsViewList extends ViewList
{
    private $roles;

    function SecurityGroupsViewList()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);

        parent::ViewList();
    }
    /**
     * @see SugarView::preDisplay()
     */
    public function preDisplay()
    {
        // custom code added by Rupendra for hide checkboxes start 

        $this->lv = new ListViewSmarty();
        if (in_array('Bostel Clients', $this->roles)) {
            $this->lv->multiSelect = false; //    Removes Check Box  
        }
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
