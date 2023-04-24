<?php
class CommonClass
{
    public function updateAssignedToUser($bean, $event, $arguments)
    {
        global $current_user;
        if (empty($bean->assigned_user_id)) {
            $bean->assigned_user_id = $current_user->id;
        }
    }
}
