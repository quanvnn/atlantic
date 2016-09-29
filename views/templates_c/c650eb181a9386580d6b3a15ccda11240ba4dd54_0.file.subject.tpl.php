<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:11:36
  from "/home/lequan/IMAD/atlantic/views/templates/admin/subject.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ec947847ea56_50395587',
  'file_dependency' => 
  array (
    'c650eb181a9386580d6b3a15ccda11240ba4dd54' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/subject.tpl',
      1 => 1475122229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57ec947847ea56_50395587 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_109975742457ec9478474811_23450325',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/subject.tpl */
function block_109975742457ec9478474811_23450325($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ CHỦ ĐỀ SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/them-chu-de-sach.html"><button type="button" class="btn btn-default">TẠO CHỦ ĐỀ MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th width="75px">#</th>
	                                <th width="75px">ID</th>
	                                <th width="200px">ẢNH CHỦ ĐỀ</th>
	                                <th width="">CHỦ ĐỀ SÁCH</th>
	                                <th width="100px">CẬP NHẬT</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
					            <?php
$_from = $_smarty_tpl->tpl_vars['DSChuDe']->value;
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
					                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ma_chu_de'];?>
</td>
					                <td><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['v']->value['hinh'];?>
" width="200px"></td>
					                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ten_chu_de'];?>
</td>
					                <td><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/cap-nhat-chu-de-<?php echo $_smarty_tpl->tpl_vars['v']->value['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['ma_chu_de'];?>
">Cập Nhật</a></td>
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
}
