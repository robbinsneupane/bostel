<?php
$viewdefs['Opportunities'] =
  array(
    'EditView' =>
    array(
      'templateMeta' =>
      array(
        'maxColumns' => '2',
        'widths' =>
        array(
          0 =>
          array(
            'label' => '10',
            'field' => '30',
          ),
          1 =>
          array(
            'label' => '10',
            'field' => '30',
          ),
        ),
        'javascript' => '{$PROBABILITY_SCRIPT}',
        'useTabs' => false,
        'tabDefs' =>
        array(
          'DEFAULT' =>
          array(
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ASSIGNMENT' =>
          array(
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
        ),
      ),
      'panels' =>
      array(
        'default' =>
        array(
          0 =>
          array(
            0 =>
            array(
              'name' => 'name',
            ),
            1 =>
            array(
              'name' => 'date_closed',
            ),
          ),
          1 =>
          array(
            0 =>
            array(
              'name' => 'currency_id',
              'label' => 'LBL_CURRENCY'
            ),
            1 => 'opportunity_type',
          ),
          2 =>
          array(
            0 =>
            array(
              'name' => 'amount',
            ),
            1 => 'lead_source',
          ),
          3 =>
          array(
            0 => 'sales_stage',
            1 => 'next_step',
          ),
          4 =>
          array(
            0 => 'probability',
            // 1 => 'campaign_name',
            1 => ''
          ),
          // 5 => 
          // array (
          //   0 => 'next_step',
          // ),
          5 =>
          array(
            0 => 'description',
          ),
        ),
        'LBL_PANEL_ASSIGNMENT' =>
        array(
          0 =>
          array(
            0 => 'assigned_user_name',
          ),
        ),
      ),
    ),
  );;
