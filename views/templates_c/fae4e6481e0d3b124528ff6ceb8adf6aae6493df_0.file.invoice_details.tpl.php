<?php
/* Smarty version 3.1.29, created on 2016-09-29 14:30:18
  from "/home/lequan/IMAD/atlantic/views/templates/admin/invoice_details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ecc30a975846_84925939',
  'file_dependency' => 
  array (
    'fae4e6481e0d3b124528ff6ceb8adf6aae6493df' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/invoice_details.tpl',
      1 => 1475122202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ecc30a975846_84925939 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lequan/IMAD/atlantic/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_150196541857ecc30a95f099_24359596',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_17773977457ecc30a972a74_60814467',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/invoice_details.tpl */
function block_150196541857ecc30a95f099_24359596($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">CHI TIẾT ĐƠN HÀNG</h3>
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
	                    <table class="table ">   
					        <tbody>
						            <tr>          
						              <td>Tên khách hàng: <?php echo $_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['ten_khach_hang'];?>
</td>
						              <td>Email: <?php echo $_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['email'];?>
</td>
						            </tr>
						            <tr>
						              <td>Tên người nhận: <?php echo $_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['ten_nguoi_nhan'];?>
</td>
						              <td>Điện thoại: <?php echo $_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['dien_thoai'];?>
</td>
						            </tr>
						            <tr><td colspan="2">Địa chỉ: <?php echo $_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['dia_chi'];?>
</td></tr>
					        </tbody>
					    </table>
					    <table class="table table-striped">      
					        <tbody>
					            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>    
					            <tr align="center"><td>#</td><td>MÃ SÁCH</td><td>TỰA SÁCH</td><td>SỐ LƯỢNG</td><td>ĐƠN GIÁ</td><td>THÀNH TIỀN</td></tr>
					            
					            <?php
$_from = $_smarty_tpl->tpl_vars['ChiTietDonHang']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_donhang_0_saved_item = isset($_smarty_tpl->tpl_vars['donhang']) ? $_smarty_tpl->tpl_vars['donhang'] : false;
$_smarty_tpl->tpl_vars['donhang'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['donhang']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['donhang']->value) {
$_smarty_tpl->tpl_vars['donhang']->_loop = true;
$__foreach_donhang_0_saved_local_item = $_smarty_tpl->tpl_vars['donhang'];
?>

					                <tr align="center">
					                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
					                    <td><?php echo $_smarty_tpl->tpl_vars['donhang']->value['ma_san_pham'];?>
</td>
					                    <td align="left"><?php echo $_smarty_tpl->tpl_vars['donhang']->value['ten_san_pham'];?>
</td>
					                    <td><?php echo $_smarty_tpl->tpl_vars['donhang']->value['so_luong'];?>
</td>
					                    <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['donhang']->value['don_gia']);?>
 đ</td>
					                    <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['donhang']->value['don_gia']*$_smarty_tpl->tpl_vars['donhang']->value['so_luong']);?>
 đ</td>
					                </tr>
					                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>        
					            
					            <?php
$_smarty_tpl->tpl_vars['donhang'] = $__foreach_donhang_0_saved_local_item;
}
if ($__foreach_donhang_0_saved_item) {
$_smarty_tpl->tpl_vars['donhang'] = $__foreach_donhang_0_saved_item;
}
?>

					            <tr>
					                <td colspan="2">Ngày: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['donhang']->value['ngay_hd'],"%e/%m/%Y");?>
</td>
					                <td colspan="3" align="right">TRỊ GIÁ</td>
					                <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['ChiTietDonHang']->value[0]['tri_gia']);?>
 đ</td>
					            </tr>
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
/* {block 'script'}  file:admin/invoice_details.tpl */
function block_17773977457ecc30a972a74_60814467($_smarty_tpl, $_blockParentStack) {
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
