<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:30:23
  from "/home/lequan/IMAD/atlantic/views/templates/admin/add_category.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec98df8d5234_59055625',
  'file_dependency' => 
  array (
    'a3b5f331b4e7aaae327ad679da7f64a77576ac42' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/add_category.tpl',
      1 => 1475123389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ec98df8d5234_59055625 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_183090772357ec98df8c7b81_30839895',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_38777600157ec98df8d4485_99371356',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/add_category.tpl */
function block_183090772357ec98df8c7b81_30839895($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
    
    <div class="row">
	  	
	  	<div class="col-sm-6">
	  		
		  	<div class="col-lg-12">
	            <h3 class="page-header">THÊM THỂ LOẠI CHA</h3>
	        </div>
	        <!-- /.col-lg-12 -->

			<!-- Thông báo -->
			<div class="col-lg-12">
		  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value['loaicha'])) {?>
					<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value['loaicha'];?>
</div>
				<?php }?>
			</div>
			<!-- ./thông báo -->
			
			<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="col-sm-12">
		  	
			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Thể loại cha <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai'];?>
</label>
			  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="<?php echo $_smarty_tpl->tpl_vars['data1']->value['ten_loai'];?>
" placeholder="Ví dụ: Khởi nghiệp">
			  		</fieldset>
			  	</div>

			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Tên Url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai_san_pham_url'];?>
</label>
			  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="<?php echo $_smarty_tpl->tpl_vars['data1']->value['ten_loai_san_pham_url'];?>
" placeholder="Ví dụ: khoi-nghiep">
			  		</fieldset>
			  	</div>

				<div class="col-sm-10">
					<fieldset class="form-group">
					  	<input type="submit" class="btn btn-primary" name="btnThemLoaiCha" value="Đồng ý">
					</fieldset>
				</div>
			
			</div>
			</form>
			
		</div><!-- ./class="col-sm-6"-->
        
		  	
		<div class="col-sm-6">
		  	
		  	<div class="col-lg-12">
		        <h3 class="page-header">THÊM THỂ LOẠI CON</h3>
		   	</div><!-- /.col-lg-12 -->
					
			<!-- Thông báo -->
			<div class="col-lg-12">
		  		<?php if (!empty($_smarty_tpl->tpl_vars['alert']->value['loaicon'])) {?>
					<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['alert']->value['loaicon'];?>
</div>
				<?php }?>
			</div>
			<!-- ./thông báo -->

			<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="col-sm-12">

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
		                  <?php if ($_smarty_tpl->tpl_vars['data2']->value['ma_loai_cha'] == $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai']) {?>
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
			  			<input type="text" class="form-control" id="ten_san_pham2" name="ten_loai" value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['ten_loai'];?>
" placeholder="Ví dụ: kinh tế học">
			  		</fieldset>
			  	</div>

			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Tên Url <?php echo $_smarty_tpl->tpl_vars['mangErr']->value['ten_loai_san_pham_url'];?>
</label>
			  			<input type="text" class="form-control" id="ten_san_pham_url2" name="ten_loai_san_pham_url" value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['ten_loai_san_pham_url'];?>
" placeholder="Ví dụ: kinh-te-hoc">
			  		</fieldset>
			  	</div>

				<div class="col-sm-10">
					<fieldset class="form-group">
					  	<input type="submit" class="btn btn-primary" name="btnThemLoaiCon" value="Đồng ý">
					</fieldset>
				</div>
				
			</div>
			</form>
		
		</div><!-- ./class="col-sm-6"-->
	</div>
</div><!-- /#page-wrapper -->

<?php
}
/* {/block 'content'} */
/* {block 'script'}  file:admin/add_category.tpl */
function block_38777600157ec98df8d4485_99371356($_smarty_tpl, $_blockParentStack) {
?>

<?php echo '<script'; ?>
>
        $(document).ready(function(){
            $("#ten_san_pham2").blur(function(){
                var tensp=$("#ten_san_pham2").val();
                if(tensp!="")
                  $("#ten_san_pham_url2").val(bodau(tensp));
            });
        });
        
        function bodau(str){
          str= str.toLowerCase();
          str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
          str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
          str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
          str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
          str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
          str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
          str= str.replace(/đ/g,"d");
          str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
          str= str.replace(/-+-/g,"-");
          str= str.replace(/^\-+|\-+$/g,"");
          return str;
        }
    <?php echo '</script'; ?>
>
<?php
}
/* {/block 'script'} */
}
