<?php
require_once('modules/Meetings/MeetingsListViewSmarty.php');

class MeetingsViewList extends ViewList
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
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function MeetingsViewList()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function preDisplay()
    {
        global $current_user;
        $this->lv = new MeetingsListViewSmarty();

        // custom code added by Rupendra for hide checkboxes start
        $this->lv = new ListViewSmarty();
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
