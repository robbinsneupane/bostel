<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['User']['fields']['company_name']['required']=false;
$dictionary['User']['fields']['company_name']['name']='company_name';
$dictionary['User']['fields']['company_name']['vname']='LBL_COMPANY_NAME';
$dictionary['User']['fields']['company_name']['type']='varchar';
$dictionary['User']['fields']['company_name']['len']=255;
$dictionary['User']['fields']['company_name']['audited']=true;
$dictionary['User']['fields']['company_name']['reportable']=true;
$dictionary['User']['fields']['company_name']['unified_search']=true;
$dictionary['User']['fields']['company_name']['merge_filter']='disabled';
$dictionary['User']['fields']['company_name']['studio']='visible';
$dictionary['User']['fields']['company_name']['inline_edit']=true;

 

// created: 2021-12-23 19:04:06
$dictionary["User"]["fields"]["cl_plans_users_1"] = array (
  'name' => 'cl_plans_users_1',
  'type' => 'link',
  'relationship' => 'cl_plans_users_1',
  'source' => 'non-db',
  'module' => 'CL_Plans',
  'bean_name' => 'CL_Plans',
  'vname' => 'LBL_CL_PLANS_USERS_1_FROM_CL_PLANS_TITLE',
  'id_name' => 'cl_plans_users_1cl_plans_ida',
);
$dictionary["User"]["fields"]["cl_plans_users_1_name"] = array (
  'name' => 'cl_plans_users_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CL_PLANS_USERS_1_FROM_CL_PLANS_TITLE',
  'save' => true,
  'id_name' => 'cl_plans_users_1cl_plans_ida',
  'link' => 'cl_plans_users_1',
  'table' => 'cl_plans',
  'module' => 'CL_Plans',
  'rname' => 'name',
);
$dictionary["User"]["fields"]["cl_plans_users_1cl_plans_ida"] = array (
  'name' => 'cl_plans_users_1cl_plans_ida',
  'type' => 'link',
  'relationship' => 'cl_plans_users_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CL_PLANS_USERS_1_FROM_USERS_TITLE',
);

?>