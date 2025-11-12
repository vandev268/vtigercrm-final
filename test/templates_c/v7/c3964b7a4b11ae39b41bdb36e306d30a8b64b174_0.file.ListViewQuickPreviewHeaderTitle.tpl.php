<?php
/* Smarty version 4.5.5, created on 2025-11-06 01:57:25
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\ListViewQuickPreviewHeaderTitle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_690c0085739af9_35228880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3964b7a4b11ae39b41bdb36e306d30a8b64b174' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\ListViewQuickPreviewHeaderTitle.tpl',
      1 => 1761802269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_690c0085739af9_35228880 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('QUICK_PREVIEW', "true");
$_smarty_tpl->_subTemplateRender(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'vtemplate_path' ][ 0 ], array( "DetailViewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value )), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('MODULE_MODEL'=>$_smarty_tpl->tpl_vars['MODULE_MODEL']->value,'RECORD'=>$_smarty_tpl->tpl_vars['RECORD']->value), 0, true);
}
}
