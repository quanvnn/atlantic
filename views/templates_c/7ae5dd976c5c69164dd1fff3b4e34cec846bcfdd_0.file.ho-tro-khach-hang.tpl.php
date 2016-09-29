<?php
/* Smarty version 3.1.29, created on 2016-09-29 10:31:08
  from "/home/lequan/IMAD/atlantic/views/templates/front/ho-tro-khach-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec8afc2f2d92_10982626',
  'file_dependency' => 
  array (
    '7ae5dd976c5c69164dd1fff3b4e34cec846bcfdd' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/ho-tro-khach-hang.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec8afc2f2d92_10982626 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_173360614357ec8afc2f1498_35198674',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/ho-tro-khach-hang.tpl */
function block_173360614357ec8afc2f1498_35198674($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
	<div class="check">
		<button><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/gui-yeu-cau">Gửi yêu cầu</a></button>
	</div>
</div>

<?php
}
/* {/block 'content'} */
}
