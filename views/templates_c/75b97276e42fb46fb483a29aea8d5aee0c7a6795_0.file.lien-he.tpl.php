<?php
/* Smarty version 3.1.29, created on 2016-09-01 05:25:08
  from "F:\wamp\www\atlantic\views\templates\admin\lien-he.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c79f9424dea0_83858893',
  'file_dependency' => 
  array (
    '75b97276e42fb46fb483a29aea8d5aee0c7a6795' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\admin\\lien-he.tpl',
      1 => 1472700011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57c79f9424dea0_83858893 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\wamp\\www\\atlantic\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_1412557c79f941f8fc1_32195490',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_2569857c79f94241d05_97756542',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/lien-he.tpl */
function block_1412557c79f941f8fc1_32195490($_smarty_tpl, $_blockParentStack) {
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
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th>#</th>
	                                <th>ID</th>
	                                <th>Tiêu đề</th>
	                                <th>Nội dung</th>
	                                <th>Email</th>
	                                <th>Ngày liên hệ</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSYeuCauKhachHang']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_lienhe_0_saved_item = isset($_smarty_tpl->tpl_vars['lienhe']) ? $_smarty_tpl->tpl_vars['lienhe'] : false;
$_smarty_tpl->tpl_vars['lienhe'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['lienhe']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['lienhe']->value) {
$_smarty_tpl->tpl_vars['lienhe']->_loop = true;
$__foreach_lienhe_0_saved_local_item = $_smarty_tpl->tpl_vars['lienhe'];
?>

					              <tr class="gradeU">
					                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['lienhe']->value['lien_he_id'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['lienhe']->value['tieu_de'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['lienhe']->value['noi_dung'];?>
</td>
					                <td><?php echo $_smarty_tpl->tpl_vars['lienhe']->value['email'];?>
</td>
					                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lienhe']->value['ngay_lien_he'],"%e/%m/%Y");?>
</td>
					              </tr>
					                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            
					            <?php
$_smarty_tpl->tpl_vars['lienhe'] = $__foreach_lienhe_0_saved_local_item;
}
if ($__foreach_lienhe_0_saved_item) {
$_smarty_tpl->tpl_vars['lienhe'] = $__foreach_lienhe_0_saved_item;
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
/* {block 'script'}  file:admin/lien-he.tpl */
function block_2569857c79f94241d05_97756542($_smarty_tpl, $_blockParentStack) {
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
