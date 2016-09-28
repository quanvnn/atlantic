<?php
/* Smarty version 3.1.29, created on 2016-08-12 18:05:37
  from "F:\wamp\www\atlantic\views\templates\admin\them-chu-de-san-pham.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57adf3d1a53315_84227003',
  'file_dependency' => 
  array (
    '4ce7c0022dfb79f5a00220ab6402c15a4ff73ab9' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\them-chu-de-san-pham.tpl',
      1 => 1471017756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57adf3d1a53315_84227003 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_3020457adf3d1a19da0_48362246',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/them-chu-de-san-pham.tpl */
function block_3020457adf3d1a19da0_48362246($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">TẠO CHỦ ĐỀ SÁCH</h3>
        </div>
        <!-- /.col-lg-12 -->
    <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	  	
	  	<div class="col-sm-6">
				<!-- Thông báo -->
		  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value)) {?>
					<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value;?>
</div>
				<?php }?>
				<!-- ./thông báo -->
		  	<div class="col-sm-12">
		  		<fieldset class="form-group">
		  			<label>Chủ đề sách <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_chu_de'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_chu_de" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_chu_de'];?>
" placeholder="Ví dụ: Tứ Đại Kỳ Thư">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-12">
		  		<fieldset class="form-group">
		  			<label>Chủ đề Url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_chu_de_url'];?>
</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_chu_de_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ten_chu_de_url'];?>
" placeholder="Ví dụ: tu-dai-ky-thu">
		  		</fieldset>
		  	</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Ảnh đại diện cho chủ đề <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['hinh'];?>
</label>
				  	<input type="file" class="form-control" id="hinh" name="hinh">
				  	<small class="text-muted">Chú ý: hình 1,2: (556 x 387 px); hình 3: (760 x 297 px); hình 4,5,6,7: (370 x 300 px)</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Mô tả chủ đề <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['mo_ta'];?>
</label>
				  	<textarea name="mo_ta" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['data']->value['mo_ta'];?>
</textarea>
				  	<small class="text-muted">Ví dụ: "Đừng phấn đấu để thành công, hãy phấn đấu trở thành người có ích" - Albert Einstein</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnThemChuDeSanPham" value="Đồng ý">
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
