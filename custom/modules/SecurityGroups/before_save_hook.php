<?php
class SecurityGroupsBeforeSaveHook
{
	public function addIDToGroup($bean, $event, $arguments)
	{
		if (empty($bean->name) || $bean->name == 'Will be filled in automatically on save') {
			$bean->name = uniqid();
		}
	}
}
