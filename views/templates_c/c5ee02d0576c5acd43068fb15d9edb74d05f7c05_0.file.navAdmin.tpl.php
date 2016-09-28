<?php
/* Smarty version 3.1.29, created on 2016-09-28 14:20:57
  from "/home/lequan/IMAD/atlantic/views/templates/layouts/navAdmin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57eb6f59a9f4a5_16995937',
  'file_dependency' => 
  array (
    'c5ee02d0576c5acd43068fb15d9edb74d05f7c05' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/layouts/navAdmin.tpl',
      1 => 1474966765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/navTopAdmin.tpl' => 1,
  ),
),false)) {
function content_57eb6f59a9f4a5_16995937 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'navTopAdmin', array (
  0 => 'block_55143766757eb6f59a9c961_83693721',
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
function block_55143766757eb6f59a9c961_83693721($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/navTopAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'navTopAdmin'} */
}
