<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:41:19
  from "/home/lequan/IMAD/atlantic/views/templates/front/shopping_cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec9b6f687b44_84469334',
  'file_dependency' => 
  array (
    'c204c9240acefbf7bd549dcaf8cfa4a646f0abdd' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/front/shopping_cart.tpl',
      1 => 1475124032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57ec9b6f687b44_84469334 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_148816879457ec9b6f65ca91_20964837',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:front/shopping_cart.tpl */
function block_148816879457ec9b6f65ca91_20964837($_smarty_tpl, $_blockParentStack) {
?>


<div class="container">
	<div class="check">

	<?php if (isset($_smarty_tpl->tpl_vars['ttgh']->value)) {?>
	<form method="POST">

		<div class="col-md-9 cart-items">
		 	
			 	<h1>GIỎ HÀNG CỦA BẠN</h1>

				<table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>MÃ SÁCH</td>
                            <td>TỰA SÁCH</td>
                            <td>ĐƠN GIÁ</td>
                            <td>SỐ LƯỢNG</td>
                            <td>THÀNH TIỀN</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['ttgh']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tt_0_saved_item = isset($_smarty_tpl->tpl_vars['tt']) ? $_smarty_tpl->tpl_vars['tt'] : false;
$__foreach_tt_0_saved_key = isset($_smarty_tpl->tpl_vars['msp']) ? $_smarty_tpl->tpl_vars['msp'] : false;
$_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['msp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['tt']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['msp']->value => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
$__foreach_tt_0_saved_local_item = $_smarty_tpl->tpl_vars['tt'];
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['msp']->value;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['tt']->value[2];?>
</td>
                                <td><?php echo number_format($_smarty_tpl->tpl_vars['tt']->value[0]);?>
 đ</td>
                                <td>
                                    <input type="number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['tt']->value[1];?>
" style="text-align:center; width:70px" name="sl_<?php echo $_smarty_tpl->tpl_vars['msp']->value;?>
" />
                                </td>
                                <td><?php echo number_format($_smarty_tpl->tpl_vars['tt']->value[0]*$_smarty_tpl->tpl_vars['tt']->value[1]);?>
 đ</td>
                            </tr>
                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                        <?php
$_smarty_tpl->tpl_vars['tt'] = $__foreach_tt_0_saved_local_item;
}
if ($__foreach_tt_0_saved_item) {
$_smarty_tpl->tpl_vars['tt'] = $__foreach_tt_0_saved_item;
}
if ($__foreach_tt_0_saved_key) {
$_smarty_tpl->tpl_vars['msp'] = $__foreach_tt_0_saved_key;
}
?>
                        <tr>
                            <td colspan="6" align="center">
                                <input type="submit" value="CẬP NHẬT" name="btnCapNhat" class="btn btn-default" />
                                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/huy-gio-hang" class="btn btn-default">HỦY GIỎ HÀNG</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
			
		 </div>

		 <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>CHI TIẾT ĐƠN HÀNG</h3>
				 <span>Tổng tiền</span>
				 <span class="total1"><?php echo number_format($_SESSION['TongSoTien']);?>
 đ</span>
				 <span>Giảm giá</span>
				 <span class="total1">---</span>
				 <span>Phí Vận Chuyển</span>
				 <span class="total1">
				 	<?php if ($_SESSION['TongSoTien'] < 100000) {?>
				 		<?php echo number_format(10000);?>
 đ
				 		<?php $_smarty_tpl->tpl_vars['phivanchuyen'] = new Smarty_Variable(10000, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'phivanchuyen', 0);?>
				 	<?php } else { ?>
				 		Miễn Phí
				 		<?php $_smarty_tpl->tpl_vars['phivanchuyen'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'phivanchuyen', 0);?>
				 	<?php }?>
				 </span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>Tổng tiền</h4></li>	
			   <li class="last_price"><span><?php echo number_format($_SESSION['TongSoTien']+$_smarty_tpl->tpl_vars['phivanchuyen']->value);?>
 đ</span></li>
			   <div class="clearfix"> </div>
			 </ul>

			 <a class="order" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/khach-hang/dat-hang">Tiến Hàng Đặt Hàng</a>
		</div>
		
			<div class="clearfix"> </div>

	</form>
	
	<?php } else { ?>
		<p align="center">CHƯA CÓ QUYỂN SÁCH NÀO TRONG GIỎ HÀNG CỦA BẠN.</p>
    <?php }?>
    </div>

</div>

<?php
}
/* {/block 'content'} */
}