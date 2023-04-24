{*
 /**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */
*}
</div>
</div>
<!-- END of container-fluid, pageContainer divs -->
<!-- Start Footer Section -->
{if $AUTHENTICATED}
    <!-- Start generic footer -->
    <footer>
    	<div class="footer_right">
    		
    		<a onclick="SUGAR.util.top();" href="javascript:void(0)">{$APP.LBL_SUITE_TOP}<span class="suitepicon suitepicon-action-above"></span> </a>
    	</div>
        {assign var="excludeMobileFooter" value=','|explode:"Administration,ModuleBuilder"}
        {if !($smarty.request.module|in_array:$excludeMobileFooter)}   
            <div class="footer-bar footer-module-option">
                <ul class="toolbar">               
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <span id="footer-module-name">{sugar_translate module="Home" label="LBL_MODULE_NAME"}</span>                  
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a id="footer-create-link" class="footer-links footer-action btn btn-footer" href="">
                            <span class="footer-action-label">{sugar_translate label="LBL_ADD"}</span>
                            <span class="suitepicon suitepicon-action-add"></span>
                        </a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a id="" class="footer-links footer-action btn btn-footer" href="index.php?module=Calendar&action=index">
                            <span class="footer-action-label">{sugar_translate module="Calendar" label="LBL_MODULE_NAME"}</span>
                            <span class="suitepicon suitepicon-module-calendar"></span>
                        </a>                   
                    </li>
                </ul>
            </div>
            <div class="footer-bar fixed-footer">
                <ul class="toolbar">               
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Home&action=mobile" class="footer-links footer-action btn btn-footer" href="">
                            <span class="footer-action-label">{sugar_translate module="Home" label="LBL_MODULE_NAME"}</span>
                            <span class="suitepicon suitepicon-action-home"></span>
                        </a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Contacts&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Contacts" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-contacts"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Leads&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Leads" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-leads"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Calls&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Calls" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-calls"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Tasks&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Tasks" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-tasks"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Meetings&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Meetings" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-meetings"></span></a>                   
                    </li>
                    <li  class=" nav navbar-nav globalLinks-mobile">
                        <a href="index.php?module=Notes&action=index" class="footer-links footer-action btn btn-footer" href="">
                        <span class="footer-action-label">{sugar_translate module="Notes" label="LBL_MODULE_NAME"}</span>
                        <span class="suitepicon suitepicon-module-notes"></span></a>                  
                    </li>
                    <li class="dropdown nav navbar-nav globalLinks-mobile">

                        <a class="dropdown-toggle footer-links footer-action btn btn-footer" data-toggle="dropdown" aria-expanded="true">
                            <span class="footer-action-label">{sugar_translate module="" label="LBL_SALES"}</span>
                            <i class="fas fa-dollar-sign"></i>
                            {* <img class="footer-doller-icon" src="public/doller.png" /> *}
                        </a>
                        <ul class="dropdown-menu footer-dropup-menu" role="menu" aria-labelledby="dropdownMenu2">
                            <li role="presentation">
                                <a href='index.php?module=Opportunities&action=index'>
                                    {sugar_translate module="Opportunities" label="LBL_MODULE_NAME"}
                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOS_Quotes&action=index'>
                                    {sugar_translate module="AOS_Quotes" label="LBL_MODULE_NAME"}
                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOS_Invoices&action=index'>
                                    {sugar_translate module="AOS_Invoices" label="LBL_MODULE_NAME"}
                                </a>
                            </li>
                            <li role="presentation">
                                <a href='index.php?module=AOR_Reports&action=index'>
                                    {sugar_translate module="AOR_Reports" label="LBL_MODULE_NAME"}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        {/if}
    </footer>
    <!-- END Generic Footer -->
{/if}
<!-- END Footer Section -->
{literal}
    <script>

        //qe_init function sets listeners to click event on elements of 'quickEdit' class
        if (typeof(DCMenu) != 'undefined') {
            DCMenu.qe_refresh = false;
            DCMenu.qe_handle;
        }
        function qe_init() {

            //do not process if YUI is undefined
            if (typeof(YUI) == 'undefined' || typeof(DCMenu) == 'undefined') {
                return;
            }


            //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
            if (typeof(DCMenu.qe_handle) != 'undefined') {
                DCMenu.qe_handle.detach();
            }

            //set listeners on click event, and define function to call
            YUI().use('node', function (Y) {
                var qe = Y.all('.quickEdit');
                var refreshDashletID;
                var refreshListID;

                //store event listener handle for future use, and define function to call on click event
                DCMenu.qe_handle = qe.on('click', function (e) {
                    //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
                    ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'), 800);
                    e.preventDefault();
                    if (typeof(e.currentTarget.getAttribute('data-dashlet-id')) != 'undefined') {
                        refreshDashletID = e.currentTarget.getAttribute('data-dashlet-id');
                    }
                    if (typeof(e.currentTarget.getAttribute('data-list')) != 'undefined') {
                        refreshListID = e.currentTarget.getAttribute('data-list');
                    }
                    DCMenu.miniEditView(e.currentTarget.getAttribute('data-module'), e.currentTarget.getAttribute('data-record'), refreshListID, refreshDashletID);
                });

            });
        }

        qe_init();

        SUGAR_callsInProgress++;
        SUGAR._ajax_hist_loaded = true;
        if (SUGAR.ajaxUI)
            YAHOO.util.Event.onContentReady('ajaxUI-history-field', SUGAR.ajaxUI.firstLoad);




        $(function(){

            // fix for campaign wizard
            if($('#wizard').length) {

                // footer fix
                var bodyHeight = $('body').height();
                var contentHeight = $('#pagecontent').height() + $('#wizard').height();
                var fieldsetHeight = $('#pagecontent').height() + $('#wizard fieldset').height();
                var height = bodyHeight < contentHeight ? contentHeight : bodyHeight;
                if(fieldsetHeight > height) {
                    height = fieldsetHeight;
                }
                height += 50;
                $('#content').css({
                    'min-height': height + 'px'
                });

                // uploader fix
                $('#step1_uploader').css({
                    position: 'relative',
                    top: ($('#wizard').height() - 90) + 'px'
                });
            }
        });
        
    </script>
{/literal}
</div>
<div class="modal fade modal-generic" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="title-generic">{$APP.LBL_GENERATE_PASSWORD_BUTTON_TITLE}</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">{$APP.LBL_CANCEL}</button>
                <button id="btn-generic" class="btn btn-danger" type="button">{$APP.LBL_OK}</button>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">{$APP.LBL_CLOSE_POPUP}</button>
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
                {$APP.LBL_LOGOUT_CONFIRMATION}
            </div>
            <div class="modal-footer">
                <a href=''><button type="button" class="btn btn-primary">{$APP.LBL_YES}</button></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">{$APP.LBL_CANCEL}</button>
            </div>
        </div>

    </div>
</div>
{if ($smarty.request.action == 'ajaxui')}   
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    {/if}
</body>
</html>
