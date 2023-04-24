<?php

/**
 * AfterUiFrame added by rupendrwa for remove Send SMS Link which is added by twillio
 * @param void()
 * @return void()
 */
class AfterUiFrame
{
    function addModuleName()
    {
        global $current_user, $app_list_strings, $app_strings;
        $module = $_REQUEST['module'];
        $module_label = $app_list_strings['moduleList'][$module];
        $create_label = $app_strings['LBL_CREATE'];
        $request = json_encode($_REQUEST);
        if ($_REQUEST['action'] == 'EditView' && (!isset($_REQUEST['record']) || empty($_REQUEST['record']))) {
            $button_code = <<<EOQ
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.module-title-text').html('$create_label $module_label');
                    });
                </script>
EOQ;
            echo $button_code;
        }
    }

    function updateFooterCreateLink()
    {
        global $app_list_strings;
        $module = $_REQUEST['module'];
        $action = $_REQUEST['action'];
        if ($module == 'MergeRecords') {
            $module = isset($_REQUEST['merge_module']) ? $_REQUEST['merge_module'] : $_REQUEST['return_module'];
        }
        if ($module == 'Project' && $action == 'ResourceList') {
            $module = 'ResourceCalendar';
        }
        $module_label = $app_list_strings['moduleList'][$module];
        
        $view = $_REQUEST['view'];
        // echo "<pre>"; print_r($_REQUEST); die;
        $allowedActions = [
            'index',
            'ListView',
            'DetailView',
            'EditView',
            'mobile',
            'About',
            'Support',
            'sales_setting',
            'UnifiedSearch',
            'ComposeViewWithPdfTemplate',
            'Step3',
            'Step2',
            'Step1',
            'ImportVCard',
            'ShowDuplicates',
            'ResourceList',
            'view_GanttChart'
        ];

        $allowedView = ['agendaWeek', 'agendaDay', 'month', 'sharedMonth', 'sharedWeek'];

        $excludeFooter = [
            'Administration', 'ModuleBuilder'
        ];

        if (!in_array($module, $excludeFooter) && (in_array($action, $allowedActions) || in_array($view, $allowedView))) {

            $button_code = <<<EOQ
            <script type="text/javascript">
                $(document).ready(function(){

                    $('footer .footer-module-option').show();
                    var action = '$action';
                    var excludeAddIcon = ['Home', 'Calendar', 'SecurityGroups', 'MySettings', 'Users', 'Employees', 'Emails'];
                    var excludeAddIconActions = ['ResourceList'];
                    if(excludeAddIcon.includes('$module') || excludeAddIconActions.includes('$action')){
                        $('.footer-module-option ul li:nth-last-child(2)').hide();
                        $('.footer-module-option ul li:nth-last-child(1)').css({'border-left': 'solid'});
                    }else{
                        $('.footer-module-option ul li:nth-last-child(1)').css({'border-left': 'none'});
                        $('.footer-module-option ul li:nth-last-child(2)').show();
                        $('.footer-module-option ul li:nth-last-child(2)').css({'border-left': 'solid', 'padding-right': '0px'});
                    }
                    $('#footer-create-link').attr('href','index.php?module=$module&action=EditView');
                    // update footer module name
                    $('#footer-module-name').text('$module_label');

                    // removing save_and_continue button
                    $('.saveAndContinue').remove();
                });
            </script>
EOQ;
            echo $button_code;
        }

        if ($module == 'SecurityGroups' && $action == 'DetailView') {
            $js = <<<EOQ
            <script type="text/javascript">
                $(document).ready(function(){
                    showSubPanel('users');
                });
            </script>
EOQ;
            echo $js;
        }
    }
}
