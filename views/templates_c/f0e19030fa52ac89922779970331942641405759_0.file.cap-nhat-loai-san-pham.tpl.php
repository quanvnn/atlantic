<?php
/* Smarty version 3.1.29, created on 2016-08-12 17:56:19
  from "F:\wamp\www\atlantic\views\templates\admin\cap-nhat-loai-san-pham.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57adf1a3bc6548_55364593',
  'file_dependency' => 
  array (
    'f0e19030fa52ac89922779970331942641405759' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\cap-nhat-loai-san-pham.tpl',
      1 => 1471017373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57adf1a3bc6548_55364593 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_588857adf1a3b9db19_48426156',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/cap-nhat-loai-san-pham.tpl */
function block_588857adf1a3b9db19_48426156($_smarty_tpl, $_blockParentStack) {
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
