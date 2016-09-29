<?php
/* Smarty version 3.1.29, created on 2016-09-29 20:19:03
  from "/home/lequan/IMAD/atlantic/views/templates/layouts/navTopAdmin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ed14c7eca855_05011302',
  'file_dependency' => 
  array (
    '6cccefd777252927402b0c7fc799e739b6f3cfcd' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/layouts/navTopAdmin.tpl',
      1 => 1475155140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ed14c7eca855_05011302 ($_smarty_tpl) {
?>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">ATLANTIC</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Hello! <?php echo $_SESSION['admin']['ten_nguoi_dung'];?>
 đẹp trai
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/quan-tri/dang-xuat.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul><?php }
}
