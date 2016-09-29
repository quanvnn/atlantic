<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:44:39
  from "/home/lequan/IMAD/atlantic/views/templates/front/product_details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec9c37d4fa74_98703627',
  'file_dependency' => 
  array (
    '007e4ba518fd133896e709ca5e0c0a97f5f9934d' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/product_details.tpl',
      1 => 1475124238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec9c37d4fa74_98703627 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_32094965657ec9c37d1edb9_60377972',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/product_details.tpl */
function block_32094965657ec9c37d1edb9_60377972($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
	<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
					<div class="single_left">
							<img class="" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/hinh_san_pham/<?php echo $_smarty_tpl->tpl_vars['san_pham']->value['hinh'];?>
" class="img-responsive" />
						  <div class="desc1 span_3_of_2">
							<h3><?php echo $_smarty_tpl->tpl_vars['san_pham']->value['ten_san_pham'];?>
</h3>
							<p class="brand">Tác giả: <a href="#">Nguyễn Nhật Ánh</a></p>
							<p class="brand">Giá bìa: <span class="price-old"><?php echo number_format($_smarty_tpl->tpl_vars['san_pham']->value['gia_bia']);?>
 đ</span></p>
							<p class="brand">Tại atlantic: <span class="price-new"><?php echo number_format($_smarty_tpl->tpl_vars['san_pham']->value['gia_ban']);?>
 đ</span><span>(Đã có VAT)</span></p>
							<p class="brand">Số lượng:</p>
							<div class="form-inline">
								<form method="POST">
				                    <input name='soluong' type="number" value="1" style="width:75px; text-align:left" class="form-control" />
			                    	<input name="btnMua" type="submit" value="Thêm vào giỏ hàng" class="btn btn-default" />
			                    </form>
	                    	</div>
					   	 </div>
				   	</div>

          	    	<div class="clearfix"></div>

					<div class="single-bottom2">
						<?php if (isset($_smarty_tpl->tpl_vars['DSSanPhamCungLoai']->value)) {?>
						<h6>Sản phẩm thường được xem cùng</h6>
							<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
							<?php
$_from = $_smarty_tpl->tpl_vars['DSSanPhamCungLoai']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_SanPhamCungLoai_0_saved_item = isset($_smarty_tpl->tpl_vars['SanPhamCungLoai']) ? $_smarty_tpl->tpl_vars['SanPhamCungLoai'] : false;
$_smarty_tpl->tpl_vars['SanPhamCungLoai'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['SanPhamCungLoai']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value) {
$_smarty_tpl->tpl_vars['SanPhamCungLoai']->_loop = true;
$__foreach_SanPhamCungLoai_0_saved_local_item = $_smarty_tpl->tpl_vars['SanPhamCungLoai'];
?>

							<div class="product">
							   <div class="product-desc">
									<div class="product-img">
			                           <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/hinh_san_pham/<?php echo $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['hinh'];?>
" class="img-responsive " alt=""/>
			                       	</div>
			                       	<div class="prod1-desc">
			                           <h5><a class="product_link" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['ten_san_pham_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['ma_san_pham'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['ten_san_pham'];?>
</a></h5>
			                           <p class="product_descr"> <?php echo $_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['mo_ta'];?>
 </p>									
								   	</div>
								<div class="clearfix"></div>
						      	</div>
							  	<div class="product_price">
									<span class="price-access"><?php echo number_format($_smarty_tpl->tpl_vars['SanPhamCungLoai']->value['gia_ban']);?>
 đ</span>								
									<button class="button1"><span>Add to cart</span></button>
			                  	</div>
							 	<div class="clearfix"></div>
					     	</div>
					     <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					     <?php if ($_smarty_tpl->tpl_vars['i']->value > 2) {
break 1;
}?>
					     <?php
$_smarty_tpl->tpl_vars['SanPhamCungLoai'] = $__foreach_SanPhamCungLoai_0_saved_local_item;
}
if ($__foreach_SanPhamCungLoai_0_saved_item) {
$_smarty_tpl->tpl_vars['SanPhamCungLoai'] = $__foreach_SanPhamCungLoai_0_saved_item;
}
?>
					     <?php }?>
			   	  	</div>

			   	  	<div class="single-bottom1">
						<h6>Giới thiệu sách</h6>
						<p class="prod-desc"><?php echo $_smarty_tpl->tpl_vars['san_pham']->value['mo_ta'];?>
</p>
					</div>

					<?php if (isset($_smarty_tpl->tpl_vars['DSBinhLuan']->value)) {?>
					<div class="single-bottom3">
						<h6>Nhận xét của khách hàng</h6>
						
						<?php
$_from = $_smarty_tpl->tpl_vars['DSBinhLuan']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_binhluan_1_saved_item = isset($_smarty_tpl->tpl_vars['binhluan']) ? $_smarty_tpl->tpl_vars['binhluan'] : false;
$_smarty_tpl->tpl_vars['binhluan'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['binhluan']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['binhluan']->value) {
$_smarty_tpl->tpl_vars['binhluan']->_loop = true;
$__foreach_binhluan_1_saved_local_item = $_smarty_tpl->tpl_vars['binhluan'];
?>

						<div class="product">
						   	<div class="comment">
								<div class="comment-img">
		                           	<?php if (empty($_smarty_tpl->tpl_vars['binhluan']->value['avatar'])) {?>
		                           	<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/icon_khach_hang/icon_comment.png" class="img-responsive " alt=""/>
		                           	<?php } else { ?>
		                           	<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/icon_khach_hang/<?php echo $_smarty_tpl->tpl_vars['binhluan']->value['avatar'];?>
" class="img-responsive " alt=""/>
		                           	<?php }?>
		                       	</div>
		                       	<div class="prod1-desc">
		                       		<h5><?php echo $_smarty_tpl->tpl_vars['binhluan']->value['ten_khach_hang'];?>
 | <?php echo $_smarty_tpl->tpl_vars['binhluan']->value['tieu_de'];?>
</h5>
		                           	<p class="product_descr"> <?php echo $_smarty_tpl->tpl_vars['binhluan']->value['noi_dung'];?>
</p>
							   	</div>
					      	</div>
						<div class="clearfix"></div>
				     	</div>

				     	<?php
$_smarty_tpl->tpl_vars['binhluan'] = $__foreach_binhluan_1_saved_local_item;
}
if ($__foreach_binhluan_1_saved_item) {
$_smarty_tpl->tpl_vars['binhluan'] = $__foreach_binhluan_1_saved_item;
}
?>

					</div>
					<?php }?>

					<?php if (isset($_SESSION['khachhang'])) {?>
					<div class="single-bottom3">
						<h6>Đánh giá của bạn</h6>
						<div class="comment">
							<div class="contact-form">
						  	 	<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {
echo $_smarty_tpl->tpl_vars['message']->value;
}?>
						 	    <form method="POST">
							    	<div>
								    	<span><label>Tiêu đề <span style="color:red">*</span></label></span>
								    	<span><input name="tieu_de" type="text" class="textbox" required value=""></span>
								    </div>
								    <div>
								     	<span><label>Nội dung <span style="color:red">*</span></label></span>
								     	<span><textarea name="noi_dung" required></textarea></span>
								    </div>
								    <div>
								    	<span><input name="hide" type="hidden" class="textbox"></span>
								    </div>
								   <div>
								   		<span><input type="submit" name="btnBinhLuan" value="Gửi"></span>
								  </div>
						    	</form>
						    </div>
					    </div>
					</div>
					<?php }?>

	       		</div>
   			</div>
		   <div class="clearfix"></div>		
	</div>
</div>
	<!-- end content -->

<?php
}
/* {/block 'content'} */
}
