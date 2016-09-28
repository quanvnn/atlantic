<?php
/* Smarty version 3.1.29, created on 2016-09-28 14:24:37
  from "/home/lequan/IMAD/atlantic/views/templates/admin/cap-nhat-loai-san-pham.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57eb7035bda432_25723926',
  'file_dependency' => 
  array (
    '4ac8f6b617787f6d81c8a6ce0b957f96968945dc' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/cap-nhat-loai-san-pham.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57eb7035bda432_25723926 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_3479890957eb7035bd13d6_89957276',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/cap-nhat-loai-san-pham.tpl */
function block_3479890957eb7035bd13d6_89957276($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THAY ĐỔI THỂ LOẠI SÁCH</h3>
        </div>  

  		<div class="col-sm-8">

  		<!-- Thông báo -->
  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value)) {?>
			<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
</div>
		<?php }?>
		<!-- ./thông báo -->

		  	<div class="col-sm-7">
		  		<fieldset class="form-group">
		  			<label>Thể loại sách <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_loai'];?>
" placeholder="Ví dụ: Khởi nghiệp">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-7">
		  		<fieldset class="form-group">
		  			<label>Tên Url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai_san_pham_url'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_loai_san_pham_url'];?>
" placeholder="Ví dụ: khoi-nghiep">
		  		</fieldset>
		  	</div>

			<div class="col-sm-7">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnCapNhatLoaiSanPham" value="Cập Nhật">
				</fieldset>
			</div>
		</div>
	</div>

	</form>
</div>

<?php
}
/* {/block 'content'} */
}
