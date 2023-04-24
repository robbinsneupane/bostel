<?php
$manifest = array(
	'acceptable_sugar_flavors'  => array('CE', 'PRO', 'CORP', 'ENT', 'ULT'),
	'acceptable_sugar_versions' => array(
		'exact_matches' => array(),
		'regex_matches' => array('(.*?)\.(.*?)\.(.*?)$'),
	),
	'author'                    => 'Kenneth Brill',
	'description'               => 'Login Upgrade for Nunez Industries',
	'icon'                      => '',
	'is_uninstallable'          => true,
	'name'                      => 'LoginUpdate',
	'published_date'            => '2019-07-21 19:57:42',
	'type'                      => 'module',
	'version'                   => '1.6'
);

$installdefs = array(
	'id'            => 'LOGINUPDATE_05171967',
	'custom_fields' => array(
		array(
			'name'            => 'create_customer_id_c',
			'label'           => 'LBL_CREATE_CUSTOMER_ID_C',
			'type'            => 'enum',
			'module'          => 'Accounts',
			'help'            => '',
			'comment'         => '',
			'ext1'            => 'customer_id_list', //maps to options - specify list name
			'default_value'   => 'new', //key of entry in specified list
			'mass_update'     => false, // true or false
			'required'        => true, // true or false
			'reportable'      => true, // true or false
			'audited'         => false, // true or false
			'importable'      => 'false', // 'true', 'false' or 'required'
			'duplicate_merge' => false, // true or false
		),
        array(
            'name'            => 'customer_id_c',
            'label'           => 'LBL_CUSTOMER_ID_C',
            'type'            => 'varchar',
            'len'             => '30',
            'module'          => 'Accounts',
            'help'            => '',
            'comment'         => '',
            'default_value'   => '', //key of entry in specified list
            'mass_update'     => false, // true or false
            'required'        => false, // true or false
            'reportable'      => true, // true or false
            'audited'         => true, // true or false
            'importable'      => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        ),
	),
	'copy'          =>
		array(
			0  =>
				array(
					'from'      => '<basepath>/files/custom/modules/Users/after_login_hook.php',
					'to'        => 'custom/modules/Users/after_login_hook.php',
					'timestamp' => '2019-07-08 19:53:45',
				),
			1  =>
				array(
					'from'      => '<basepath>/files/custom/modules/Accounts/after_save_hook.php',
					'to'        => 'custom/modules/Accounts/after_save_hook.php',
					'timestamp' => '2019-07-06 15:14:48',
				),
			2  =>
				array(
					'from'      => '<basepath>/files/custom/themes/SuiteP/tpls/login.tpl',
					'to'        => 'custom/themes/SuiteP/tpls/login.tpl',
					'timestamp' => '2019-07-06 15:09:43',
				),
			3  =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Users/Ext/LogicHooks/after_login.php',
					'to'        => 'custom/Extension/modules/Users/Ext/LogicHooks/after_login.php',
					'timestamp' => '2019-06-30 20:37:56',
				),
			4  =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Accounts/Ext/LogicHooks/after_save.php',
					'to'        => 'custom/Extension/modules/Accounts/Ext/LogicHooks/after_save.php',
					'timestamp' => '2019-06-30 20:37:20',
				),
			5  =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/before_save_hook.php',
					'to'        => 'custom/modules/SecurityGroups/before_save_hook.php',
					'timestamp' => '2019-07-21 14:20:08',
				),
			6  =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/SecurityGroups/Ext/LogicHooks/before_save.php',
					'to'        => 'custom/Extension/modules/SecurityGroups/Ext/LogicHooks/before_save.php',
					'timestamp' => '2019-07-21 14:05:02',
				),
			7  =>
				array(
					'from'      => '<basepath>/files/custom/modules/Accounts/metadata/editviewdefs.php',
					'to'        => 'custom/modules/Accounts/metadata/editviewdefs.php',
					'timestamp' => '2019-07-21 13:51:39',
				),
			8  =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_customer_id_c.php',
					'to'        => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_customer_id_c.php',
					'timestamp' => '2019-07-21 13:50:50',
				),
			9  =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/subpanels/Account_subpanel_securitygroups.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/subpanels/Account_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:42:42',
				),
			10 =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Accounts/Ext/Layoutdefs/_overrideAccount_subpanel_securitygroups.php',
					'to'        => 'custom/Extension/modules/Accounts/Ext/Layoutdefs/_overrideAccount_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:42:42',
				),
			11 =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Calls/Ext/Layoutdefs/_overrideCall_subpanel_securitygroups.php',
					'to'        => 'custom/Extension/modules/Calls/Ext/Layoutdefs/_overrideCall_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:41:40',
				),
			12 =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/subpanels/Call_subpanel_securitygroups.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/subpanels/Call_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:41:40',
				),
			13 =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/Contacts/Ext/Layoutdefs/_overrideContact_subpanel_securitygroups.php',
					'to'        => 'custom/Extension/modules/Contacts/Ext/Layoutdefs/_overrideContact_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:41:10',
				),
			14 =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/subpanels/Contact_subpanel_securitygroups.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/subpanels/Contact_subpanel_securitygroups.php',
					'timestamp' => '2019-07-21 13:41:10',
				),
			15 =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/quickcreatedefs.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/quickcreatedefs.php',
					'timestamp' => '2019-07-21 13:37:48',
				),
			16 =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/detailviewdefs.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/detailviewdefs.php',
					'timestamp' => '2019-07-21 13:37:01',
				),
			17 =>
				array(
					'from'      => '<basepath>/files/custom/modules/SecurityGroups/metadata/editviewdefs.php',
					'to'        => 'custom/modules/SecurityGroups/metadata/editviewdefs.php',
					'timestamp' => '2019-07-21 13:36:02',
				),
			18 =>
				array(
					'from'      => '<basepath>/files/custom/Extension/modules/SecurityGroups/Ext/Vardefs/sugarfield_name.php',
					'to'        => 'custom/Extension/modules/SecurityGroups/Ext/Vardefs/sugarfield_name.php',
					'timestamp' => '2019-07-21 13:34:38',
				),
			19 =>
				array(
					'from'      => '<basepath>/files/custom/include/language/en_us.LoginUpdate.php',
					'to'        => 'custom/include/language/en_us.lang.php',
					'timestamp' => '2019-07-21 13:34:38',
				),
            20  =>
                array(
                    'from'      => '<basepath>/files/custom/modules/Accounts/metadata/detailviewdefs.php',
                    'to'        => 'custom/modules/Accounts/metadata/detailviewdefs.php',
                    'timestamp' => '2019-07-06 15:14:48',
                ),
            21  =>
                array(
                    'from'      => '<basepath>/files/custom/modules/Accounts/customerNumber.js',
                    'to'        => 'custom/modules/Accounts/customerNumber.js',
                    'timestamp' => '2019-07-06 15:14:48',
                ),

        ),
	'language'      => array(
		array(
			'from'      => '<basepath>/files/custom/modules/Users/language/en_us.loginUpdate.php',
			'to_module' => 'Users',
			'language'  => 'en_us'
		),
		array(
			'from'      => '<basepath>/files/custom/modules/Accounts/language/en_us.loginUpdate.php',
			'to_module' => 'Accounts',
			'language'  => 'en_us'
		),
		array(
			'from'      => '<basepath>/files/custom/modules/Calls/language/en_us.LoginUpdate.php',
			'to_module' => 'Calls',
			'language'  => 'en_us'
		),
		array(
			'from'      => '<basepath>/files/custom/modules/Contacts/language/en_us.LoginUpdate.php',
			'to_module' => 'Contacts',
			'language'  => 'en_us'
		),
		array(
			'from'      => '<basepath>/files/custom/modules/SecurityGroups/language/en_us.LoginUpdate.php',
			'to_module' => 'SecurityGroups',
			'language'  => 'en_us'
		),
		array(
			'from'      => '<basepath>/files/custom/include/language/en_us.LoginUpdate.php',
			'to_module' => 'application',
			'language'  => 'en_us'
		)

	),
	'pre_execute'   =>
		array(
			'acl' => '<basepath>/sql/acl.php',
		),
);
