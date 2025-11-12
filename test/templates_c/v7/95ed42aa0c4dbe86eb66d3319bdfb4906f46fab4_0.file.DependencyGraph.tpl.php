<?php
/* Smarty version 4.5.5, created on 2025-11-05 11:40:02
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Settings\PickListDependency\DependencyGraph.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_690b3792de5d30_59325348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95ed42aa0c4dbe86eb66d3319bdfb4906f46fab4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Settings\\PickListDependency\\DependencyGraph.tpl',
      1 => 1761802269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_690b3792de5d30_59325348 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row"><div class="col-sm-12 col-xs-12 accordion"><span><i class="icon-info-sign alignMiddle"></i>&nbsp;<?php echo vtranslate('LBL_CONFIGURE_DEPENDENCY_INFO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;&nbsp;</span><a class="cursorPointer accordion-heading accordion-toggle" data-toggle="collapse" data-target="#dependencyHelp"><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
..</a><div id="dependencyHelp" class="accordion-body collapse"><ul><br><li><?php echo vtranslate('LBL_CONFIGURE_DEPENDENCY_HELP_1',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li><br><li><?php echo vtranslate('LBL_CONFIGURE_DEPENDENCY_HELP_2',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</li><br><li><?php echo vtranslate('LBL_CONFIGURE_DEPENDENCY_HELP_3',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<span class="selectedCell" style="padding: 4px;"><?php echo vtranslate('Selected Values',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></li></ul></div></div></div><br><div class="row"><div class="col-sm-2 col-xs-2"><div class="btn-group"><button class="btn btn-default sourceValues" type="button"><?php echo vtranslate('LBL_SELECT_SOURCE_VALUES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div><div class="col-sm-10 col-xs-10"><div class="btn-group"><button class="btn btn-default selectAllValues" type="button"><?php echo vtranslate('LBL_SELECT_ALL_VALUES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><button class="btn btn-default unSelectAllValues" type="button"><?php echo vtranslate('LBL_UNSELECT_ALL_VALUES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div><br><?php $_smarty_tpl->_assignInScope('SELECTED_MODULE', $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('sourceModule'));
$_smarty_tpl->_assignInScope('SOURCE_FIELD', $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('sourcefield'));
$_smarty_tpl->_assignInScope('MAPPED_SOURCE_PICKLIST_VALUES', array());
$_smarty_tpl->_assignInScope('MAPPED_TARGET_PICKLIST_VALUES', array());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MAPPED_VALUES']->value, 'MAPPING');
$_smarty_tpl->tpl_vars['MAPPING']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MAPPING']->value) {
$_smarty_tpl->tpl_vars['MAPPING']->do_else = false;
$_smarty_tpl->_assignInScope('value', array_push($_smarty_tpl->tpl_vars['MAPPED_SOURCE_PICKLIST_VALUES']->value,$_smarty_tpl->tpl_vars['MAPPING']->value['sourcevalue']));
$_tmp_array = isset($_smarty_tpl->tpl_vars['MAPPED_TARGET_PICKLIST_VALUES']) ? $_smarty_tpl->tpl_vars['MAPPED_TARGET_PICKLIST_VALUES']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['MAPPING']->value['sourcevalue']] = $_smarty_tpl->tpl_vars['MAPPING']->value['targetvalues'];
$_smarty_tpl->_assignInScope('MAPPED_TARGET_PICKLIST_VALUES', $_tmp_array);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_assignInScope('DECODED_MAPPED_SOURCE_PICKLIST_VALUES', array_map('decode_html',$_smarty_tpl->tpl_vars['MAPPED_SOURCE_PICKLIST_VALUES']->value));?><input type="hidden" class="allSourceValues" value='<?php echo Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUES']->value));?>
' /><div class="row depandencyTable" style="padding-right: 10px;"><div class="col-sm-2 col-xs-2" style="padding-right: 0px;"><table class="listview-table table-bordered table-condensed" style="width: 100%; border-collapse:collapse;"><thead><tr class="blockHeader"><th><?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->getSourceFieldLabel();?>
</th></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TARGET_PICKLIST_VALUES']->value, 'TARGET_VALUE', false, NULL, 'targetValuesLoop', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['TARGET_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['TARGET_VALUE']->value) {
$_smarty_tpl->tpl_vars['TARGET_VALUE']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_targetValuesLoop']->value['index']++;
?><tr><?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_targetValuesLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_targetValuesLoop']->value['index'] : null) == 0) {?><td class="tableHeading" style="border: none;"><?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->getTargetFieldLabel();?>
</td></tr><?php } else { ?><td style="border: none;">&nbsp;</td></tr><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><div class="col-sm-10 col-xs-10 dependencyMapping"><table class="listview-table table-bordered pickListDependencyTable" style="width:auto;"><thead><tr class="blockHeader"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUES']->value, 'TRANSLATED_SOURCE_PICKLIST_VALUE', false, 'SOURCE_PICKLIST_VALUE');
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value => $_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->value) {
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->do_else = false;
?><th data-source-value="<?php echo $_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value];?>
" style="width:160px;<?php if (!empty($_smarty_tpl->tpl_vars['MAPPED_VALUES']->value) && !in_array($_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['DECODED_MAPPED_SOURCE_PICKLIST_VALUES']->value)) {?> display: none; <?php }?>"><?php echo $_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->value;?>
</th><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TARGET_PICKLIST_VALUES']->value, 'TRANSLATED_TARGET_VALUE', false, 'TARGET_VALUE');
$_smarty_tpl->tpl_vars['TRANSLATED_TARGET_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['TARGET_VALUE']->value => $_smarty_tpl->tpl_vars['TRANSLATED_TARGET_VALUE']->value) {
$_smarty_tpl->tpl_vars['TRANSLATED_TARGET_VALUE']->do_else = false;
?><tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUES']->value, 'TRANSLATED_SOURCE_PICKLIST_VALUE', false, 'SOURCE_PICKLIST_VALUE');
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value => $_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->value) {
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_PICKLIST_VALUE']->do_else = false;
$_smarty_tpl->_assignInScope('targetValues', (isset($_smarty_tpl->tpl_vars['MAPPED_TARGET_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value]])) ? $_smarty_tpl->tpl_vars['MAPPED_TARGET_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value]] : array());
$_smarty_tpl->_assignInScope('IS_SELECTED', false);
if (empty($_smarty_tpl->tpl_vars['targetValues']->value) || in_array($_smarty_tpl->tpl_vars['TARGET_VALUE']->value,$_smarty_tpl->tpl_vars['targetValues']->value)) {
$_smarty_tpl->_assignInScope('IS_SELECTED', true);
}?><td data-source-value='<?php echo $_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value];?>
' data-target-value='<?php echo $_smarty_tpl->tpl_vars['SAFEHTML_TARGET_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['TARGET_VALUE']->value];?>
'class="<?php if ($_smarty_tpl->tpl_vars['IS_SELECTED']->value) {?>selectedCell <?php } else { ?>unselectedCell <?php }?> targetValue picklistValueMapping cursorPointer"<?php if (!empty($_smarty_tpl->tpl_vars['MAPPED_VALUES']->value) && !in_array($_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['DECODED_MAPPED_SOURCE_PICKLIST_VALUES']->value)) {?>style="display: none;" <?php }?>><?php if ($_smarty_tpl->tpl_vars['IS_SELECTED']->value) {?><i class="fa fa-check pull-left"></i><?php }
echo $_smarty_tpl->tpl_vars['TRANSLATED_TARGET_VALUE']->value;?>
</td><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div></div><div class="modal-dialog modal-lg sourcePicklistValuesModal modalCloneCopy hide"><div class="modal-content"><?php ob_start();
echo vtranslate('LBL_SELECT_SOURCE_PICKLIST_VALUES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', $_prefixVariable1);
$_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'vtemplate_path' ][ 0 ], array( "ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><div class="modal-body"><table class="table table-condensed table-borderless" cellspacing="0" cellpadding="5"><tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SOURCE_PICKLIST_VALUES']->value, 'TRANSLATED_SOURCE_VALUE', false, 'SOURCE_VALUE', 'sourceValuesLoop', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SOURCE_VALUE']->value => $_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_VALUE']->value) {
$_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_VALUE']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_sourceValuesLoop']->value['index']++;
if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sourceValuesLoop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sourceValuesLoop']->value['index'] : null)%3 == 0) {?></tr><tr><?php }?><td><label><input type="checkbox" class="sourceValue <?php echo $_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_VALUE']->value];?>
"data-source-value="<?php echo $_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_VALUE']->value];?>
" value="<?php echo $_smarty_tpl->tpl_vars['SAFEHTML_SOURCE_PICKLIST_VALUES']->value[$_smarty_tpl->tpl_vars['SOURCE_VALUE']->value];?>
"<?php if (empty($_smarty_tpl->tpl_vars['MAPPED_VALUES']->value) || in_array($_smarty_tpl->tpl_vars['SOURCE_VALUE']->value,$_smarty_tpl->tpl_vars['DECODED_MAPPED_SOURCE_PICKLIST_VALUES']->value)) {?> checked <?php }?>/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['TRANSLATED_SOURCE_VALUE']->value;?>
</label></td><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tr></table></div><?php $_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'vtemplate_path' ][ 0 ], array( 'ModalFooter.tpl','Vtiger' )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div>
<?php }
}
