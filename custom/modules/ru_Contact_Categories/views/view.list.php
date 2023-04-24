<?php
require_once('include/ListView/ListViewSmarty.php');
class ru_Contact_CategoriesViewList extends ViewList
{
    private $roles;

    function ru_Contact_CategoriesViewList()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $this->roles = $aclRole->getUserRoleNames($current_user->id);

        parent::ViewList();
    }

    public function listViewProcess()
    {
        // echo "<pre>"; print_r($_REQUEST); die;
        // custom code added by Rupendra for hide checkboxes start
        if (in_array('Bostel Clients', $this->roles)) {
            // custom where added so admin created record can be see
            $this->params['custom_where'] = ' OR ru_contact_categories.created_by=1';
            $this->lv->setup($this->seed, 'custom/include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            echo $this->lv->display();
        } else {
            parent::listViewProcess();
        }
        // custom code added by Rupendra for hide checkboxes end

    }
}
