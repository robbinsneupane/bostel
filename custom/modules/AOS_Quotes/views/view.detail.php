<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


/**
 * Class AOS_QuotesViewDetail
 */
class AOS_QuotesViewDetail extends ViewDetail
{
    /**
     * @var AOS_Quotes $bean;
     */
    public $bean;

    /**
     * AOS_QuotesViewDetail constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function AOS_QuotesViewDetail()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        $this->__construct();
    }


    public function display()
    {
        $this->populateQuoteTemplates();
        $this->displayPopupHtml();
        parent::display();
    }

    protected function populateQuoteTemplates()
    {
        global $app_list_strings, $current_user;

        if ($current_user->is_admin) {
            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted=0 AND type='AOS_Quotes' AND active = 1";
        } else {
            $sql = "SELECT template.id, template.name FROM aos_pdf_templates as template
            INNER JOIN securitygroups_records sgr on sgr.record_id=template.id AND sgr.deleted=0 
            INNER JOIN securitygroups_users sgu on sgu.user_id='$current_user->id' and sgu.securitygroup_id=sgr.securitygroup_id AND sgu.deleted=0 
            WHERE template.deleted=0 AND template.type='AOS_Quotes' AND template.active = 1
            GROUP BY template.id";
        }

        $res = $this->bean->db->query($sql);

        $app_list_strings['template_ddown_c_list'] = array();
        while ($row = $this->bean->db->fetchByAssoc($res)) {
            if ($row['id']) {
                $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
            }
        }
    }

    protected function displayPopupHtml()
    {
        global $app_list_strings, $app_strings, $mod_strings;
        $templatesList = array_keys($app_list_strings['template_ddown_c_list']);
        $template = new Sugar_Smarty();
        $template->assign('APP_LIST_STRINGS', $app_list_strings);
        $template->assign('APP', $app_strings);
        $template->assign('MOD', $mod_strings);
        $template->assign('FOCUS', $this->bean);
        $template->assign('TEMPLATES', $templatesList);

        if ($templatesList) {
            $template->assign('TOTAL_TEMPLATES', count($templatesList));
            foreach ($templatesList as $t => $templatesListItem) {
                $templatesList[$t] = str_replace('^', '', $templatesListItem);
            }
            echo $template->fetch('modules/AOS_Quotes/templates/showPopupWithTemplates.tpl');
        } else {
            // echo $template->fetch('modules/AOS_Quotes/templates/showPopupWithOutTemplates.tpl');
            echo '<script>
                function showPopup(task){
                alert(\'' . $app_strings['LBL_NO_TEMPLATE'] . '\');        
                }
            </script>';
        }
    }
}
