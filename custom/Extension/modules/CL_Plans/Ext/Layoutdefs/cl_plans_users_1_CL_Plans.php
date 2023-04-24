<?php
// created: 2021-12-23 19:04:06
$layout_defs["CL_Plans"]["subpanel_setup"]['cl_plans_users_1'] = array(
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CL_PLANS_USERS_1_FROM_USERS_TITLE',
  'get_subpanel_data' => 'cl_plans_users_1',
  'top_buttons' =>
  array(
    0 =>
    array(
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 =>
    array(
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
