<?php

/**
 * RemoveSendMail added by rupendrwa for remove Send SMS Link which is added by twillio
 * @param void()
 * @return void()
 */
class RemoveSendMail
{
    function remove()
    {
        global $current_user;
        include_once('modules/ACLRoles/ACLRole.php');
        $aclRole = new ACLRole();
        $roles = $aclRole->getUserRoleNames($current_user->id);
        if (in_array('Bostel Clients', $roles) && ($_REQUEST['action'] == 'ListView' || $_REQUEST['action'] == 'DetailView')) {
            $button_code = <<<EOQ
                <script type="text/javascript">
                    $(document).ready(function(){
                        setTimeout(function(){ 
                            $("input[id='Send SMS']").parent().remove();
                        }, 1000);
                        
                    });
                </script>
EOQ;
            echo $button_code;
        }
    }
}
