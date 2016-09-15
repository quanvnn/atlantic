<?php
/* Smarty version 3.1.29, created on 2016-08-16 04:54:22
  from "F:\wamp\www\atlantic\views\templates\layouts\navTopAdmin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b2805ea8b215_42386934',
  'file_dependency' => 
  array (
    'd7f6423e67292249948fad6e8f87ecc385a9ab73' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\layouts\\navTopAdmin.tpl',
      1 => 1471316057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b2805ea8b215_42386934 ($_smarty_tpl) {
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
                    Hello! <?php echo $_SESSION['nguoi_dung']['ten_nguoi_dung'];?>
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
