<?php
require_once('include/ListView/ListViewSmarty.php');
class NotesViewList extends ViewList
{
    private $roles;

    function NotesViewList()
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

        $js = <<<EOF
        <script>
        $(document).ready(function(){
            $('.glyphicon-eye-open').each(function(){
                var file = $(this).parent().prev().html();
                if(file.trim() == ''){
                    $(this).parent().remove()
                }
            })
        })
        </script>
EOF;

        echo $js;
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
