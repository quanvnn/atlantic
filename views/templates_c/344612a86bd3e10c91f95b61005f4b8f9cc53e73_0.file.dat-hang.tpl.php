<?php
/* Smarty version 3.1.29, created on 2016-09-01 11:46:39
  from "F:\wamp\www\atlantic\views\templates\front\dat-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c7f8ff5f3d72_86837141',
  'file_dependency' => 
  array (
    '344612a86bd3e10c91f95b61005f4b8f9cc53e73' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\front\\dat-hang.tpl',
      1 => 1472722690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57c7f8ff5f3d72_86837141 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2055557c7f8ff5d0782_17192236',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/dat-hang.tpl */
function block_2055557c7f8ff5d0782_17192236($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>THÔNG TIN NGƯỜI NHẬN</h2>
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {
echo $_smarty_tpl->tpl_vars['message']->value;
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
					<label>
						<input name="ten_nguoi_nhan" placeholder="Tên:" type="text" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input name="dia_chi" placeholder="Địa chỉ:" type="text" tabindex="2" required>
					</label>
				</div>
				<div>
					<label>
						<input name="dien_thoai" placeholder="Điện thoại:" type="text" tabindex="3" required>
					</label>
				</div>
				<div>
					<input type="submit" value="Đặt hàng" id="register-submit" name="btnDatHang" tabindex="4">
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
