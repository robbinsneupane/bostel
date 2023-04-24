<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once("include/OutboundEmail/OutboundEmail.php");

class UsersController extends SugarController
{
    /**
     * bug 48170
     * Action resetPreferences gets fired when user clicks on  'Reset User Preferences' button
     * This action is set in UserViewHelper.php
     */
    protected function action_resetPreferences()
    {
        if ($_REQUEST['record'] == $GLOBALS['current_user']->id || ($GLOBALS['current_user']->isAdminForModule('Users'))) {
            $u = new User();
            $u->retrieve($_REQUEST['record']);
            $u->resetPreferences();
            if ($u->id == $GLOBALS['current_user']->id) {
                SugarApplication::redirect('index.php');
            } else {
                SugarApplication::redirect("index.php?module=Users&record=" . $_REQUEST['record'] . "&action=DetailView"); //bug 48170]
            }
        }
    }

    protected function action_delete()
    {
        if (
            $_REQUEST['record'] != $GLOBALS['current_user']->id && ($GLOBALS['current_user']->isAdminForModule('Users'))
        ) {
            $u = new User();
            $u->retrieve($_REQUEST['record']);
            $u->status = 'Inactive';
            $u->employee_status = 'Terminated';
            $u->save();
            $u->mark_deleted($u->id);
            $GLOBALS['log']->info("User id: {$GLOBALS['current_user']->id} deleted user record: {$_REQUEST['record']}");

            $eapm = loadBean('EAPM');
            $eapm->delete_user_accounts($_REQUEST['record']);
            $GLOBALS['log']->info("Removing user's External Accounts");

            SugarApplication::redirect("index.php?module=Users&action=index");
        } else {
            sugar_die("Unauthorized access to administration.");
        }
    }

    protected function action_wizard()
    {
        $this->view = 'wizard';
    }

    protected function action_saveuserwizard()
    {
        global $current_user, $sugar_config;

        // set all of these default parameters since the Users save action will undo the defaults otherwise
        $_POST['record'] = $current_user->id;
        $_POST['is_admin'] = ($current_user->is_admin ? 'on' : '');
        $_POST['use_real_names'] = true;
        $_POST['reminder_checked'] = '1';
        $_POST['email_reminder_checked'] = '1';
        $_POST['reminder_time'] = 1800;
        $_POST['email_reminder_time'] = 3600;
        $_POST['mailmerge_on'] = 'on';
        $_POST['receive_notifications'] = $current_user->receive_notifications;
        $_POST['user_theme'] = (string)SugarThemeRegistry::getDefault();

        // save and redirect to new view
        $_REQUEST['return_module'] = 'Home';
        $_REQUEST['return_action'] = 'index';
    }

    protected function action_saveftsmodules()
    {
        $this->view = 'fts';
        $GLOBALS['current_user']->setPreference('fts_disabled_modules', $_REQUEST['disabled_modules']);
    }


    protected function action_editview()
    {
        $this->view = 'edit';
        if (!(is_admin($GLOBALS['current_user']) || $_REQUEST['record'] == $GLOBALS['current_user']->id)) {
            SugarApplication::redirect("index.php?module=Home&action=index");
        }
    }

    protected function action_detailview()
    {
        $this->view = 'detail';
        global $current_user, $db;
        // if (!(is_admin($GLOBALS['current_user']) || $_REQUEST['record'] == $GLOBALS['current_user']->id)) {
        //     SugarApplication::redirect("index.php?module=Home&action=index");
        // }

        if (!(is_admin($GLOBALS['current_user']))) {
            $sql = "SELECT sgu.securitygroup_id FROM securitygroups_users as sgu
            INNER JOIN securitygroups_users sgucu on sgucu.securitygroup_id=sgu.securitygroup_id and sgucu.user_id='" . $_REQUEST['record'] . "' and sgucu.deleted=0
            WHERE sgu.deleted=0 AND sgu.user_id='$current_user->id'";
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result);
            if(empty($row)){
                SugarApplication::redirect("index.php?module=Home&action=index");
            }
        }
    }
}
