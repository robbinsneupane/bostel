<?php
//PHASE#1
$hook_array['after_login'][] = Array(
	99,
	'switch To Chosen Team',
	'custom/modules/Users/after_login_hook.php',
	'UsersAfterLoginHook',
	'switchTeam');
