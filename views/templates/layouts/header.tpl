<!-- header_top -->
<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">Online bookstore</a></li>|
					<li><a href="{$path}/ho-tro-khach-hang">Atlantic care</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span></span> Lê Quân : 01667 456 101</h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
	<div class="container">
		<div class="header">
		<div class="head-t">
			<div class="logo">
				<a href="{$path}"><img src="{$path}/public/images/logo.png" class="img-responsive" alt=""/> </a>
			</div>
			<!-- start header_right -->
			<div class="header_right">
				<div class="rgt-bottom">

				<div class="create_btn">
					<a href="{$path}/khach-hang/gio-hang"><span>Giỏ hàng<img src="{$path}/public/images/bag.png" alt=""></span></a>
				</div>

				{if isset($smarty.session.khachhang)}
					<div class="log">
						<div class="login" >
							<div id="loginContainer"><a href="#" id="loginButton"><span>Chào, {$smarty.session.khachhang['ten_khach_hang']}</span></a>
								<div id="loginBox">
							        <span><a href="{$path}/khach-hang/dang-xuat">Đăng xuất</a></span>
								</div>
							</div>
						</div>
					</div>
				{else}
					<div class="log">
						<div class="login">
							<div id="loginContainer"><a href="#" id="loginButton"><span>Đăng nhập</span></a>
							    <div id="loginBox">
							        <form id="loginForm" method="POST">
							                <fieldset id="body">
							                	<fieldset>
							                          <label for="email">Email</label>
							                          <input type="text" name="email" id="email">
							                    </fieldset>
							                    <fieldset>
							                            <label for="password">Mật khẩu</label>
							                            <input type="password" name="mat_khau" id="password">
							                     </fieldset>
							                    <input type="submit" id="login" value="Đăng nhập" name="btnDangNhap">
							                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Ghi nhớ.</i></label>
							            	</fieldset>
							            <span><a href="{$path}/khach-hang/dang-ky">Đăng ký</a> | <a href="{$path}/khach-hang/quen-mat-khau">Quên mật khẩu?</a></span>
									</form>
								</div>
							</div>
						</div>
					</div>
				{/if}
					<div class="clearfix"></div>
				</div>
			<div class="search">
			    <form>
			    	<input type="text" id="text" placeholder="search...">
					<input type="button" value="" id="search" onclick="load()">
				</form>
			</div>

			<div id="result">
				Content
			</div>

			<div class="clearfix"> </div>
		</div>
			<div class="clearfix"> </div>
		</div>
			<!-- start header menu -->
			<ul class="megamenu skyblue">
				<li class="active grid " ><a class="color1" href="{$path}">Home</a></li>
				<li class="grid"><a class="color2" href="#">Book</a>
					<div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>Thể Loại</h4>
									<ul>
										{foreach $DSLoaiSanPham as $LoaiSanPham}
											{$LoaiCha = $LoaiSanPham[0]}
											<li><a href="{$path}/{$LoaiCha['ten_loai_san_pham_url']}.html">{$LoaiCha['ten_loai']}</a></li>
										{/foreach}
									</ul>	
								</div>							
							</div>
							
						</div>
						<div class="row">
							<div class="col2"></div>
						</div>
    				</div>
				</li>
			 </ul>
		</div>
	</div>
</div>