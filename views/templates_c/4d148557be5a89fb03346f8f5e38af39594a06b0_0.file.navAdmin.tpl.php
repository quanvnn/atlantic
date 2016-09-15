<?php
/* Smarty version 3.1.29, created on 2016-08-30 13:14:04
  from "F:\wamp\www\atlantic\views\templates\layouts\navAdmin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c56a7c098a16_26789145',
  'file_dependency' => 
  array (
    '4d148557be5a89fb03346f8f5e38af39594a06b0' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\layouts\\navAdmin.tpl',
      1 => 1472555497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/navTopAdmin.tpl' => 1,
  ),
),false)) {
function content_57c56a7c098a16_26789145 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'navTopAdmin', array (
  0 => 'block_1807757c56a7c07a6e5_75660568',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri.html"><i class="fa fa-dashboard fa-fw"></i> Trang quản lý</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quản lý CSDL<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/san-pham.html">Dữ liệu sách</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/loai-san-pham.html">Thể loại sách</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/chu-de.html">Chủ đề sách</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/don-hang.html">Đơn hàng</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/yeu-cau-cua-khach-hang.html">Liên hệ</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/binh-luan.html">Bình luận</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav><?php }
/* {block 'navTopAdmin'}  file:layouts/navAdmin.tpl */
function block_1807757c56a7c07a6e5_75660568($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/navTopAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'navTopAdmin'} */
}
