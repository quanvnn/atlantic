<?php
/* Smarty version 3.1.29, created on 2016-08-17 04:51:14
  from "F:\wamp\www\atlantic\views\templates\contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b3d12234f920_28880946',
  'file_dependency' => 
  array (
    '8ee5e8c2d79b34408d864162c16cc3ba01f3726c' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\contact.tpl',
      1 => 1471402109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57b3d12234f920_28880946 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_2872257b3d1223466a7_55908511',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:contact.tpl */
function block_2872257b3d1223466a7_55908511($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="main">
<div class="contact">				
	<div class="contact_info">
		<h2>get in touch</h2>
	 		<div class="map">
	   			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1430912648478" width="100%" height="250" frameborder="0" style="border:0"></iframe>
	   		</div>
		</div>
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
