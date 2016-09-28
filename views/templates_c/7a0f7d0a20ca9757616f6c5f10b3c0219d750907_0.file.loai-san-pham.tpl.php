<?php
/* Smarty version 3.1.29, created on 2016-08-12 17:54:05
  from "F:\wamp\www\atlantic\views\templates\admin\loai-san-pham.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57adf11d6579f9_33384435',
  'file_dependency' => 
  array (
    '7a0f7d0a20ca9757616f6c5f10b3c0219d750907' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\loai-san-pham.tpl',
      1 => 1471016910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57adf11d6579f9_33384435 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_8157adf11d5e4f57_02520107',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_18257adf11d64c560_67521427',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/loai-san-pham.tpl */
function block_8157adf11d5e4f57_02520107($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ THỂ LOẠI SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/them-the-loai-sach.html"><button type="button" class="btn btn-default">THÊM THỂ LOẠI MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th width="70px">#</th>
	                                <th width="75px">id</th>
	                                <th>Thể loại cha</th>
	                                <th>Thể loại con</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiSanPham']->value;
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
					            	<?php $_smarty_tpl->tpl_vars['loaicha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['v']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'loaicha', 0);?>
					            	<?php $_smarty_tpl->tpl_vars['DSloaicon'] = new Smarty_Variable($_smarty_tpl->tpl_vars['v']->value[1], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'DSloaicon', 0);?>
					              <tr class="gradeU">
					                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai'];?>
</td>
					                <td>
					                	<table>
					                		<tr>
					                			<td width="300px"><?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ten_loai'];?>
</td>
					                			<td ><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/cap-nhat-the-loai-sach-<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai'];?>
">Edit</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/xoa-the-loai-sach-<?php echo $_smarty_tpl->tpl_vars['loaicha']->value['ma_loai'];?>
">Delete</a></td>
					                		</tr>
					                	</table>
					                <td>
					                	<?php
$_from = $_smarty_tpl->tpl_vars['DSloaicon']->value;
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
					                		<table>
					                			<tr>
						                			<td width="300px"><?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ten_loai'];?>
</td>
						                			<td><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/cap-nhat-the-loai-con-<?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ma_loai'];?>
">Edit</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/xoa-the-loai-sach-<?php echo $_smarty_tpl->tpl_vars['loaicon']->value['ma_loai'];?>
">Delete</a></td>
					                			</tr>
					                		</table>
					                	<?php
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_local_item;
}
if ($__foreach_loaicon_1_saved_item) {
$_smarty_tpl->tpl_vars['loaicon'] = $__foreach_loaicon_1_saved_item;
}
?>
					                </td>
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
/* {block 'script'}  file:admin/loai-san-pham.tpl */
function block_18257adf11d64c560_67521427($_smarty_tpl, $_blockParentStack) {
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
