<?php
$module_name = 'tac_sms_templates';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'sms_body_html',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY_HTML',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sms_body_plaintext',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY_PLAINTEXT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sms_body',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY',
          ),
        ),
      ),
    ),
  ),
);
;
?>
