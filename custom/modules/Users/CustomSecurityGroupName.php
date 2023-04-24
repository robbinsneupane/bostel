<?php
// fetching Client id Custom changes as requirments
global $db, $current_user;
$sql = "SELECT name, description, securitygroups_users.user_id from securitygroups
            left join securitygroups_users on securitygroups_users.securitygroup_id = securitygroups.id
            where securitygroups_users.user_id = '" . $current_user->id . "' and securitygroups_users.deleted=0";

$result = $db->query($sql);
$name = '';
while ($row = $db->fetchByAssoc($result)) {
    $name = $row['description'];
};
echo $name;
