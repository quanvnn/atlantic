<?php
/* Smarty version 3.1.29, created on 2016-08-14 10:49:15
  from "F:\wamp\www\atlantic\views\templates\admin\cap-nhat-loai-con.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b0308bc672c9_36180221',
  'file_dependency' => 
  array (
    'dc31cd0a54aa4ca6907dd2321b91918d496dd093' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\cap-nhat-loai-con.tpl',
      1 => 1471136361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57b0308bc672c9_36180221 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_26257b0308b8a47a6_18547251',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/cap-nhat-loai-con.tpl */
function block_26257b0308b8a47a6_18547251($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THAY ĐỔI THỂ LOẠI CON</h3>
        </div>  

  		<div class="col-sm-6">

  		<!-- Thông báo -->
  		
	  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value)) {?>
				<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
</div>
			<?php }?>

		<!-- ./thông báo -->

			<div class="col-sm-10">
	          <fieldset class="form-group">
	            <label>Thể loại cha</label>
	              <select name="ma_loai" class="form-control">
	                <?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
	                  <?php $_smarty_tpl->tpl_vars['loaicha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'loaicha', 0);?>
	                  <?php if ($_smarty_tpl->tpl_vars['data']->value['ma_loai_cha'] == $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai']) {?>
	                    <option value="<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai'];?>
</option>
	                  <?php } else { ?>
	                    <option value="<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai'];?>
"><?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai'];?>
</option>
	                  <?php }?>
	                <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
?>}
	              </select>
	          </fieldset>
	        </div>

		  	<div class="col-sm-10">
		  		<fieldset class="form-group">
		  			<label>Thể loại con <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_loai'];?>
" placeholder="Ví dụ: Kinh Tế Học">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-10">
		  		<fieldset class="form-group">
		  			<label>Tên Url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai_san_pham_url'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_loai_san_pham_url'];?>
" placeholder="Ví dụ: kinh-te-hoc">
		  		</fieldset>
		  	</div>

			<div class="col-sm-10">
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
