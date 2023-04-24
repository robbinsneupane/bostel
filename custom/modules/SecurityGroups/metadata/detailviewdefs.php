<?php
$module_name = 'SecurityGroups';
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
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'description',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        // 2 => 
        // array (
        //   0 => 'noninheritable',
        // ),
      ),
      // 'lbl_detailview_panel1' => 
      // array (
      //   0 => 
      //   array (
      //     0 => 'date_entered',
      //     1 => 
      //     array (
      //       'name' => 'created_by_name',
      //       'label' => 'LBL_CREATED',
      //     ),
      //   ),
      //   1 => 
      //   array (
      //     0 => 'date_modified',
      //     1 => 
      //     array (
      //       'name' => 'modified_by_name',
      //       'label' => 'LBL_MODIFIED_NAME',
      //     ),
      //   ),
      // ),
    ),
  ),
);
;
?>
