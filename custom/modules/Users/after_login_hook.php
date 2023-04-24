<?php
//PHASE#1
class UsersAfterLoginHook
{
	/**
	 * @param SugarBean $bean
	 * @param string    $event
	 * @param array     $arguments
	 * @throws Exception
	 */

	public function switchTeam($bean, $event, $arguments)
	{
		if ($bean->is_admin != '1' && isset($_POST['user_group'])) {
			$chosenGroupName = $_POST['user_group'];
			//Get the ID of the group
			$sql = "SELECT id FROM securitygroups WHERE name='{$chosenGroupName}' OR description='{$chosenGroupName}'";
			$chosenGroup = $GLOBALS['db']->getOne($sql);

			if (empty($chosenGroup)) {
				$errorMsg = "Group: '$chosenGroupName' does not exist";
				if (empty($chosenGroupName)) {
					$errorMsg = "Group Required! Please Enter group.";
				}

				$GLOBALS['log']->error($errorMsg);

				setcookie('customerIDErrorMessage', $errorMsg, time() + 2);
				session_destroy();
				ob_clean();
				header('Location: index.php?module=Users&action=Login&type=agent');
				sugar_cleanup(true);
			}

			//Make that group the only team for this user
			$sql = "UPDATE securitygroups_users 
			  		SET securitygroup_id='{$chosenGroup}' 
			  		WHERE user_id='{$bean->id}' AND deleted=0";
			$GLOBALS['db']->query($sql, true);

			//Make sure the group has a role
			$sql = "SELECT id FROM securitygroups_acl_roles WHERE securitygroup_id='{$chosenGroup}' AND deleted=0";
			$id = $GLOBALS['db']->getOne($sql);

			if (empty($id)) {
				$sql = "INSERT INTO securitygroups_acl_roles (id, securitygroup_id, role_id, date_modified, deleted) 
						VALUES (UUID(), '{$chosenGroup}', 'a647f510-4105-f899-33cc-5d1926a7f552', CURRENT_DATE(), '0')";
				$GLOBALS['db']->query($sql, true);
			}
		}
	}
}
