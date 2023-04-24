<?php
require_once('include/MVC/View/views/view.list.php');
require_once('include/ListView/ListViewSmarty.php');
class CallsViewList extends ViewList
{
    public $roles;
    function CallsViewList()
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
        $this->processSearchForm();
        $this->lv->searchColumns = $this->searchForm->searchColumns;

        if (!$this->headers) {
            return;
        }
        if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
            $this->lv->ss->assign("SEARCH", true);
            $this->lv->ss->assign('savedSearchData', $this->searchForm->getSavedSearchData());
            // add recurring_source field to filter to be able acl check to use it on row level
            $this->lv->mergeDisplayColumns = true;
            $filterFields = array('recurring_source' => 1);
            if (in_array('Bostel Clients', $this->roles)) {
                $this->lv->setup($this->seed, 'custom/include/ListView/ListViewGeneric.tpl', $this->where, $this->params, 0, -1, $filterFields);
            }else{
                $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params, 0, -1, $filterFields);
            }
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }
}
