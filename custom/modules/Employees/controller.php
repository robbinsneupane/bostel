<?php

class EmployeesController extends SugarController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function EmployeesController()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function action_editview()
    {
        if (is_admin($GLOBALS['current_user']) || $_REQUEST['record'] == $GLOBALS['current_user']->id) {
            $this->view = 'edit';
        } else {
            SugarApplication::redirect("index.php?module=Home&action=mobile");
            // sugar_die("Unauthorized access to employees.");
        }
        return true;
    }

    protected function action_delete()
    {
        if ($_REQUEST['record'] != $GLOBALS['current_user']->id && $GLOBALS['current_user']->isAdminForModule('Users')) {
            $u = new User();
            $u->retrieve($_REQUEST['record']);
            $u->status = 'Inactive';
            $u->employee_status = 'Terminated';
            $u->save();
            $u->mark_deleted($u->id);
            $GLOBALS['log']->info("User id: {$GLOBALS['current_user']->id} deleted user record: {$_REQUEST['record']}");

            SugarApplication::redirect("index.php?module=Employees&action=index");
        } else {
            sugar_die("Unauthorized access to administration.");
        }
    }
}
