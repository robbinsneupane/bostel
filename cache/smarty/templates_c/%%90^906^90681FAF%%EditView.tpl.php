<?php /* Smarty version 2.6.31, created on 2023-04-06 13:19:25
         compiled from cache/themes/SuiteP/modules/Notes/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 48, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 103, false),array('function', 'sugar_include', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 64, false),array('function', 'sugar_translate', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 85, false),array('function', 'counter', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 110, false),array('function', 'html_options', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 191, false),array('function', 'sugar_getscript', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 342, false),array('block', 'minify', 'cache/themes/SuiteP/modules/Notes/EditView.tpl', 101, false),)), $this); ?>


<script>
    <?php echo '
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });

        if($(\'.edit-view-pagination\').children().length == 0) $(\'.saveAndContinue\').remove();
    });
    '; ?>

</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<div class="edit-view-pagination-mobile-container">
<div class="edit-view-pagination edit-view-mobile-pagination">
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</div>
</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (( ! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] ) ) && ! ( isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true' )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']): ?><?php echo $_REQUEST['return_relationship']; ?>
<?php elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )): ?><?php echo $_REQUEST['relate_to']; ?>
<?php elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )): ?><?php echo $_REQUEST['return_module']; ?>
<?php endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<?php $this->assign('place', '_HEADER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<input type="hidden" id="assigned_user_id" name="assigned_user_id" value="<?php echo $this->_tpl_vars['current_user']->id; ?>
">   
<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE"><?php endif; ?> 
<?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && empty ( $this->_tpl_vars['fields']['id']['value'] ) ) && empty ( $_REQUEST['return_id'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ! empty ( $_REQUEST['return_module'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=<?php echo $_REQUEST['return_action']; ?>
&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Notes'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif; ?>
<?php if ($this->_tpl_vars['showVCRControl']): ?>
<button type="button" id="save_and_continue" class="button saveAndContinue" title="<?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>
" onClick="SUGAR.saveAndContinue(this);">
<?php echo $this->_tpl_vars['APP']['LBL_SAVE_AND_CONTINUE']; ?>

</button>
<?php endif; ?>
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')): ?><?php if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup_modal("Audit",  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } , "", false, "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Notes"); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif; ?><?php endif; ?>
</div>
</td>
<td align='right' class="edit-view-pagination-desktop-container">
<div class="edit-view-pagination edit-view-pagination-desktop">
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</div>
</td>
</tr>
</table>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="EditView_tabs">

<ul class="nav nav-tabs">
</ul>
<div class="clearfix"></div>
<div class="tab-content" style="padding: 0; border: 0;">

<div class="tab-pane panel-collapse">&nbsp;</div>
</div>

<div class="panel-content">
<div>&nbsp;</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_INFORMATION','module' => 'Notes'), $this);?>

</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_-1" data-id="LBL_NOTE_INFORMATION">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_NOTE_SUBJECT">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_SUBJECT','module' => 'Notes'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<span class="required">*</span>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="name" field="name"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='60' 
maxlength='255' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_CONTACT_NAME">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Notes'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="contact_name"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['contact_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['contact_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['contact_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['contact_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_LABEL'), $this);?>
"
onclick='open_popup_modal(
"<?php echo $this->_tpl_vars['fields']['contact_name']['module']; ?>
", 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"contact_id","name":"contact_name"}}'; ?>
, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['contact_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL'), $this);?>
" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['contact_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_RELATED_TO">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_TO','module' => 'Notes'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="parent" field="parent_name"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<select name='parent_type' tabindex="0" id='parent_type' title=''  onchange='document.<?php echo $this->_tpl_vars['form_name']; ?>
.<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
.value="";document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_id.value=""; changeParentQS("<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
"); checkParentType(document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_type.value, document.<?php echo $this->_tpl_vars['form_name']; ?>
.btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
);'>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['parent_name']['options'],'selected' => $this->_tpl_vars['fields']['parent_type']['value'],'sortoptions' => true), $this);?>

</select>
<?php if (empty ( $this->_tpl_vars['fields']['parent_name']['options'][$this->_tpl_vars['fields']['parent_type']['value']] )): ?>
<?php $this->assign('keepParent', 0); ?>
<?php else: ?>
<?php $this->assign('keepParent', 1); ?>
<?php endif; ?>
<input type="text" name="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" class="sqsEnabled" tabindex="0"
size="" <?php if ($this->_tpl_vars['keepParent']): ?>value="<?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
"<?php endif; ?> autocomplete="off"><input type="hidden" name="<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
"  
<?php if ($this->_tpl_vars['keepParent']): ?>value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
"<?php endif; ?>>
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="0"	
title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_LABEL'), $this);?>
" onclick='open_popup_modal(document.<?php echo $this->_tpl_vars['form_name']; ?>
.parent_type.value, <?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}'; ?>
, "single", true);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => ""), $this);?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['parent_name']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['parent_id']['name']; ?>
.value = '';" value="<?php echo smarty_function_sugar_translate(array('label' => ""), $this);?>
" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<?php echo '
<script type="text/javascript">
if (typeof(changeParentQS) == \'undefined\'){
function changeParentQS(field) {
    if(typeof sqs_objects == \'undefined\') {
       return;
    }
	field = YAHOO.util.Dom.get(field);
    var form = field.form;
    var sqsId = form.id + "_" + field.id;
    var typeField =  form.elements.parent_type;
    var new_module = typeField.value;
    //Update the SQS globals to reflect the new module choice
    if (typeof(QSFieldsArray[sqsId]) != \'undefined\')
    {
        QSFieldsArray[sqsId].sqs.modules = new Array(new_module);
    }
	if(typeof QSProcessedFieldsArray != \'undefined\')
    {
	   QSProcessedFieldsArray[sqsId] = false;
    }
    if(sqs_objects[sqsId] == undefined){
    	return;
    }
    sqs_objects[sqsId]["modules"] = new Array(new_module);
    if(typeof(disabledModules) != \'undefined\' && typeof(disabledModules[new_module]) != \'undefined\') {
		sqs_objects[sqsId]["disable"] = true;
		field.readOnly = true;
	} else {
		sqs_objects[sqsId]["disable"] = false;
		field.readOnly = false;
    }
    enableQS(false);
}}
</script>
<script>var disabledModules=[];</script>
<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_parent_name\']={"form":"EditView","method":"query","modules":["'; ?>
<?php if (! empty ( $this->_tpl_vars['fields']['parent_type']['value'] )): ?><?php echo $this->_tpl_vars['fields']['parent_type']['value']; ?>
<?php else: ?>Accounts<?php endif; ?><?php echo '"],"group":"or","field_list":["name","id"],"populate_list":["parent_name","parent_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>
<script>
//change this in case it wasn\'t the default on editing existing items.
$(document).ready(function(){
	changeParentQS("parent_name")
});
</script>
'; ?>

</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_ATTACHMENTS">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ATTACHMENTS','module' => 'Notes'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="function" field="attachments_view" colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>

<span id='attachments_view_span'>
<?php echo $this->_tpl_vars['fields']['attachments_view']['value']; ?>
</span>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_DESCRIPTION">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_STATUS','module' => 'Notes'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="description" colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['description']['value'] )): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['description']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['description']['value']); ?>
<?php endif; ?>
<textarea  id='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['description']['name']; ?>
'
rows="3"
cols="90"
title='' tabindex="0" 
 ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<?php echo ''; ?>

</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>
</div>
</div>

<script language="javascript">
    var _form_id = '<?php echo $this->_tpl_vars['form_id']; ?>
';
    <?php echo '
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == \'\') ? \'EditView\' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    '; ?>

</script>
<?php $this->assign('place', '_FOOTER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('EditView'); <?php if ($this->_tpl_vars['isDuplicate']): ?>_form.return_id.value=''; <?php endif; ?>_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
" id="SAVE"><?php endif; ?> 
<?php if (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $_REQUEST['return_id'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" type="button" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && ! empty ( $this->_tpl_vars['fields']['id']['value'] ) )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ( $_REQUEST['return_action'] == 'DetailView' && empty ( $this->_tpl_vars['fields']['id']['value'] ) ) && empty ( $_REQUEST['return_id'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (! empty ( $_REQUEST['return_action'] ) && ! empty ( $_REQUEST['return_module'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=<?php echo $_REQUEST['return_action']; ?>
&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php elseif (empty ( $_REQUEST['return_action'] ) || empty ( $_REQUEST['return_id'] ) && ! empty ( $this->_tpl_vars['fields']['id']['value'] )): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=Notes'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php else: ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=<?php echo ((is_array($_tmp=$_REQUEST['return_module'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&record=<?php echo ((is_array($_tmp=$_REQUEST['return_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
'); return false;" type="button" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
" id="CANCEL"> <?php endif; ?>
<?php if ($this->_tpl_vars['showVCRControl']): ?>
<button type="button" id="save_and_continue" class="button saveAndContinue" title="<?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>
" onClick="SUGAR.saveAndContinue(this);">
<?php echo $this->_tpl_vars['APP']['LBL_SAVE_AND_CONTINUE']; ?>

</button>
<?php endif; ?>
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')): ?><?php if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup_modal("Audit",  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } , "", false, "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Notes"); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif; ?><?php endif; ?>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<!-- Begin Meta-Data Javascript -->
<?php echo smarty_function_sugar_getscript(array('file' => "include/javascript/dashlets.js"), $this);?>

<script>
function deleteAttachmentCallBack(text)
	<?php echo ' { '; ?>

	if(text == 'true') <?php echo ' { '; ?>

		document.getElementById('new_attachment').style.display = '';
		ajaxStatus.hideStatus();
		document.getElementById('old_attachment').innerHTML = '';
	<?php echo ' } '; ?>
 else <?php echo ' { '; ?>

		document.getElementById('new_attachment').style.display = 'none';
		ajaxStatus.flashStatus(SUGAR.language.get('Notes', 'ERR_REMOVING_ATTACHMENT'), 2000);
	<?php echo ' } '; ?>

<?php echo ' } '; ?>

</script>
<script>toggle_portal_flag(); function toggle_portal_flag()  <?php echo ' { '; ?>
 <?php echo $this->_tpl_vars['TOGGLE_JS']; ?>
 <?php echo ' } '; ?>
 </script>
<!-- End Meta-Data Javascript -->
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){SUGAR.util.buildAccessKeyLabels();});
</script>
<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {
$(document).ready(function() {
    $(".collapseLink,.expandLink").click(function (e) { e.preventDefault(); });
  });
}
</script>
<?php echo '
<script type="text/javascript">

    var selectTab = function(tab) {
        $(\'#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER\').hide();
        $(\'#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER\').eq(tab).show().addClass(\'active\').addClass(\'in\');
        $(\'#EditView_tabs div.panel-content div.panel\').hide();
        $(\'#EditView_tabs div.panel-content div.panel.tab-panel-\' + tab).show()
    };

    var selectTabOnError = function(tab) {
        selectTab(tab);
        $(\'#EditView_tabs ul.nav.nav-tabs li\').removeClass(\'active\');
        $(\'#EditView_tabs ul.nav.nav-tabs li a\').css(\'color\', \'\');

        $(\'#EditView_tabs ul.nav.nav-tabs li\').eq(tab).find(\'a\').first().css(\'color\', \'red\');
        $(\'#EditView_tabs ul.nav.nav-tabs li\').eq(tab).addClass(\'active\');

    };

    var selectTabOnErrorInputHandle = function(inputHandle) {
        var tab = $(inputHandle).closest(\'.tab-pane-NOBOOTSTRAPTOGGLER\').attr(\'id\').match(/^detailpanel_(.*)$/)[1];
        selectTabOnError(tab);
    };


    $(function(){
        $(\'#EditView_tabs ul.nav.nav-tabs li > a[data-toggle="tab"]\').click(function(e){
            if(typeof $(this).parent().find(\'a\').first().attr(\'id\') != \'undefined\') {
                var tab = parseInt($(this).parent().find(\'a\').first().attr(\'id\').match(/^tab(.)*$/)[1]);
                selectTab(tab);
            }
        });

        $(\'a[data-toggle="collapse-edit"]\').click(function(e){
            if($(this).hasClass(\'collapsed\')) {
              // Expand panel
                // Change style of .panel-header
                $(this).removeClass(\'collapsed\');
                // Expand .panel-body
                $(this).parents(\'.panel\').find(\'.panel-body\').removeClass(\'in\').addClass(\'in\');
            } else {
              // Collapse panel
                // Change style of .panel-header
                $(this).addClass(\'collapsed\');
                // Collapse .panel-body
                $(this).parents(\'.panel\').find(\'.panel-body\').removeClass(\'in\').removeClass(\'in\');
            }
        });
    });

    </script>
'; ?>
<?php echo '
<script type="text/javascript">
addForm(\'EditView\');addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_BY','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED_BY','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED_BY','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'name\', \'name\', true,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NOTE_SUBJECT','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'file_mime_type\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FILE_MIME_TYPE','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'file_url\', \'function\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FILE_URL','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'filename\', \'file\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FILENAME','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'parent_type\', \'parent_type\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_TYPE','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'parent_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'contact_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'portal_flag\', \'bool\', true,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PORTAL_FLAG','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'embed_flag\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMBED_FLAG','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'parent_name\', \'parent\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_RELATED_TO','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'contact_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'contact_phone\', \'phone\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'contact_email\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_ADDRESS','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'account_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'opportunity_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'acase_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CASE_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'lead_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_ID','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'attachments\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ATTACHMENTS','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'EditView\', \'attachments_view\', \'function\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ATTACHMENTS','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Notes','for_js' => true), $this);?>
<?php echo ': '; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\', \'assigned_user_id\' );
addToValidateBinaryDependency(\'EditView\', \'contact_name\', \'alpha\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Notes','for_js' => true), $this);?>
<?php echo ': '; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONTACT_NAME','module' => 'Notes','for_js' => true), $this);?>
<?php echo '\', \'contact_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_contact_name\']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name","contact_id","contact_id","contact_id"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_parent_name\']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name","parent_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>
