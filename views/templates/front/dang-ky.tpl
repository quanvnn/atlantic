{extends file='layouts/layout.tpl'}

{block name='content'}

<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>ĐĂNG KÝ</h2>
		{if isset($message_dangky)}{$message_dangky}{/if}
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" method="post">
				<div>
					{if isset($dataErrDangKy['ten_khach_hang'])} <span style="color:red">{$dataErrDangKy['ten_khach_hang']} {/if}</span>
					<input name="ten_khach_hang" placeholder="Tên:" type="text" tabindex="1" required autofocus value="{if isset($dataDangKy['ten_khach_hang'])}{$dataDangKy['ten_khach_hang']}{/if}">
				</div>
				<div>
					{if isset($dataErrDangKy['email'])} <span style="color:red">{$dataErrDangKy['email']} {/if}</span>
					<input name="email" placeholder="Email:" type="email" tabindex="2" required value="{if isset($dataDangKy['email'])}{$dataDangKy['email']}{/if}">
				</div>
				<div>
					{if isset($dataErrDangKy['mat_khau'])} <span style="color:red">{$dataErrDangKy['mat_khau']} {/if}</span>
					<input name="mat_khau" placeholder="Mật khẩu:" type="password" tabindex="3" required>
				</div>
				<div>
					<input name="hide" type="hidden">
				</div>
				<div>
					<input type="submit" value="Đăng Ký" name="btnDangKy" tabindex="4">
				</div>
				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" tabindex="5"><i></i>Tôi đồng ý các <a class="terms" href="#"> điều khoản atlantic</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2>ĐĂNG NHẬP</h2>
		{if isset($message_dangnhap)}{$message_dangnhap}{/if}
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" method="post">
				<div>
					<label>
						<input name="email" placeholder="Email:" type="email" tabindex="6" required>
					</label>
				</div>
				<div>
					<label>
						<input name="mat_khau" placeholder="Mật khẩu:" type="password" tabindex="7" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="đăng nhập" name="btnDangNhap" tabindex="8">
				</div>
				<div class="forget">
					<a href="{$path}/khach-hang/quen-mat-khau" tabindex="10">Quên mật khẩu</a>
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>

{/block}