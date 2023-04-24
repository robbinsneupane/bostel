<?php
global $db;
$record_id = $_GET['record_id'];
$relate_table = $_GET['relate_table'];
$query = "SELECT primary_address_street, primary_address_city, primary_address_state, primary_address_postalcode, primary_address_country, company_name from $relate_table where id='$record_id'";
$result = $db->query($query);
$row = $db->fetchByAssoc($result);
$mappedArr = [
    ['field' => 'billing_address_street', 'value' => $row['primary_address_street']],
    ['field' => 'billing_address_city', 'value' => $row['primary_address_city']],
    ['field' => 'billing_address_state', 'value' => $row['primary_address_state']],
    ['field' => 'billing_address_postalcode', 'value' => $row['primary_address_postalcode']],
    ['field' => 'billing_address_country', 'value' => $row['primary_address_country']],
    ['field' => 'billing_company_name', 'value' => $row['company_name']],
];
echo json_encode($mappedArr);
exit;
