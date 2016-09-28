<?php
/* Smarty version 3.1.29, created on 2016-09-01 06:57:20
  from "F:\wamp\www\atlantic\views\templates\front\ho-tro-khach-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c7b530adfad7_96079744',
  'file_dependency' => 
  array (
    'bbcac13d85071855c8b9900b6fe1b192963b5eab' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\front\\ho-tro-khach-hang.tpl',
      1 => 1472695465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57c7b530adfad7_96079744 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2118457c7b530ad3cf0_17567277',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/ho-tro-khach-hang.tpl */
function block_2118457c7b530ad3cf0_17567277($_smarty_tpl, $_blockParentStack) {
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
