<?php
/* Smarty version 3.1.29, created on 2016-08-30 16:02:03
  from "F:\wamp\www\atlantic\views\templates\dang-ky.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c591db4e1c48_68049795',
  'file_dependency' => 
  array (
    'd042a4f5b10ecef207fbb1221595f4a1efc9fa03' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\dang-ky.tpl',
      1 => 1472565722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57c591db4e1c48_68049795 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_1719157c591db4728f2_93513180',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:dang-ky.tpl */
function block_1719157c591db4728f2_93513180($_smarty_tpl, $_blockParentStack) {
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
		<?php echo '<script'; ?>
>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		<?php echo '</script'; ?>
>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" method="post">
				<div>
					<?php if (isset($_smarty_tpl->tpl_vars['dataErrDangKy']->value['ten_khach_hang'])) {?> <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['dataErrDangKy']->value['ten_khach_hang'];?>
 <?php }?></span>
					<input name="ten_khach_hang" placeholder="Tên:" type="text" tabindex="1" required autofocus value="<?php if (isset($_smarty_tpl->tpl_vars['dataKhachHangDangKy']->value['ten_khach_hang'])) {
echo $_smarty_tpl->tpl_vars['dataKhachHangDangKy']->value['ten_khach_hang'];
}?>">
				</div>
				<div>
					<?php if (isset($_smarty_tpl->tpl_vars['dataErrDangKy']->value['email'])) {?> <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['dataErrDangKy']->value['email'];?>
 <?php }?></span>
					<input name="email" placeholder="Email:" type="email" tabindex="2" required value="<?php if (isset($_smarty_tpl->tpl_vars['dataKhachHangDangKy']->value['email'])) {
echo $_smarty_tpl->tpl_vars['dataKhachHangDangKy']->value['email'];
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
					<input type="submit" value="Đăng Ký" id="register-submit" name="btnDangKy" tabindex="4">
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
					<input type="submit" value="đăng nhập" id="register-submit" name="btnDangNhap" tabindex="8">
				</div>
				<div class="forget">
					<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/quen-mat-khau.html" tabindex="10">Quên mật khẩu</a>
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
