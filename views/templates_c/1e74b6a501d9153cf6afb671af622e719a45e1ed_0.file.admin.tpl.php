<?php
/* Smarty version 3.1.29, created on 2016-09-28 14:20:57
  from "/home/lequan/IMAD/atlantic/views/templates/admin/admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57eb6f59a86451_55531004',
  'file_dependency' => 
  array (
    '1e74b6a501d9153cf6afb671af622e719a45e1ed' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/admin/admin.tpl',
      1 => 1475035279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layoutAdmin.tpl' => 1,
  ),
),false)) {
function content_57eb6f59a86451_55531004 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_189912228057eb6f59a84d41_40360287',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layoutAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:admin/admin.tpl */
function block_189912228057eb6f59a84d41_40360287($_smarty_tpl, $_blockParentStack) {
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Lê Quân</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div><!-- /#page-wrapper -->

<?php
}
/* {/block 'content'} */
}
