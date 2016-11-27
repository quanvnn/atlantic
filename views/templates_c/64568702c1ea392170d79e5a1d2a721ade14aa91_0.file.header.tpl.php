<?php
/* Smarty version 3.1.29, created on 2016-11-27 16:47:35
  from "/home/lequan/dev/atlantic/views/templates/layouts/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583aabb71ebf46_99960764',
  'file_dependency' => 
  array (
    '64568702c1ea392170d79e5a1d2a721ade14aa91' => 
    array (
      0 => '/home/lequan/dev/atlantic/views/templates/layouts/header.tpl',
      1 => 1478610811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583aabb71ebf46_99960764 ($_smarty_tpl) {
?>
<!-- header_top -->
<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">Online bookstore</a></li>|
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/ho-tro-khach-hang">Atlantic care</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span></span> Lê Quân : 01667 456 101</h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
	<div class="container">
		<div class="header">
		<div class="head-t">
			<div class="logo">
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/logo.png" class="img-responsive" alt=""/> </a>
			</div>
			<!-- start header_right -->
			<div class="header_right">
				<div class="rgt-bottom">

				<div class="create_btn">
					<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/gio-hang"><span>Giỏ hàng<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/bag.png" alt=""></span></a>
				</div>

				<?php if (isset($_SESSION['khachhang'])) {?>
					<div class="log">
						<div class="login" >
							<div id="loginContainer"><a href="#" id="loginButton"><span>Chào, <?php echo $_SESSION['khachhang']['ten_khach_hang'];?>
</span></a>
								<div id="loginBox">
							        <span><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/dang-xuat">Đăng xuất</a></span>
								</div>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="log">
						<div class="login">
							<div id="loginContainer"><a href="#" id="loginButton"><span>Đăng nhập</span></a>
							    <div id="loginBox">
							        <form id="loginForm" method="POST">
							                <fieldset id="body">
							                	<fieldset>
							                          <label for="email">Email</label>
							                          <input type="text" name="email" id="email">
							                    </fieldset>
							                    <fieldset>
							                            <label for="password">Mật khẩu</label>
							                            <input type="password" name="mat_khau" id="password">
							                     </fieldset>
							                    <input type="submit" id="login" value="Đăng nhập" name="btnDangNhap">
							                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Ghi nhớ.</i></label>
							            	</fieldset>
							            <span><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/dang-ky">Đăng ký</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/quen-mat-khau">Quên mật khẩu?</a></span>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
					<div class="clearfix"></div>
				</div>
			<div class="search">
			    <form>
			    	<input type="text" id="text" placeholder="search...">
					<input type="button" value="" id="search" onclick="load()">
				</form>
			</div>

			<div id="result">
				Content
			</div>

			<div class="clearfix"> </div>
		</div>
			<div class="clearfix"> </div>
		</div>
			<!-- start header menu -->
			<ul class="megamenu skyblue">
				<li class="active grid " ><a class="color1" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">Home</a></li>
				<li class="grid"><a class="color2" href="#">Book</a>
					<div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>Thể Loại</h4>
									<ul>
										<?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_LoaiSanPham_0_saved_item = isset($_smarty_tpl->tpl_vars['LoaiSanPham']) ? $_smarty_tpl->tpl_vars['LoaiSanPham'] : false;
$_smarty_tpl->tpl_vars['LoaiSanPham'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['LoaiSanPham']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['LoaiSanPham']->value) {
$_smarty_tpl->tpl_vars['LoaiSanPham']->_loop = true;
$__foreach_LoaiSanPham_0_saved_local_item = $_smarty_tpl->tpl_vars['LoaiSanPham'];
?>
											<?php $_smarty_tpl->tpl_vars['LoaiCha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['LoaiSanPham']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'LoaiCha', 0);?>
											<li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai_san_pham_url'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai'];?>
</a></li>
										<?php
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_local_item;
}
if ($__foreach_LoaiSanPham_0_saved_item) {
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_item;
}
?>
									</ul>	
								</div>							
							</div>
							
						</div>
						<div class="row">
							<div class="col2"></div>
						</div>
    				</div>
				</li>
			 </ul>
		</div>
	</div>
</div><?php }
}
