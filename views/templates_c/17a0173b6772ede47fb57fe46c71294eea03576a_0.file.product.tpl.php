<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:24:36
  from "/home/lequan/IMAD/atlantic/views/templates/admin/product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec9784a06c79_32068230',
  'file_dependency' => 
  array (
    '17a0173b6772ede47fb57fe46c71294eea03576a' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/product.tpl',
      1 => 1475123058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ec9784a06c79_32068230 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_96156991057ec97849f1ec1_88621521',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_148451574757ec9784a05152_86339840',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/product.tpl */
function block_96156991057ec97849f1ec1_88621521($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/them-sach.html"><button type="button" class="btn btn-default">THÊM SÁCH MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th style="width:70px">#</th>
	                                <th style="width:75px">id</th>
	                                <th>Hình</th>
	                                <th>Tên sách</th>
	                                <th style="width:150px">Giá bìa</th>
	                                <th style="width:150px">Giá bán</th>
	                                <th style="width:150px">Edit | Delete</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
					              <tr class="gradeU">
					                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ma_san_pham'];?>
</td>
					                <td><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/hinh_san_pham/<?php echo $_smarty_tpl->tpl_vars['v']->value['hinh'];?>
" style="width:75px"></td>
					                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ten_san_pham'];?>
</td>
					                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['gia_bia']);?>
 đ</td>
					                <td><?php echo number_format($_smarty_tpl->tpl_vars['v']->value['gia_ban']);?>
 đ</td>
					                <td><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/cap-nhat-sach-<?php echo $_smarty_tpl->tpl_vars['v']->value['ma_san_pham'];?>
">Edit</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/xoa-sach-<?php echo $_smarty_tpl->tpl_vars['v']->value['ma_san_pham'];?>
">Delete</a></td>
					              </tr>
					                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
	                        </tbody>
	                    </table>
	                </div>
	                <!-- /.table-responsive -->
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>

<?php
}
/* {/block 'content'} */
/* {block 'script'}  file:admin/product.tpl */
function block_148451574757ec9784a05152_86339840($_smarty_tpl, $_blockParentStack) {
?>


	<!-- DataTables JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    <?php echo '</script'; ?>
>

<?php
}
/* {/block 'script'} */
}
