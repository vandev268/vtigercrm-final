<?php
/* Smarty version 4.5.5, created on 2025-11-02 16:49:43
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Accounts\ListViewContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_69078ba7c92be9_73432011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '017cd0c11fb499ac4a369344d1d205d4ddf10fdd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Accounts\\ListViewContents.tpl',
      1 => 1762077933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69078ba7c92be9_73432011 (Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
.contacts-count-text {
    color: #999;
    font-weight: normal;
    margin-left: 3px;
}
</style>

<?php echo '<script'; ?>
 type="text/javascript">
    var accountsContactsCount = {
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value, 'LISTVIEW_ENTRY', true);
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->iteration = 0;
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value) {
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->do_else = false;
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->iteration++;
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->last = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->iteration === $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->total;
$__foreach_LISTVIEW_ENTRY_0_saved = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'];
?>
        <?php $_smarty_tpl->_assignInScope('ACCOUNT_ID', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId());?>
        <?php $_smarty_tpl->_assignInScope('CONTACTS_COUNT', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('contacts_count'));?>
        '<?php echo $_smarty_tpl->tpl_vars['ACCOUNT_ID']->value;?>
': <?php if ($_smarty_tpl->tpl_vars['CONTACTS_COUNT']->value) {
echo $_smarty_tpl->tpl_vars['CONTACTS_COUNT']->value;
} else { ?>0<?php }
if (!$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->last) {?>,<?php }?>
    <?php
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = $__foreach_LISTVIEW_ENTRY_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    };
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ListViewContents.tpl','Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
