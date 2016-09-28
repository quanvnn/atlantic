<?php
/* Smarty version 3.1.29, created on 2016-09-28 14:22:18
  from "/home/lequan/IMAD/atlantic/views/templates/admin/them-san-pham.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57eb6faadbc376_34702245',
  'file_dependency' => 
  array (
    '58f70c6bacb1879722b8102ecc5d1e64a05bed43' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/them-san-pham.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57eb6faadbc376_34702245 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_31627531057eb6faada6c14_17468315',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/them-san-pham.tpl */
function block_31627531057eb6faada6c14_17468315($_smarty_tpl, $_blockParentStack) {
?>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>

<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THÊM SÁCH MỚI</h3>
        </div>
        <!-- /.col-lg-12 -->
    <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	  	
	  	<div class="col-sm-8">
				<!-- Thông báo -->
		  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value)) {?>
					<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
</div>
				<?php }?>
				<!-- ./thông báo -->
		  	<div class="col-sm-5">
		  		<fieldset class="form-group">
		  			<label>Tựa sách <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_san_pham'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_san_pham'];?>
" placeholder="Ví dụ: Think and grow rich">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
		  		<fieldset class="form-group">
		  			<label>Tên url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_san_pham_url'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_san_pham_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_san_pham_url'];?>
" placeholder="Ví dụ: think-and-grow-rich">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-5">
			 	<fieldset class="form-group">
			 		<label>Giá bìa <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['gia_bia'];?>
</label>
		  			<input type="number" class="form-control" id="don_gia" name="gia_bia" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gia_bia'];?>
" placeholder="Ví dụ: 2,000">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
					<label>Giá bán <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['gia_ban'];?>
</label>
		  			<input type="number" class="form-control" id="don_gia_khuyen_mai" name="gia_ban" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gia_ban'];?>
" placeholder="Ví dụ: 1,000">
		  		</fieldset>
			</div>

		  	<div class="col-sm-5">
				<fieldset class="form-group">
					<label>Thể loại sách</label>
				  	<select name="ma_loai" class="form-control">
			      	<?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loai_0_saved_item = isset($_smarty_tpl->tpl_vars['loai']) ? $_smarty_tpl->tpl_vars['loai'] : false;
$_smarty_tpl->tpl_vars['loai'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['loai']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['loai']->value) {
$_smarty_tpl->tpl_vars['loai']->_loop = true;
$__foreach_loai_0_saved_local_item = $_smarty_tpl->tpl_vars['loai'];
?>
			      		<?php $_smarty_tpl->tpl_vars['loaicha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['loai']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'loaicha', 0);?>
			      		<?php $_smarty_tpl->tpl_vars['DSLoaiCon'] = new Smarty_Variable($_smarty_tpl->tpl_vars['loai']->value[1], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'DSLoaiCon', 0);?>	      	
						  <optgroup label="<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai'];?>
">
						  	<?php if ($_smarty_tpl->tpl_vars['DSLoaiCon']->value) {?>
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
						    		<?php if ($_smarty_tpl->tpl_vars['data']->value['ma_loai'] == $_smarty_tpl->tpl_vars['loaicon']->value['ma_loai']) {?>
						    			<option value="<?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ma_loai'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ten_loai'];?>
</option>
						    		<?php } else { ?>
						    			<option value="<?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ma_loai'];?>
"><?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ten_loai'];?>
</option>
						    		<?php }?>
						    	<?php
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_local_item;
}
if ($__foreach_loaicon_1_saved_item) {
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_item;
}
?>				    	
						    <?php }?>
						  </optgroup>			  
					 <?php
$_smarty_tpl->tpl_vars['loai'] = $__foreach_loai_0_saved_local_item;
}
if ($__foreach_loai_0_saved_item) {
$_smarty_tpl->tpl_vars['loai'] = $__foreach_loai_0_saved_item;
}
?>}
					</select>
				</fieldset>
			</div>

			<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
					<label>Ảnh bìa sách <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['hinh'];?>
</label> <small class="text-muted">(Phải đảm bảo kích thước 200x300 px)</small>
				  	<input type="file" class="form-control" id="hinh" name="hinh">
				  	
				</fieldset>
			</div>

			<div class="col-sm-5">
			 	<fieldset class="form-group">
			 		<label>Tác giả</label>
		  			<input type="text" class="form-control">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
			 		<label>Chủ đề</label>
		  			<select class="form-control" name="chu_de_id">
		  				<option value="0">Mặc định</option>
		  				<?php if ($_smarty_tpl->tpl_vars['DanhSachChuDe']->value) {?>
						    	<?php
$_from = $_smarty_tpl->tpl_vars['DanhSachChuDe']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_chude_2_saved_item = isset($_smarty_tpl->tpl_vars['chude']) ? $_smarty_tpl->tpl_vars['chude'] : false;
$_smarty_tpl->tpl_vars['chude'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['chude']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['chude']->value) {
$_smarty_tpl->tpl_vars['chude']->_loop = true;
$__foreach_chude_2_saved_local_item = $_smarty_tpl->tpl_vars['chude'];
?>
						    		<?php if ($_smarty_tpl->tpl_vars['data']->value['chu_de_id'] == $_smarty_tpl->tpl_vars['chude']->value['ma_chu_de']) {?>
						    			<option value="<?php echo $_smarty_tpl->tpl_vars['chude']->value['ma_chu_de'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['chude']->value['ten_chu_de'];?>
</option>
						    		<?php } else { ?>
						    			<option value="<?php echo $_smarty_tpl->tpl_vars['chude']->value['ma_chu_de'];?>
"><?php echo $_smarty_tpl->tpl_vars['chude']->value['ten_chu_de'];?>
</option>
						    		<?php }?>
						    	<?php
$_smarty_tpl->tpl_vars['chude'] = $__foreach_chude_2_saved_local_item;
}
if ($__foreach_chude_2_saved_item) {
$_smarty_tpl->tpl_vars['chude'] = $__foreach_chude_2_saved_item;
}
?>				    	
						    <?php }?>
		  			</select>
		  		</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Mô tả nội dung quyển sách <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['mo_ta'];?>
</label>
				  	<textarea name="mo_ta" class="ckeditor" rows="5"><?php echo $_smarty_tpl->tpl_vars['data']->value['mo_ta'];?>
</textarea>
				</fieldset>
			</div>

			<div class="col-sm-2">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnThemSanPham" value="Đồng ý">
				</fieldset>
			</div>
			
		</div>

	</form>
	
    </div>
</div><!-- /#page-wrapper -->

<?php
}
/* {/block 'content'} */
}
