<?php
/* Smarty version 3.1.29, created on 2016-09-11 11:59:37
  from "F:\wamp\www\atlantic\views\templates\front\dang-ky.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d52b0912cb21_91424421',
  'file_dependency' => 
  array (
    '1f51b8dc87606386cb24d28915734b26943c0f34' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\front\\dang-ky.tpl',
      1 => 1473587934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57d52b0912cb21_91424421 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2299657d52b090b8723_91905682',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/dang-ky.tpl */
function block_2299657d52b090b8723_91905682($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>ĐĂNG KÝ</h2>
		<?php if (isset($_smarty_tpl->tpl_vars['message_dangky']->value)) {
echo $_smarty_tpl->tpl_vars['message_dangky']->value;
}?>
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" method="post">
				<div>
					<?php if (isset($_smarty_tpl->tpl_vars['dataErrDangKy']->value['ten_khach_hang'])) {?> <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['dataErrDangKy']->value['ten_khach_hang'];?>
 <?php }?></span>
					<input name="ten_khach_hang" placeholder="Tên:" type="text" tabindex="1" required autofocus value="<?php if (isset($_smarty_tpl->tpl_vars['dataDangKy']->value['ten_khach_hang'])) {
echo $_smarty_tpl->tpl_vars['dataDangKy']->value['ten_khach_hang'];
}?>">
				</div>
				<div>
					<?php if (isset($_smarty_tpl->tpl_vars['dataErrDangKy']->value['email'])) {?> <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['dataErrDangKy']->value['email'];?>
 <?php }?></span>
					<input name="email" placeholder="Email:" type="email" tabindex="2" required value="<?php if (isset($_smarty_tpl->tpl_vars['dataDangKy']->value['email'])) {
echo $_smarty_tpl->tpl_vars['dataDangKy']->value['email'];
}?>">
				</div>
				<div>
					<?php if (isset($_smarty_tpl->tpl_vars['dataErrDangKy']->value['mat_khau'])) {?> <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['dataErrDangKy']->value['mat_khau'];?>
 <?php }?></span>
					<input name="mat_khau" placeholder="Mật khẩu:" type="password" tabindex="3" required>
				</div>
				<div>
					<input name="hide" type="hidden">
				</div>
				<div>
					<input type="submit" value="Đăng Ký" name="btnDangKy" tabindex="4">
				</div>
				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" tabindex="5"><i></i>Tôi đồng ý các <a class="terms" href="#"> điều khoản atlantic</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2>ĐĂNG NHẬP</h2>
		<?php if (isset($_smarty_tpl->tpl_vars['message_dangnhap']->value)) {
echo $_smarty_tpl->tpl_vars['message_dangnhap']->value;
}?>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" method="post">
				<div>
					<label>
						<input name="email" placeholder="Email:" type="email" tabindex="6" required>
					</label>
				</div>
				<div>
					<label>
						<input name="mat_khau" placeholder="Mật khẩu:" type="password" tabindex="7" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="đăng nhập" name="btnDangNhap" tabindex="8">
				</div>
				<div class="forget">
					<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/quen-mat-khau" tabindex="10">Quên mật khẩu</a>
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>

<?php
}
/* {/block 'content'} */
}
