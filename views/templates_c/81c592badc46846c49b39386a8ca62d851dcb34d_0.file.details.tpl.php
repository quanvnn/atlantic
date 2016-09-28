<?php
/* Smarty version 3.1.29, created on 2016-08-02 06:01:03
  from "F:\wamp\www\atlantic\views\templates\details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a01affd799f9_37316054',
  'file_dependency' => 
  array (
    '81c592badc46846c49b39386a8ca62d851dcb34d' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\details.tpl',
      1 => 1470110317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57a01affd799f9_37316054 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_2290857a01affd58bc8_25654151',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_461357a01affd66e84_26983439',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'script'}  file:details.tpl */
function block_2290857a01affd58bc8_25654151($_smarty_tpl, $_blockParentStack) {
?>

<link rel="stylesheet" href="public/css/etalage.css">
<?php echo '<script'; ?>
 src="public/js/jquery.etalage.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	jQuery(document).ready(function($){

		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});

	});
<?php echo '</script'; ?>
>
<?php
}
/* {/block 'script'} */
/* {block 'content'}  file:details.tpl */
function block_461357a01affd66e84_26983439($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="public/images/d1.jpg" class="img-responsive" />
									<img class="etalage_source_image" src="public/images/d1.jpg" class="img-responsive" title="" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="public/images/d2.jpg" class="img-responsive" />
								<img class="etalage_source_image" src="public/images/d2.jpg" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="public/images/d3.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="public/images/d3.jpg"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="public/images/d4.jpg" class="img-responsive"  />
								<img class="etalage_source_image" src="public/images/d4.jpg"class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3>soluta nobis eleifend option</h3>
					<span class="brand">Brand: <a href="#">Sed do eiusmod </a></span>
					<br>
					<span class="code">Product Code: Product 11</span>
					<p>when an unknown printer took a galley of type and scrambled it to make</p>
						<div class="price">
							<span class="text">Price:</span>
							<span class="price-new">$110.00</span><span class="price-old">$100.00</span> 
							<span class="price-tax">Ex Tax: $90.00</span><br>
							<span class="points"><small>Price in reward points: 400</small></span><br>
						</div>
					<div class="det_nav1">
						<h4>Select a size :</h4>
							<div class=" sky-form col col-4">
								<ul>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>L</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>S</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>M</label></li>
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>XL</label></li>
								</ul>
							</div>
					</div>
					<div class="btn_form">
						<a href="checkout.html">buy</a>
					</div>
					<a href="#"><span>login to save in wishlist </span></a>
					
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
          	    <div class="single-bottom1">
					<h6>Details</h6>
					<p class="prod-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option</p>
				</div>
				<div class="single-bottom2">
					<h6>Related Products</h6>
						<div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="public/images/w8.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							  <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
				     <div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="public/images/w10.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							   <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
		   	  </div>
	       </div>	
	<div class="col-md-3">
	  
	</div>
   	</div>
		   <div class="clearfix"></div>		
	</div>
	<!-- end content -->

<?php
}
/* {/block 'content'} */
}
