<?php
/* Smarty version 3.1.29, created on 2016-09-29 21:23:59
  from "/home/lequan/IMAD/atlantic/views/templates/admin/comment.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ed23ffb6a705_58622925',
  'file_dependency' => 
  array (
    '30d3d936dd8d361d89e0e141b696cb7ffc9e758b' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/comment.tpl',
      1 => 1475035293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ed23ffb6a705_58622925 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lequan/IMAD/atlantic/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_52401258357ed23ffaf2032_41741743',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_147244998257ed23ffb682c3_46551604',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/comment.tpl */
function block_52401258357ed23ffaf2032_41741743($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ YÊU CẦU CỦA KHÁCH HÀNG</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	    <?php if (isset($_smarty_tpl->tpl_vars['alert']->value)) {
echo $_smarty_tpl->tpl_vars['alert']->value;
}?>
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th style="width:7%">#</th>
	                                <th>Tên khách hàng</th>
	                                <th>Đánh giá sách</th>
	                                <th>Tiêu đề</th>
	                                <th>Nội dung</th>
	                                <th>Ngày liên hệ</th>
	                                <th>Xóa bình luận</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSBinhLuanAdmin']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_binhluan_0_saved_item = isset($_smarty_tpl->tpl_vars['binhluan']) ? $_smarty_tpl->tpl_vars['binhluan'] : false;
$_smarty_tpl->tpl_vars['binhluan'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['binhluan']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['binhluan']->value) {
$_smarty_tpl->tpl_vars['binhluan']->_loop = true;
$__foreach_binhluan_0_saved_local_item = $_smarty_tpl->tpl_vars['binhluan'];
?>

					              <tr class="gradeU">
					                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['binhluan']->value['ten_khach_hang'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['binhluan']->value['ten_san_pham'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['binhluan']->value['tieu_de'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['binhluan']->value['noi_dung'];?>
</td>
					                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['binhluan']->value['date'],"%e/%m/%Y");?>
</td>
					                <td><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/binh-luan/xoa/<?php echo $_smarty_tpl->tpl_vars['binhluan']->value['id'];?>
">xóa</a></td>
					              </tr>
					                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            
					            <?php
$_smarty_tpl->tpl_vars['binhluan'] = $__foreach_binhluan_0_saved_local_item;
}
if ($__foreach_binhluan_0_saved_item) {
$_smarty_tpl->tpl_vars['binhluan'] = $__foreach_binhluan_0_saved_item;
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
/* {block 'script'}  file:admin/comment.tpl */
function block_147244998257ed23ffb682c3_46551604($_smarty_tpl, $_blockParentStack) {
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