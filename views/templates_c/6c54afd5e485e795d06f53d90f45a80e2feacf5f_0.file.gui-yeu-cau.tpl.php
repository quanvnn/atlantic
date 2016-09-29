<?php
/* Smarty version 3.1.29, created on 2016-09-29 10:31:09
  from "/home/lequan/IMAD/atlantic/views/templates/front/gui-yeu-cau.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec8afda5bb74_84735437',
  'file_dependency' => 
  array (
    '6c54afd5e485e795d06f53d90f45a80e2feacf5f' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/gui-yeu-cau.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec8afda5bb74_84735437 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_141029531257ec8afda51ee1_66605683',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/gui-yeu-cau.tpl */
function block_141029531257ec8afda51ee1_66605683($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
<div class="contact">
  <div class="contact-form">
	  	 	<h2>Gửi yêu cầu</h2>
	  	 	<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {
echo $_smarty_tpl->tpl_vars['message']->value;
}?>
	 	    <form method="post">
		    	<div>
			    	<span><label>Địa chỉ email của bạn <span style="color:red">* <?php if (isset($_smarty_tpl->tpl_vars['dataErr']->value['email'])) {
echo $_smarty_tpl->tpl_vars['dataErr']->value['email'];
}?></span></label></span>
			    	<span><input name="email" type="text" class="textbox" required value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['email'])) {
echo $_smarty_tpl->tpl_vars['data']->value['email'];
}?>"></span>
			    </div>
			    <div>
			    	<span><label>Tiêu đề <span style="color:red">* <?php if (isset($_smarty_tpl->tpl_vars['dataErr']->value['tieu_de'])) {
echo $_smarty_tpl->tpl_vars['dataErr']->value['tieu_de'];
}?></span></label></span>
			    	<span><input name="tieu_de" type="text" class="textbox" required value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['tieu_de'])) {
echo stripslashes($_smarty_tpl->tpl_vars['data']->value['tieu_de']);
}?>"></span>
			    </div>
			    <div>
			     	<span><label>Nội dung <span style="color:red">* <?php if (isset($_smarty_tpl->tpl_vars['dataErr']->value['noi_dung'])) {
echo $_smarty_tpl->tpl_vars['dataErr']->value['noi_dung'];
}?></span></label></span>
			     	<span><textarea name="noi_dung" required><?php if (isset($_smarty_tpl->tpl_vars['data']->value['noi_dung'])) {
echo stripslashes($_smarty_tpl->tpl_vars['data']->value['noi_dung']);
}?></textarea></span>
			    </div>
			    <div>
			    	<span><input name="hide" type="hidden" class="textbox"></span>
			    </div>
			   <div>
			   		<span><input type="submit" class="" value="Gửi"></span>
			  </div>
	    </form>
    </div>
	<div class="clearfix"></div>		
</div>
</div>
</div>

<?php
}
/* {/block 'content'} */
}
