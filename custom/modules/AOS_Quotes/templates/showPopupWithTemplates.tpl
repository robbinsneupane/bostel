
<div id="popupDiv_ara" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">{$APP.LBL_SELECT_TEMPLATE}</h4>
            </div>
            <div class="modal-body">
                <div style="padding: 5px 5px; overflow: auto; height: auto;">
                    <form id="popupForm" action="index.php?entryPoint=customGeneratePdf" method="get">
                        <table width="100%" class="list view table-responsive" cellspacing="0" cellpadding="0" border="0">
            
                            {foreach name=template from=$TEMPLATES key=templateKey item=template}
                                {if empty($template) == false}
                                    {capture name=on_click_js assign=on_click_js}
                                       $('#popupDiv_ara').modal('hide');var form=document.getElementById('popupForm');if(form!=null){ldelim}form.templateID.value='{$template}';form.submit();{rdelim}else{ldelim}alert('Error!');{rdelim}
                                    {/capture}
                                    <tr height="20">
                                        <td width="17" valign="center"><a href="#" onclick="{$on_click_js}">
                                            <a href="javascript:;" onclick="{$on_click_js}">
                                                <img src="themes/default/images/txt_image_inline.gif" width="16" height="16"/>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:;" onclick="{$on_click_js}">
                                                <b>{$APP_LIST_STRINGS.template_ddown_c_list.$template}</b>
                                            </a>
                                        </td>
                                    </tr>
                                {/if}
                            {/foreach}    
                            <tr style="height:10px;">
                            </tr>
                        </table>
                        <input type="hidden" name="templateID" value=""/>
                        <input type="hidden" name="entryPoint" value="customGeneratePdf"/>
                        <input type="hidden" name="same_tab" value="true"/>
                        <input type="hidden" name="task" value="pdf"/>
                        <input type="hidden" name="pdf_module" value="{$FOCUS->module_name}"/>
                        <input type="hidden" name="uid" value="{$FOCUS->id}"/>
                    </form>
                </div>
            </div>
            <div class="modal-footer">&nbsp;<button type="button" class="btn btn-primary" data-dismiss="modal">{$APP.LBL_CANCEL_BUTTON_LABEL}</button></div>
        </div>
    </div>
</div>
</div>

{literal}
    <script>
    function showPopup(task) {
        var form = document.getElementById('popupForm');
        var ppd2 = document.getElementById('popupDiv_ara');
        var totalTemplates = '{$TOTAL_TEMPLATES}';
        if (totalTemplates === 1) {
            form.task.value = task;
            form.templateID.value = '{$template}';
            form.submit();
        } else if (form !== null && ppd2 !== null) {
            $("#popupDiv_ara").modal("show",{backdrop: "static"});
            form.task.value = task;
        } else {
            alert('Error!');
        }
        return false;
    }
    </script>
{/literal}