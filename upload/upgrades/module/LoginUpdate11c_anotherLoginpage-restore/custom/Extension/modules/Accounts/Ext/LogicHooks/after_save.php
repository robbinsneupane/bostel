<?php
//PHASE#1
$hook_array['after_save'][] = Array(
	99,
	'Create Team If Needed',
	'custom/modules/Accounts/after_save_hook.php',
	'AccountsAfterSaveHook',
	'createAccountTeam');
