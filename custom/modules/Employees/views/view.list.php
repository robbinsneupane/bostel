<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class EmployeesViewList extends ViewList
{
    public function preDisplay()
    {
        $this->lv = new ListViewSmarty();
        $this->lv->delete = false;
        $this->lv->email = false;
        if (!$GLOBALS['current_user']->isAdminForModule('Users')) {
            SugarApplication::redirect('index.php?module=Home&action=mobile');
            $this->lv->multiSelect = false;
        }
    }

    /**
     * Overridden from ViewList prepareSearchForm so we can tack on some additional where clauses
     *
     */
    public function prepareSearchForm()
    {
        parent::prepareSearchForm();
        require_once('modules/Employees/EmployeesSearchForm.php');
        $newForm = new EmployeesSearchForm($this->searchForm);
        $this->searchForm = $newForm;
    }

    /**
     * Return the "breadcrumbs" to display at the top of the page
     *
     * @param  bool $show_help optional, true if we show the help links
     * @return HTML string containing breadcrumb title
     */
    public function getModuleTitle($show_help = true)
    {
        global $sugar_version, $sugar_flavor, $server_unique_key, $current_language, $action, $current_user;

        $theTitle = "<div class='moduleTitle'>\n<h2>";

        $module = preg_replace("/ /", "", $this->module);

        $params = $this->_getModuleTitleParams();
        $count = count($params);
        $index = 0;

        if (SugarThemeRegistry::current()->directionality == "rtl") {
            $params = array_reverse($params);
        }

        $paramString = '';
        foreach ($params as $parm) {
            $index++;
            $paramString .= $parm;
            if ($index < $count) {
                $paramString .= $this->getBreadCrumbSymbol();
            }
        }

        if (!empty($paramString)) {
            $theTitle .= "<h2> $paramString </h2>\n";
        }


        if ($show_help) {
            $theTitle .= "<span class='utils'>";
            if (is_admin($current_user) || is_admin_for_module($current_user, $this->module)) {
                $createImageURL = SugarThemeRegistry::current()->getImageURL('create-record.gif');
                $theTitle .= <<<EOHTML
&nbsp;
<a href="index.php?module={$module}&action=EditView&return_module={$module}&return_action=DetailView" class="utilsLink">
<img src='{$createImageURL}' alt='{$GLOBALS['app_strings']['LNK_CREATE']}'></a>
<a href="index.php?module={$module}&action=EditView&return_module={$module}&return_action=DetailView" class="utilsLink">
{$GLOBALS['app_strings']['LNK_CREATE']}
</a>
EOHTML;
            }
        }

        $theTitle .= "</span></div>\n";
        return $theTitle;
    }

    public function listViewProcess()
    {
        $this->processSearchForm();
        $this->lv->searchColumns = $this->searchForm->searchColumns;

        if (!$this->headers) {
            return;
        }
        if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
            $this->lv->ss->assign("SEARCH", true);
            $this->lv->ss->assign('savedSearchData', $this->searchForm->getSavedSearchData());

            $tplFile = 'include/ListView/ListViewGeneric.tpl';
            if (!$GLOBALS['current_user']->isAdminForModule('Users')) {
                $tplFile = 'include/ListView/ListViewNoMassUpdate.tpl';
            }
            if (!empty($this->where)) {
                $this->where .= " AND ";
            }
            $this->where .= "(users.status <> 'Reserved' or users.status is null) ";
            $this->lv->setup($this->seed, $tplFile, $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }
}
