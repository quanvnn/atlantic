<?php
/* Smarty version 3.1.29, created on 2016-11-08 20:25:30
  from "/home/lequan/IMAD/atlantic/views/templates/layouts/layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5821d24aef60c0_24119380',
  'file_dependency' => 
  array (
    '0cb31ac1ac8008a05d43072a2f1799faecdc22cb' => 
    array (
      0 => '/home/lequan/IMAD/atlantic/views/templates/layouts/layout.tpl',
      1 => 1478611314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/header.tpl' => 1,
    'file:layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5821d24aef60c0_24119380 ($_smarty_tpl) {
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
  0 => 'block_14226787075821d24aef0540_50969179',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_4647311665821d24aef2405_88494641',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_594052175821d24aef2e86_98798324',
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

	<?php echo '<script'; ?>
 type="text/javascript">
		function load(){
            $.ajax({
                url : "/search",
                type : "post",
                dateType:"text",
                data : {
                     text : $('#text').val()
                },
                success : function (result){
                    $('#result').html(result);
                }
            });
        }
	<?php echo '</script'; ?>
>

	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_2986885205821d24aef5437_68279029',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


</body>
</html><?php }
/* {block 'header'}  file:layouts/layout.tpl */
function block_14226787075821d24aef0540_50969179($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'header'} */
/* {block 'content'}  file:layouts/layout.tpl */
function block_4647311665821d24aef2405_88494641($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
/* {block 'footer'}  file:layouts/layout.tpl */
function block_594052175821d24aef2e86_98798324($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'footer'} */
/* {block 'script'}  file:layouts/layout.tpl */
function block_2986885205821d24aef5437_68279029($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'script'} */
}
