<?php /* Smarty version 2.6.31, created on 2023-04-14 02:07:04
         compiled from custom/themes/SuiteP/tpls/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'custom/themes/SuiteP/tpls/footer.tpl', 52, false),array('modifier', 'in_array', 'custom/themes/SuiteP/tpls/footer.tpl', 53, false),array('function', 'sugar_translate', 'custom/themes/SuiteP/tpls/footer.tpl', 57, false),)), $this); ?>
</div>
</div>
<!-- END of container-fluid, pageContainer divs -->
<!-- Start Footer Section -->
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <!-- Start generic footer -->
    <footer>
    	<div class="footer_right">
    		
    		<a onclick="SUGAR.util.top();" href="javascript:void(0)"><?php echo $this->_tpl_vars['APP']['LBL_SUITE_TOP']; ?>
<span class="suitepicon suitepicon-action-above"></span> </a>
    	</div>
        <?php $this->assign('excludeMobileFooter', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, "Administration,ModuleBuilder") : explode($_tmp, "Administration,ModuleBuilder"))); ?>
        <?php if (! ( ((is_array($_tmp=$_REQUEST['module'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['excludeMobileFooter']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['excludeMobileFooter'])) )): ?>   
            <div class="footer-bar footer-module-option">
                <ul class="toolbar">               
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <span id="footer-module-name"><?php echo smarty_function_sugar_translate(array('module' => 'Home','label' => 'LBL_MODULE_NAME'), $this);?>
</span>                  
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a id="footer-create-link" class="footer-links footer-action btn btn-footer" href="">
                            <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ADD'), $this);?>
</span>
                            <span class="suitepicon suitepicon-action-add"></span>
                        </a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a id="" class="footer-links footer-action btn btn-footer" href="index.php?module=Calendar&action=index">
                            <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Calendar','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                            <span class="suitepicon suitepicon-module-calendar"></span>
                        </a>                   
                    </li>
                </ul>
            </div>
            <div class="footer-bar fixed-footer">
                <ul class="toolbar">               
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Home&action=mobile" class="footer-links footer-action btn btn-footer" href="">
                            <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Home','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                            <span class="suitepicon suitepicon-action-home"></span>
                        </a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Contacts&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Contacts','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-contacts"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Leads&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Leads','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-leads"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Calls&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Calls','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-calls"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Tasks&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Tasks','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-tasks"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Meetings&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Meetings','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-meetings"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Notes&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => 'Notes','label' => 'LBL_MODULE_NAME'), $this);?>
</span>
                        <span class="suitepicon suitepicon-module-notes"></span></a>                  
                    </li>
                    <li class="dropdown nav navbar-nav globalLinks-mobile">

                        <a class="dropdown-toggle footer-links footer-action btn btn-footer" data-toggle="dropdown" aria-expanded="true">
                            <span class="footer-action-label"><?php echo smarty_function_sugar_translate(array('module' => "",'label' => 'LBL_SALES'), $this);?>
</span>
                            <i class="fas fa-dollar-sign"></i>
                                                    </a>
                        <ul class="dropdown-menu footer-dropup-menu" role="menu" aria-labelledby="dropdownMenu2">
                            <li role="presentation">
                                <a href='index.php?module=Opportunities&action=index'>
                                    <?php echo smarty_function_sugar_translate(array('module' => 'Opportunities','label' => 'LBL_MODULE_NAME'), $this);?>

                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOS_Quotes&action=index'>
                                    <?php echo smarty_function_sugar_translate(array('module' => 'AOS_Quotes','label' => 'LBL_MODULE_NAME'), $this);?>

                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOS_Invoices&action=index'>
                                    <?php echo smarty_function_sugar_translate(array('module' => 'AOS_Invoices','label' => 'LBL_MODULE_NAME'), $this);?>

                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOR_Reports&action=index'>
                                    <?php echo smarty_function_sugar_translate(array('module' => 'AOR_Reports','label' => 'LBL_MODULE_NAME'), $this);?>

                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </footer>
    <!-- END Generic Footer -->
<?php endif; ?>
<!-- END Footer Section -->
<?php echo '
    <script>

        //qe_init function sets listeners to click event on elements of \'quickEdit\' class
        if (typeof(DCMenu) != \'undefined\') {
            DCMenu.qe_refresh = false;
            DCMenu.qe_handle;
        }
        function qe_init() {

            //do not process if YUI is undefined
            if (typeof(YUI) == \'undefined\' || typeof(DCMenu) == \'undefined\') {
                return;
            }


            //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
            if (typeof(DCMenu.qe_handle) != \'undefined\') {
                DCMenu.qe_handle.detach();
            }

            //set listeners on click event, and define function to call
            YUI().use(\'node\', function (Y) {
                var qe = Y.all(\'.quickEdit\');
                var refreshDashletID;
                var refreshListID;

                //store event listener handle for future use, and define function to call on click event
                DCMenu.qe_handle = qe.on(\'click\', function (e) {
                    //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
                    ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'), 800);
                    e.preventDefault();
                    if (typeof(e.currentTarget.getAttribute(\'data-dashlet-id\')) != \'undefined\') {
                        refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
                    }
                    if (typeof(e.currentTarget.getAttribute(\'data-list\')) != \'undefined\') {
                        refreshListID = e.currentTarget.getAttribute(\'data-list\');
                    }
                    DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'), refreshListID, refreshDashletID);
                });

            });
        }

        qe_init();

        SUGAR_callsInProgress++;
        SUGAR._ajax_hist_loaded = true;
        if (SUGAR.ajaxUI)
            YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);




        $(function(){

            // fix for campaign wizard
            if($(\'#wizard\').length) {

                // footer fix
                var bodyHeight = $(\'body\').height();
                var contentHeight = $(\'#pagecontent\').height() + $(\'#wizard\').height();
                var fieldsetHeight = $(\'#pagecontent\').height() + $(\'#wizard fieldset\').height();
                var height = bodyHeight < contentHeight ? contentHeight : bodyHeight;
                if(fieldsetHeight > height) {
                    height = fieldsetHeight;
                }
                height += 50;
                $(\'#content\').css({
                    \'min-height\': height + \'px\'
                });

                // uploader fix
                $(\'#step1_uploader\').css({
                    position: \'relative\',
                    top: ($(\'#wizard\').height() - 90) + \'px\'
                });
            }
        });
        
    </script>
'; ?>

</div>
<div class="modal fade modal-generic" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="title-generic"><?php echo $this->_tpl_vars['APP']['LBL_GENERATE_PASSWORD_BUTTON_TITLE']; ?>
</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"><?php echo $this->_tpl_vars['APP']['LBL_CANCEL']; ?>
</button>
                <button id="btn-generic" class="btn btn-danger" type="button"><?php echo $this->_tpl_vars['APP']['LBL_OK']; ?>
</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- popup-window-modal Modal -->
<div class="modal fade" id="popup-window-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="popup-window-modal-close" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">&nbsp;</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->_tpl_vars['APP']['LBL_CLOSE_POPUP']; ?>
</button>
            </div>
        </div>

    </div>
</div>

<!-- logout confirm Modal -->
<div class="modal fade" id="logout-confirm-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <?php echo $this->_tpl_vars['APP']['LBL_LOGOUT_CONFIRMATION']; ?>

            </div>
            <div class="modal-footer">
                <a href=''><button type="button" class="btn btn-primary"><?php echo $this->_tpl_vars['APP']['LBL_YES']; ?>
</button></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->_tpl_vars['APP']['LBL_CANCEL']; ?>
</button>
            </div>
        </div>

    </div>
</div>
<?php if (( $_REQUEST['action'] == 'ajaxui' )): ?>   
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <?php endif; ?>
</body>
</html>