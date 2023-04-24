<?php

class ru_Contact_CategoriesController extends SugarController
{
    public function action_Popup()
    {
        // echo "<pre>";
        // print_r($_REQUEST);
        // die('her');
        $where = 'ru_contact_categories.created_by=1 ';
        if (isset($_REQUEST['query']) && $_REQUEST['query']) {
            if (isset($_REQUEST['name_advanced']) && $_REQUEST['name_advanced']) {
                $where .= ' AND ru_contact_categories.name like "' . $_REQUEST['name_advanced'] . '%" ';
            }
            if (isset($_REQUEST['assigned_user_id_advanced']) && !empty($_REQUEST['assigned_user_id_advanced'])) {
                $where .= ' AND ru_contact_categories.assigned_user_id IN ("' . implode('","', $_REQUEST['assigned_user_id_advanced']) . '") ';
            }
        }
        
        $_REQUEST['custom_where'] = " OR ($where)";
        $this->view = 'popup';
    }
}
