<?php
/*
 * Created by Taction Software LLC - Copyright 2018
 * Website: www.tactionsoftware.com/
 * Mail: info@tactionsoftware.com
 * @Author:Akanksha Srivastava
 * Description: EditView Defs
 * 
 */

$module_name = 'tac_sms_templates';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
      'syncDetailEditViews' => false,
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
          0 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'modules',
            'studio' => 'visible',
            'label' => 'LBL_MODULES',
          ),
          1 => 
          array (
            'name' => 'module_fields',
            'studio' => 'visible',
            'label' => 'LBL_MODULE_FIELDS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'insert_variable',
            'label' => 'LBL_INSERT_VARIABLE',
          ),
          1 => 
          array (
            'name' => 'insert_var_button',
            'customCode' => '{$INSERT_VARIABLE_BUTTON}',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'send_text_only',
            'label' => 'LBL_SEND_TEXT_ONLY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'sms_body_html',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY_HTML',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'sms_body_plaintext',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY_PLAINTEXT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'sms_body',
            'studio' => 'visible',
            'label' => 'LBL_SMS_BODY',
          ),
          1 => 
          array (
            'name' => 'showInPopup',
            'customCode' => '{$showInPopup}',
          ),
        ),
      ),
    ),
  ),
);
;
?>
