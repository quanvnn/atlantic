<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:47:16
  from "/home/lequan/IMAD/atlantic/views/templates/front/product_in_category.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec9cd49793f2_99911888',
  'file_dependency' => 
  array (
    'd8d85c3916b9278631fc67547bae24ccd5da4283' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/product_in_category.tpl',
      1 => 1475124389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec9cd49793f2_99911888 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_60650063357ec9cd49600f9_99489421',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/product_in_category.tpl */
function block_60650063357ec9cd49600f9_99489421($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
	<div class="women_main">
		<!-- start sidebar -->
		<div class="col-md-3 s-d">
		  <div class="w_sidebar">
			
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
				<?php $_smarty_tpl->tpl_vars['loaicha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['LoaiSanPham']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'loaicha', 0);?>
				<?php $_smarty_tpl->tpl_vars['DSLoaiCon'] = new Smarty_Variable($_smarty_tpl->tpl_vars['LoaiSanPham']->value[1], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'DSLoaiCon', 0);?>
			
				<div class="w_nav1">
					<h4><?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai'];?>
</h4>
					<ul>
						<?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiCon']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loaicon_1_saved_item = isset($_smarty_tpl->tpl_vars['loaicon']) ? $_smarty_tpl->tpl_vars['loaicon'] : false;
$_smarty_tpl->tpl_vars['loaicon'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['loaicon']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['loaicon']->value) {
$_smarty_tpl->tpl_vars['loaicon']->_loop = true;
$__foreach_loaicon_1_saved_local_item = $_smarty_tpl->tpl_vars['loaicon'];
?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai_san_pham_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ten_loai_san_pham_url'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ten_loai'];?>
</a></li>
						<?php
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_local_item;
}
if ($__foreach_loaicon_1_saved_item) {
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_item;
}
?>
					</ul>	
				</div>
			
			<?php
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_local_item;
}
if ($__foreach_LoaiSanPham_0_saved_item) {
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_item;
}
?>

		   </div>
		</div>

	<!-- start content -->
	<div class="col-md-9 w_content">
	
		<!-- breadcrumb -->
		<?php if (isset($_smarty_tpl->tpl_vars['LoaiCon']->value)) {?>
	        <ol class="breadcrumb">
	          <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">Trang chủ</a></li>
	          <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai_san_pham_url'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai'];?>
</a></li>
	          <li class="active"><?php echo $_smarty_tpl->tpl_vars['LoaiCon']->value['ten_loai'];?>
</li>
	        </ol>
	    <?php } elseif (isset($_smarty_tpl->tpl_vars['LoaiCha']->value)) {?>
	         <ol class="breadcrumb">
	          <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">Trang chủ</a></li>
	          <li class="active"><?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai'];?>
</li>
	         </ol>
	    <?php } elseif (isset($_smarty_tpl->tpl_vars['ChuDe']->value)) {?>
	    	<ol class="breadcrumb">
	          <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">Trang chủ</a></li>
	          <li class="active"><?php echo $_smarty_tpl->tpl_vars['ChuDe']->value['ten_chu_de'];?>
</li>
	        </ol>
	    <?php } else { ?>
	          <div class="alert alert-warning">
	            <strong>Xin lỗi!</strong> Hiện tại chưa có sản phẩm.
	          </div>
	    <?php }?>
		<!-- end breadcrumb -->

		<!-- grids_of_4 -->
		<div class="grids_of_4">
		  
		  	<?php
$_from = $_smarty_tpl->tpl_vars['DSSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_SanPham_2_saved_item = isset($_smarty_tpl->tpl_vars['SanPham']) ? $_smarty_tpl->tpl_vars['SanPham'] : false;
$_smarty_tpl->tpl_vars['SanPham'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['SanPham']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['SanPham']->value) {
$_smarty_tpl->tpl_vars['SanPham']->_loop = true;
$__foreach_SanPham_2_saved_local_item = $_smarty_tpl->tpl_vars['SanPham'];
?>

			   	<div class="caption-style-2">
					<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['SanPham']->value['ten_san_pham_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['SanPham']->value['ma_san_pham'];?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/hinh_san_pham/<?php echo $_smarty_tpl->tpl_vars['SanPham']->value['hinh'];?>
" alt=""/></a>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h1><?php echo $_smarty_tpl->tpl_vars['SanPham']->value['ten_san_pham'];?>
</h1>
							<p><?php echo number_format($_smarty_tpl->tpl_vars['SanPham']->value['gia_ban']);?>
 đ</p>
						</div>
					</div>
				</div>
			
			<?php
$_smarty_tpl->tpl_vars['SanPham'] = $__foreach_SanPham_2_saved_local_item;
}
if ($__foreach_SanPham_2_saved_item) {
$_smarty_tpl->tpl_vars['SanPham'] = $__foreach_SanPham_2_saved_item;
}
?>

			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->
		
		<div><?php echo $_smarty_tpl->tpl_vars['PageLink']->value;?>
</div>
	</div>
	</div>
	<div class="clearfix"></div>
	
	<!-- end content -->

<?php
}
/* {/block 'content'} */
}
