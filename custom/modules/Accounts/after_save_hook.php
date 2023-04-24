<?php
//PHASE#2
class AccountsAfterSaveHook
{
	/**
	 * @param SugarBean $bean
	 * @param string    $event
	 * @param array     $arguments
	 */
	public function createAccountTeam($bean, $event, $arguments)
	{
		if ($bean->fetched_row == false && ($bean->customer_id_c=='new' || $bean->customer_id_c=='')) {
			//First we remove all groups from this new Account
			$this->removeGroupsFromAccount($bean->id);
			//Now we find if there is already a group out there with this accounts name
			$sql = "SELECT id FROM securitygroups WHERE description='{$bean->name}' AND deleted=0";
			$id = $GLOBALS['db']->getOne($sql);
			$groupFocus = new SecurityGroup();
			$rel_name = $groupFocus->getLinkName($bean->module_dir, 'SecurityGroups');
			$bean->load_relationship($rel_name);
			if (!empty($id)) {
				//The group already exists, just relate it
				$bean->load_relationship($rel_name);
				$bean->$rel_name->add($id);
			} else {
				//No group, create one and relate it
				$groupFocus->description = $bean->name;
				$groupFocus->save();
				$bean->$rel_name->add($groupFocus->id);
				//Add the role to the team
				$sql = "INSERT INTO securitygroups_acl_roles (id, securitygroup_id, role_id, date_modified, deleted) 
						VALUES (UUID(), '{$groupFocus->id}', 'a647f510-4105-f899-33cc-5d1926a7f552', CURRENT_DATE(), '0')";
				$GLOBALS['db']->query($sql, true);
			}
			$bean->customer_id_c = $groupFocus->name;
			$bean->save();
		}
	}

	/**
	 * Remove all Security Group from an Account
	 * @param string $record_id
	 */
	private function removeGroupsFromAccount($record_id)
	{
		$db = DBManagerFactory::getInstance();
		$query = "UPDATE securitygroups_records 
				  SET deleted=1, date_modified = '{$db->convert('', 'today')}'
				  WHERE record_id = '$record_id' and module = 'Accounts'";
		$db->query($query, true);
	}
}
