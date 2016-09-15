<?php
/* Smarty version 3.1.29, created on 2016-08-26 07:41:52
  from "F:\wamp\www\atlantic\views\templates\lien-he.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bfd6a0a462b9_53778845',
  'file_dependency' => 
  array (
    'b3859641078921b0716102743e5bdf7371e22188' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\lien-he.tpl',
      1 => 1472190108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57bfd6a0a462b9_53778845 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2032257bfd6a0a3f207_98249271',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:lien-he.tpl */
function block_2032257bfd6a0a3f207_98249271($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
<div class="contact">
  <div class="contact-form">
	  	 	<h2>Contact Us</h2>
	 	    <form method="post" action="contact-post.html">
	    	<div>
		    	<span><label>Name</label></span>
		    	<span><input name="userName" type="text" class="textbox"></span>
		    </div>
		    <div>
		    	<span><label>E-mail</label></span>
		    	<span><input name="userEmail" type="text" class="textbox"></span>
		    </div>
		    <div>
		     	<span><label>Mobile</label></span>
		    	<span><input name="userPhone" type="text" class="textbox"></span>
		    </div>
		    <div>
		    	<span><label>Subject</label></span>
		    	<span><textarea name="userMsg"> </textarea></span>
		    </div>
		   <div>
		   		<span><input type="submit" class="" value="Submit us"></span>
		  </div>
	    </form>
    </div>
	<div class="clearfix"></div>		
</div>
</div>
</div>

<?php
}
/* {/block 'content'} */
}
