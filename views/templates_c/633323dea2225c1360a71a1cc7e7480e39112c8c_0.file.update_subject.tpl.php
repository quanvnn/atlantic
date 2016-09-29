<?php
/* Smarty version 3.1.29, created on 2016-09-29 14:28:20
  from "/home/lequan/IMAD/atlantic/views/templates/admin/update_subject.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ecc294556df1_47679992',
  'file_dependency' => 
  array (
    '633323dea2225c1360a71a1cc7e7480e39112c8c' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/update_subject.tpl',
      1 => 1475121971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ecc294556df1_47679992 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_172534562157ecc29454cf06_97043068',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/update_subject.tpl */
function block_172534562157ecc29454cf06_97043068($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">CẬP NHẬT CHỦ ĐỀ SÁCH</h3>
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
				  	<small class="text-muted">Chú ý: đảm bảo các ảnh theo đúng kích thước quy định.
				  	Ảnh chủ đề 1, 2: 556 x 387 px.
				  	Ảnh chủ đề 3, 6: 760 x 297 px.
				  	Ảnh chủ đề 4, 5,: 365 x 291 px.
				  	Ảnh chủ đề 7, 9: 370 x 272 px.
				  	Ảnh chủ đề 8: 350 x 269 px.
				  	</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Mô tả chủ đề <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['mo_ta'];?>
</label>
				  	<textarea name="mo_ta" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['data']->value['mo_ta'];?>
</textarea>
				  	<small class="text-muted">Ví dụ: REVIVE YOUR WARDROBE WITH CHIC KNITS</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnCapNhatChuDe" value="Cập Nhật">
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
