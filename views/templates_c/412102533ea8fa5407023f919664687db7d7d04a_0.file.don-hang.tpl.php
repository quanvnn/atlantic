<?php
/* Smarty version 3.1.29, created on 2016-08-30 04:53:31
  from "F:\wamp\www\atlantic\views\templates\admin\don-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c4f52b09ef76_36103254',
  'file_dependency' => 
  array (
    '412102533ea8fa5407023f919664687db7d7d04a' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\don-hang.tpl',
      1 => 1472525610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57c4f52b09ef76_36103254 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\wamp\\www\\atlantic\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2450057c4f52b044086_86974641',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_1839757c4f52b093e32_79363237',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/don-hang.tpl */
function block_2450057c4f52b044086_86974641($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ ĐƠN HÀNG</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th style="width:10%">#</th>
	                                <th style="width:12%">Số hóa đơn</th>
	                                <th style="width:28%">Tên khách hàng</th>
	                                <th style="width:20%">Trị giá</th>
	                                <th style="width:15%">Ngày</th>
	                                <th style="width:15%">Chi tiết hóa đơn</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSHoaDon']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_hoadon_0_saved_item = isset($_smarty_tpl->tpl_vars['hoadon']) ? $_smarty_tpl->tpl_vars['hoadon'] : false;
$_smarty_tpl->tpl_vars['hoadon'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['hoadon']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['hoadon']->value) {
$_smarty_tpl->tpl_vars['hoadon']->_loop = true;
$__foreach_hoadon_0_saved_local_item = $_smarty_tpl->tpl_vars['hoadon'];
?>
					              <tr class="gradeU" align="center">
					                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['hoadon']->value['so_hoa_don'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['hoadon']->value['ten_khach_hang'];?>
</td>
					                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['hoadon']->value['tri_gia']);?>
 đ</td>
					                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['hoadon']->value['ngay_hd'],"%e/%m/%Y");?>
</td>
					                <td><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/don-hang/chi-tiet-don-hang-<?php echo $_smarty_tpl->tpl_vars['hoadon']->value['so_hoa_don'];?>
">Chi tiết</a></td>
					              </tr>
					                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_smarty_tpl->tpl_vars['hoadon'] = $__foreach_hoadon_0_saved_local_item;
}
if ($__foreach_hoadon_0_saved_item) {
$_smarty_tpl->tpl_vars['hoadon'] = $__foreach_hoadon_0_saved_item;
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
/* {block 'script'}  file:admin/don-hang.tpl */
function block_1839757c4f52b093e32_79363237($_smarty_tpl, $_blockParentStack) {
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
