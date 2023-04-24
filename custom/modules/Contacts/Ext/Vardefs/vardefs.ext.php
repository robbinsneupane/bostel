<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2020-04-11 08:21:56
$dictionary['Contact']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2020-04-11 08:21:56
$dictionary['Contact']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2020-04-11 08:21:56
$dictionary['Contact']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2020-04-11 08:21:56
$dictionary['Contact']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2020-05-15 10:57:51
$dictionary['Contact']['fields']['company_name']['required']=false;
$dictionary['Contact']['fields']['company_name']['name']='company_name';
$dictionary['Contact']['fields']['company_name']['vname']='LBL_COMPANY_NAME';
$dictionary['Contact']['fields']['company_name']['type']='varchar';
$dictionary['Contact']['fields']['company_name']['len']=255;
$dictionary['Contact']['fields']['company_name']['audited']=true;
$dictionary['Contact']['fields']['company_name']['reportable']=true;
$dictionary['Contact']['fields']['company_name']['unified_search']=true;
$dictionary['Contact']['fields']['company_name']['merge_filter']='disabled';
$dictionary['Contact']['fields']['company_name']['studio']='visible';
$dictionary['Contact']['fields']['company_name']['inline_edit']=true;

 

$dictionary['Contact']['fields']['website'] = array(
    'name' => 'website',
    'vname' => 'LBL_WEBSITE',
    'type' => 'url',
    'dbType' => 'varchar',
    'len' => 255,
    'link_target' => '_blank',
    'comment' => 'URL of website for the company',
);


$dictionary["Contact"]["fields"]["category_name"] = array(
    'required' => true,
    'source' => 'non-db',
    'name' => 'category_name',
    'vname' => 'LBL_CATEGORY',
    'type' => 'relate',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'len' => '255',
    'id_name' => 'category_id',
    'ext2' => 'ru_contact_categories',
    'module' => 'ru_Contact_Categories',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
);
$dictionary["Contact"]["fields"]["category_id"] = array(
    'required' => true,
    'name' => 'category_id',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 36,
);

?>