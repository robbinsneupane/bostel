<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Lead']['fields']['campaign']['required']=false;
$dictionary['Lead']['fields']['campaign']['name']='campaign';
$dictionary['Lead']['fields']['campaign']['vname']='LBL_CAMPAIGN';
$dictionary['Lead']['fields']['campaign']['type']='varchar';
$dictionary['Lead']['fields']['campaign']['len']=255;
$dictionary['Lead']['fields']['campaign']['audited']=true;
$dictionary['Lead']['fields']['campaign']['reportable']=true;
$dictionary['Lead']['fields']['campaign']['unified_search']=true;
$dictionary['Lead']['fields']['campaign']['merge_filter']='disabled';
$dictionary['Lead']['fields']['campaign']['studio']='visible';
$dictionary['Lead']['fields']['campaign']['inline_edit']=true;
$dictionary['Lead']['fields']['campaign']['duplicate_merge'] = 'disabled';




$dictionary['Lead']['fields']['campaign_id']['duplicate_merge'] = 'disabled';
$dictionary['Lead']['fields']['campaign_name']['duplicate_merge'] = 'disabled';
 

$dictionary['Lead']['fields']['portal_app']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['portal_name']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['report_to_name']['duplicate_merge'] = 'disabled';
$dictionary['Lead']['fields']['reports_to_id']['duplicate_merge'] = 'disabled';
$dictionary['Lead']['fields']['reports_to_link']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['birthdate']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['account_description']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['assistant_phone']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['assistant']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['lawful_basis_source']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['date_reviewed']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['photo']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['lawful_basis']['duplicate_merge'] = 'disabled';


$dictionary['Lead']['fields']['phone_home']['duplicate_merge'] = 'disabled';


 // created: 2019-05-21 11:25:23
$dictionary['Lead']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2019-05-21 11:25:23
$dictionary['Lead']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2019-05-21 11:25:24
$dictionary['Lead']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2019-05-21 11:25:24
$dictionary['Lead']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

$dictionary["Lead"]["fields"]["category_name"] = array(
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
$dictionary["Lead"]["fields"]["category_id"] = array(
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