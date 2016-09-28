<?php
/* Smarty version 3.1.29, created on 2016-09-28 11:24:59
  from "/home/lequan/IMAD/atlantic/views/templates/thong-tin-don-hang.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57eb461bba04b6_01689658',
  'file_dependency' => 
  array (
    '38fce97e78141dcdb685680d102a91f46b14cee2' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/thong-tin-don-hang.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57eb461bba04b6_01689658 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_51915689257eb461bb91862_31788487',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:thong-tin-don-hang.tpl */
function block_51915689257eb461bb91862_31788487($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
  <!-- start registration -->
  <div class="registration">
    
        <table class="table">   
            <tbody>
                <tr>
                    <td align="center">
                      CÔNG TY ATLANTIC
                    </td>
                    <td align="center" style="font-size:20px" valign="center">Đơn Hàng Của <?php echo $_smarty_tpl->tpl_vars['DonDatHang']->value[0]['ten_khach_hang'];?>
</td>
                </tr>
                <tr>
                    <td width="30%">Tên người nhận: <?php echo $_smarty_tpl->tpl_vars['DonDatHang']->value[0]['ten_nguoi_nhan'];?>
</td>
                    <td width="70%">Địa chỉ: <?php echo $_smarty_tpl->tpl_vars['DonDatHang']->value[0]['dia_chi'];?>
</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-striped">      
            <tbody>
              <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
              <tr align="center"><td>#</td><td>MÃ SÁCH</td><td>TỰA SÁCH</td><td>SỐ LƯỢNG</td><td>ĐƠN GIÁ</td><td>THÀNH TIỀN</td></tr>
              
              <?php
$_from = $_smarty_tpl->tpl_vars['DonDatHang']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>

                  <tr align="center">
                      <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ma_san_pham'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ten_san_pham'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['item']->value['so_luong'];?>
</td>
                      <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['don_gia']);?>
 đ</td>
                      <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['don_gia']*$_smarty_tpl->tpl_vars['item']->value['so_luong']);?>
 đ</td>
                  </tr>
                  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>

              <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
              
              <tr>
                  <td>Ngày:</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['DonDatHang']->value[0]['ngay_hd'];?>
</td>
                  <td colspan="3" align="right">TRỊ GIÁ HÓA ĐƠN</td>
                  <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['DonDatHang']->value[0]['tri_gia']);?>
 đ</td>
              </tr>
            </tbody>
        </table>

  </div>
  <div class="clearfix"></div>
</div>
</div>
<?php
}
/* {/block 'content'} */
}
