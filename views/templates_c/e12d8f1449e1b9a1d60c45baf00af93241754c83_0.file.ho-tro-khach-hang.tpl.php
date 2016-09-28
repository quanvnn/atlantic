<?php
/* Smarty version 3.1.29, created on 2016-08-28 12:22:51
  from "F:\wamp\www\atlantic\views\templates\ho-tro-khach-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c2bb7bafe345_34482955',
  'file_dependency' => 
  array (
    'e12d8f1449e1b9a1d60c45baf00af93241754c83' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\ho-tro-khach-hang.tpl',
      1 => 1472379771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57c2bb7bafe345_34482955 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_1769357c2bb7baf27b3_84780411',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:ho-tro-khach-hang.tpl */
function block_1769357c2bb7baf27b3_84780411($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
	<div class="check">
		<button><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/gui-yeu-cau.html">Gửi yêu cầu</a></button>
	</div>
</div>

<?php
}
/* {/block 'content'} */
}
