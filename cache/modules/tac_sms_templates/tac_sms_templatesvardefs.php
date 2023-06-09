<?php 
 $GLOBALS["dictionary"]["tac_sms_templates"]=array (
  'table' => 'tac_sms_templates',
  'audited' => true,
  'inline_edit' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => '4',
      'cols' => '10',
      'required' => false,
      'massupdate' => 0,
      'no_default' => false,
      'comments' => 'Full text of the note',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'tac_sms_templates_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'tac_sms_templates_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'tac_sms_templates_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'SecurityGroups' => 
    array (
      'name' => 'SecurityGroups',
      'type' => 'link',
      'relationship' => 'securitygroups_tac_sms_templates',
      'module' => 'SecurityGroups',
      'bean_name' => 'SecurityGroup',
      'source' => 'non-db',
      'vname' => 'LBL_SECURITYGROUPS',
    ),
    'modules' => 
    array (
      'required' => false,
      'name' => 'modules',
      'vname' => 'LBL_MODULES',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => 'Accounts',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 
      array (
        'ACLRoles' => 'ACLRole',
        'ACLActions' => 'ACLAction',
        'Leads' => 'Lead',
        'Cases' => 'aCase',
        'Bugs' => 'Bug',
        'ProspectLists' => 'ProspectList',
        'Prospects' => 'Prospect',
        'Project' => 'Project',
        'ProjectTask' => 'ProjectTask',
        'Campaigns' => 'Campaign',
        'EmailMarketing' => 'EmailMarketing',
        'CampaignLog' => 'CampaignLog',
        'CampaignTrackers' => 'CampaignTracker',
        'Releases' => 'Release',
        'Groups' => 'Group',
        'EmailMan' => 'EmailMan',
        'Schedulers' => 'Scheduler',
        'SchedulersJobs' => 'SchedulersJob',
        'Contacts' => 'Contact',
        'Accounts' => 'Account',
        'DynamicFields' => 'DynamicField',
        'EditCustomFields' => 'FieldsMetaData',
        'Opportunities' => 'Opportunity',
        'EmailTemplates' => 'EmailTemplate',
        'Notes' => 'Note',
        'Calls' => 'Call',
        'Emails' => 'Email',
        'Meetings' => 'Meeting',
        'Tasks' => 'Task',
        'Users' => 'User',
        'Currencies' => 'Currency',
        'Trackers' => 'Tracker',
        'Connectors' => 'Connectors',
        'Import_1' => 'ImportMap',
        'Import_2' => 'UsersLastImport',
        'Versions' => 'Version',
        'Administration' => 'Administration',
        'vCals' => 'vCal',
        'CustomFields' => 'CustomFields',
        'Alerts' => 'Alert',
        'Documents' => 'Document',
        'DocumentRevisions' => 'DocumentRevision',
        'Roles' => 'Role',
        'Audit' => 'Audit',
        'InboundEmail' => 'InboundEmail',
        'SavedSearch' => 'SavedSearch',
        'UserPreferences' => 'UserPreference',
        'MergeRecords' => 'MergeRecord',
        'EmailAddresses' => 'EmailAddress',
        'EmailText' => 'EmailText',
        'Relationships' => 'Relationship',
        'Employees' => 'Employee',
        'Spots' => 'Spots',
        'AOBH_BusinessHours' => 'AOBH_BusinessHours',
        'SugarFeed' => 'SugarFeed',
        'EAPM' => 'EAPM',
        'OAuthKeys' => 'OAuthKey',
        'OAuthTokens' => 'OAuthToken',
        'AM_ProjectTemplates' => 'AM_ProjectTemplates',
        'AM_TaskTemplates' => 'AM_TaskTemplates',
        'Favorites' => 'Favorites',
        'AOK_Knowledge_Base_Categories' => 'AOK_Knowledge_Base_Categories',
        'AOK_KnowledgeBase' => 'AOK_KnowledgeBase',
        'Reminders' => 'Reminder',
        'Reminders_Invitees' => 'Reminder_Invitee',
        'FP_events' => 'FP_events',
        'FP_Event_Locations' => 'FP_Event_Locations',
        'AOD_IndexEvent' => 'AOD_IndexEvent',
        'AOD_Index' => 'AOD_Index',
        'AOP_Case_Events' => 'AOP_Case_Events',
        'AOP_Case_Updates' => 'AOP_Case_Updates',
        'AOR_Reports' => 'AOR_Report',
        'AOR_Fields' => 'AOR_Field',
        'AOR_Charts' => 'AOR_Chart',
        'AOR_Conditions' => 'AOR_Condition',
        'AOR_Scheduled_Reports' => 'AOR_Scheduled_Reports',
        'AOS_Contracts' => 'AOS_Contracts',
        'AOS_Invoices' => 'AOS_Invoices',
        'AOS_PDF_Templates' => 'AOS_PDF_Templates',
        'AOS_Product_Categories' => 'AOS_Product_Categories',
        'AOS_Products' => 'AOS_Products',
        'AOS_Products_Quotes' => 'AOS_Products_Quotes',
        'AOS_Line_Item_Groups' => 'AOS_Line_Item_Groups',
        'AOS_Quotes' => 'AOS_Quotes',
        'AOW_Actions' => 'AOW_Action',
        'AOW_WorkFlow' => 'AOW_WorkFlow',
        'AOW_Processed' => 'AOW_Processed',
        'AOW_Conditions' => 'AOW_Condition',
        'jjwg_Maps' => 'jjwg_Maps',
        'jjwg_Markers' => 'jjwg_Markers',
        'jjwg_Areas' => 'jjwg_Areas',
        'jjwg_Address_Cache' => 'jjwg_Address_Cache',
        'Calls_Reschedule' => 'Calls_Reschedule',
        'SecurityGroups' => 'SecurityGroup',
        'OutboundEmailAccounts' => 'OutboundEmailAccounts',
        'TemplateSectionLine' => 'TemplateSectionLine',
        'OAuth2Tokens' => 'OAuth2Tokens',
        'OAuth2Clients' => 'OAuth2Clients',
        'SurveyResponses' => 'SurveyResponses',
        'Surveys' => 'Surveys',
        'SurveyQuestionResponses' => 'SurveyQuestionResponses',
        'SurveyQuestions' => 'SurveyQuestions',
        'SurveyQuestionOptions' => 'SurveyQuestionOptions',
        'tac_sms_templates' => 'tac_sms_templates',
        'tac_inbound_message' => 'tac_inbound_message',
        'ru_Contact_Categories' => 'ru_Contact_Categories',
        'CL_Plans' => 'CL_Plans',
      ),
      'studio' => 'visible',
      'dependency' => false,
    ),
    'module_fields' => 
    array (
      'required' => false,
      'name' => 'module_fields',
      'vname' => 'LBL_MODULE_FIELDS',
      'type' => 'enum',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => '',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'sms_body_html' => 
    array (
      'required' => false,
      'name' => 'sms_body_html',
      'vname' => 'LBL_SMS_BODY_HTML',
      'type' => 'text',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
      'rows' => '6',
      'cols' => '80',
    ),
    'sms_body' => 
    array (
      'required' => false,
      'name' => 'sms_body',
      'vname' => 'LBL_SMS_BODY',
      'type' => 'text',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
      'rows' => '6',
      'cols' => '80',
    ),
    'sms_body_plaintext' => 
    array (
      'required' => false,
      'name' => 'sms_body_plaintext',
      'vname' => 'LBL_SMS_BODY_PLAINTEXT',
      'type' => 'text',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
      'rows' => '6',
      'cols' => '80',
    ),
    'send_text_only' => 
    array (
      'required' => false,
      'name' => 'send_text_only',
      'vname' => 'LBL_SEND_TEXT_ONLY',
      'type' => 'bool',
      'massupdate' => 0,
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
    ),
    'insert_variable' => 
    array (
      'name' => 'insert_variable',
      'vname' => 'LBL_INSERT_VARIABLE',
      'type' => 'varchar',
      'len' => '255',
      'source' => 'non-db',
    ),
  ),
  'relationships' => 
  array (
    'tac_sms_templates_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'tac_sms_templates',
      'rhs_table' => 'tac_sms_templates',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'tac_sms_templates_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'tac_sms_templates',
      'rhs_table' => 'tac_sms_templates',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'tac_sms_templates_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'tac_sms_templates',
      'rhs_table' => 'tac_sms_templates',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'securitygroups_tac_sms_templates' => 
    array (
      'lhs_module' => 'SecurityGroups',
      'lhs_table' => 'securitygroups',
      'lhs_key' => 'id',
      'rhs_module' => 'tac_sms_templates',
      'rhs_table' => 'tac_sms_templates',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'securitygroups_records',
      'join_key_lhs' => 'securitygroup_id',
      'join_key_rhs' => 'record_id',
      'relationship_role_column' => 'module',
      'relationship_role_column_value' => 'tac_sms_templates',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'tac_sms_templatespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'security_groups' => 'security_groups',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);