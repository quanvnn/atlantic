<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:42:58
  from "/home/lequan/IMAD/atlantic/views/templates/front/client_care.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec9bd2c18b75_03256222',
  'file_dependency' => 
  array (
    '298649b35e9811ee169e5b90e371f8f0628c7a5e' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/client_care.tpl',
      1 => 1475124166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec9bd2c18b75_03256222 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_121621485457ec9bd2c15c99_25699386',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/client_care.tpl */
function block_121621485457ec9bd2c15c99_25699386($_smarty_tpl, $_blockParentStack) {
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
