<?php
/* Smarty version 3.1.29, created on 2016-08-09 12:28:19
  from "F:\wamp\www\atlantic\views\templates\product_category.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a9b04306b194_22567973',
  'file_dependency' => 
  array (
    '9234ef6422c2ea7308c13d8305b6988b546fcc7f' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\product_category.tpl',
      1 => 1470738497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_57a9b04306b194_22567973 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_1281657a9b043010d56_50001666',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:product_category.tpl */
function block_1281657a9b043010d56_50001666($_smarty_tpl, $_blockParentStack) {
?>


<!-- content -->
<div class="container">
	<div class="women_main">
		<!-- start sidebar -->
		<div class="col-md-3 s-d">
		  <div class="w_sidebar">
			
			<?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiSanPham']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_LoaiSanPham_0_saved_item = isset($_smarty_tpl->tpl_vars['LoaiSanPham']) ? $_smarty_tpl->tpl_vars['LoaiSanPham'] : false;
$_smarty_tpl->tpl_vars['LoaiSanPham'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['LoaiSanPham']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['LoaiSanPham']->value) {
$_smarty_tpl->tpl_vars['LoaiSanPham']->_loop = true;
$__foreach_LoaiSanPham_0_saved_local_item = $_smarty_tpl->tpl_vars['LoaiSanPham'];
?>
				<?php $_smarty_tpl->tpl_vars['LoaiCha'] = new Smarty_Variable($_smarty_tpl->tpl_vars['LoaiSanPham']->value[0], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'LoaiCha', 0);?>
				<?php $_smarty_tpl->tpl_vars['DSLoaiCon'] = new Smarty_Variable($_smarty_tpl->tpl_vars['LoaiSanPham']->value[1], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'DSLoaiCon', 0);?>
			
				<div class="w_nav1">
					<h4><?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai'];?>
</h4>
					<ul>
						<?php
$_from = $_smarty_tpl->tpl_vars['DSLoaiCon']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_LoaiCon_1_saved_item = isset($_smarty_tpl->tpl_vars['LoaiCon']) ? $_smarty_tpl->tpl_vars['LoaiCon'] : false;
$_smarty_tpl->tpl_vars['LoaiCon'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['LoaiCon']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['LoaiCon']->value) {
$_smarty_tpl->tpl_vars['LoaiCon']->_loop = true;
$__foreach_LoaiCon_1_saved_local_item = $_smarty_tpl->tpl_vars['LoaiCon'];
?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['LoaiCha']->value['ten_loai_san_pham_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['LoaiCon']->value['ten_loai_san_pham_url'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['LoaiCon']->value['ten_loai'];?>
</a></li>
						<?php
$_smarty_tpl->tpl_vars['LoaiCon'] = $__foreach_LoaiCon_1_saved_local_item;
}
if ($__foreach_LoaiCon_1_saved_item) {
$_smarty_tpl->tpl_vars['LoaiCon'] = $__foreach_LoaiCon_1_saved_item;
}
?>
					</ul>	
				</div>
			
			<?php
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_local_item;
}
if ($__foreach_LoaiSanPham_0_saved_item) {
$_smarty_tpl->tpl_vars['LoaiSanPham'] = $__foreach_LoaiSanPham_0_saved_item;
}
?>

		   </div>
		</div>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4>Enthecwear - <span>4449 itemms</span> </h4></a>
			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">popular</a></li> |
		     			<li><a href="#">new </a></li> |
		     			<li><a href="#">discount</a></li> |
		     			<li><a href="#">price: Low High </a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		  <div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w1.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $99.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w2.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $76.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w3.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $58.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w4.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $112.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		
		<div class="grids_of_4">
		 <div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w5.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $109.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w6.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $95.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w7.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $68.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w8.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $74.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="grids_of_4">
		  <div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w9.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $80.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w10.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $65.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w11.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $90.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	   	 <img src="public/images/w12.jpg" class="img-responsive" alt=""/>
				   	  </a>
				    <h4><a href="details.html"> Duis autem</a></h4>
				     <p>It is a long established fact that</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>ONLY $75.00</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="#">add to cart</a></span></div>
					 </div>
			   	</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->
		
		
	</div>
	<div class="clearfix"></div>
	
	<!-- end content -->

<?php
}
/* {/block 'content'} */
}
