<?php
/* Smarty version 3.1.29, created on 2016-11-27 16:47:35
  from "/home/lequan/dev/atlantic/views/templates/home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583aabb70d1af9_71489253',
  'file_dependency' => 
  array (
    '9a78ff738a5b1e62b46a23390c18ea511fb2f747' => 
    array (
      0 => '/home/lequan/dev/atlantic/views/templates/home.tpl',
      1 => 1478533032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/layout.tpl' => 1,
  ),
),false)) {
function content_583aabb70d1af9_71489253 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_709304660583aabb709a1d9_98739184',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:home.tpl */
function block_709304660583aabb709a1d9_98739184($_smarty_tpl, $_blockParentStack) {
?>


<div class="arriv">
	<div class="container">
		<?php if ($_smarty_tpl->tpl_vars['DSChuDe']->value) {?>
			<div class="arriv-top">
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[0]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[0]['ma_chu_de'];?>
.html">
					<div class="col-md-6 arriv-left">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[0]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[0]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[0]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[1]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[1]['ma_chu_de'];?>
.html">
					<div class="col-md-6 arriv-right">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[1]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[1]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[1]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-bottm">
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[2]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[2]['ma_chu_de'];?>
.html">
					<div class="col-md-8 arriv-left1">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[2]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info2">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[2]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[2]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[3]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[3]['ma_chu_de'];?>
.html">
					<div class="col-md-4 arriv-right1">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[3]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[3]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[3]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-bottm">
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[4]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[4]['ma_chu_de'];?>
.html">
					<div class="col-md-4 arriv-left2">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[4]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[4]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[4]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[5]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[5]['ma_chu_de'];?>
.html">
					<div class="col-md-8 arriv-right3">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[5]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info2">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[5]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[5]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-las">
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[6]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[6]['ma_chu_de'];?>
.html">
					<div class="col-md-4 arriv-left2">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[6]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[6]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[6]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[7]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[7]['ma_chu_de'];?>
.html">
					<div class="col-md-4 arriv-middle">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[7]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[7]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[7]['mo_ta'];?>
</p>
						</div>
					</div>
				</a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/chu-de-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[8]['ten_chu_de_url'];?>
-<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[8]['ma_chu_de'];?>
.html">
					<div class="col-md-4 arriv-right2">
						<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/images/<?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[8]['hinh'];?>
" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[8]['ten_chu_de'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['DSChuDe']->value[8]['mo_ta'];?>

						</div>
					</div>
				</p>
				<div class="clearfix"> </div>
			</div>
		<?php }?>
	</div>
</div>

<?php
}
/* {/block 'content'} */
}
