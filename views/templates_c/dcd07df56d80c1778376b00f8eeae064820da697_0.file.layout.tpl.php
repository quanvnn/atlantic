<?php
/* Smarty version 3.1.29, created on 2016-08-31 19:04:44
  from "F:\wamp\www\atlantic\views\templates\layouts\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c70e2c1cc3c5_97652589',
  'file_dependency' => 
  array (
    'dcd07df56d80c1778376b00f8eeae064820da697' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\layouts\\layout.tpl',
      1 => 1472662532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/header.tpl' => 1,
    'file:layouts/footer.tpl' => 1,
  ),
),false)) {
function content_57c70e2c1cc3c5_97652589 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>ATLANTIC</title>
	<link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
	<!-- start menu -->
	<link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	
</head>

<body>
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'header', array (
  0 => 'block_2881157c70e2c19ae88_41658223',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_3005657c70e2c1a8636_96084140',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_2393757c70e2c1ae1c6_50067606',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


	<!-- jQuery (necessary JavaScript plugins) -->
	<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/js/megamenu.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		$(document).ready(function(){
			$(".megamenu").megamenu();
		});
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/js/menu_jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/js/simpleCart.min.js"> <?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		$( document ).ready(function() {
		  $('#s').keyup(function(){
		   var valThis = $('#s').val().toLowerCase();
		    $('.countryList>li').each(function(){
		     var text = $(this).text().toLowerCase();
		        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();
		   });
		  });
		});
	<?php echo '</script'; ?>
>
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_2000657c70e2c1c53c7_36221079',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


</body>
</html><?php }
/* {block 'header'}  file:layouts/layout.tpl */
function block_2881157c70e2c19ae88_41658223($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'header'} */
/* {block 'content'}  file:layouts/layout.tpl */
function block_3005657c70e2c1a8636_96084140($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
/* {block 'footer'}  file:layouts/layout.tpl */
function block_2393757c70e2c1ae1c6_50067606($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'footer'} */
/* {block 'script'}  file:layouts/layout.tpl */
function block_2000657c70e2c1c53c7_36221079($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'script'} */
}
