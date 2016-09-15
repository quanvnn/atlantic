{extends file='layouts/layout.tpl'}

{block name='content'}

<!-- content -->
<div class="container">
	<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
					<div class="single_left">
							<img class="" src="{$path}/public/hinh_san_pham/{$san_pham['hinh']}" class="img-responsive" />
						  <div class="desc1 span_3_of_2">
							<h3>{$san_pham['ten_san_pham']}</h3>
							<p class="brand">Tác giả: <a href="#">Nguyễn Nhật Ánh</a></p>
							<p class="brand">Giá bìa: <span class="price-old">{number_format($san_pham['gia_bia'])} đ</span></p>
							<p class="brand">Tại atlantic: <span class="price-new">{number_format($san_pham['gia_ban'])} đ</span><span>(Đã có VAT)</span></p>
							<p class="brand">Số lượng:</p>
							<div class="form-inline">
								<form method="POST">
				                    <input name='soluong' type="number" value="1" style="width:75px; text-align:left" class="form-control" />
			                    	<input name="btnMua" type="submit" value="Thêm vào giỏ hàng" class="btn btn-default" />
			                    </form>
	                    	</div>
					   	 </div>
				   	</div>

          	    	<div class="clearfix"></div>

					<div class="single-bottom2">
						{if isset($DSSanPhamCungLoai)}
						<h6>Sản phẩm thường được xem cùng</h6>
							{$i = 1}
							{foreach $DSSanPhamCungLoai as $SanPhamCungLoai}

							<div class="product">
							   <div class="product-desc">
									<div class="product-img">
			                           <img src="{$path}/public/hinh_san_pham/{$SanPhamCungLoai['hinh']}" class="img-responsive " alt=""/>
			                       	</div>
			                       	<div class="prod1-desc">
			                           <h5><a class="product_link" href="{$path}/{$SanPhamCungLoai['ten_san_pham_url']}-{$SanPhamCungLoai['ma_san_pham']}.html">{$SanPhamCungLoai['ten_san_pham']}</a></h5>
			                           <p class="product_descr"> {$SanPhamCungLoai['mo_ta']} </p>									
								   	</div>
								<div class="clearfix"></div>
						      	</div>
							  	<div class="product_price">
									<span class="price-access">{number_format($SanPhamCungLoai['gia_ban'])} đ</span>								
									<button class="button1"><span>Add to cart</span></button>
			                  	</div>
							 	<div class="clearfix"></div>
					     	</div>
					     {$i = $i + 1}
					     {if $i>2}{break}{/if}
					     {/foreach}
					     {/if}
			   	  	</div>

			   	  	<div class="single-bottom1">
						<h6>Giới thiệu sách</h6>
						<p class="prod-desc">{$san_pham['mo_ta']}</p>
					</div>

					{if isset($DSBinhLuan)}
					<div class="single-bottom3">
						<h6>Nhận xét của khách hàng</h6>
						
						{foreach $DSBinhLuan as $binhluan}

						<div class="product">
						   	<div class="comment">
								<div class="comment-img">
		                           	{if empty($binhluan['avatar'])}
		                           	<img src="{$path}/public/images/icon_khach_hang/icon_comment.png" class="img-responsive " alt=""/>
		                           	{else}
		                           	<img src="{$path}/public/images/icon_khach_hang/{$binhluan['avatar']}" class="img-responsive " alt=""/>
		                           	{/if}
		                       	</div>
		                       	<div class="prod1-desc">
		                       		<h5>{$binhluan['ten_khach_hang']} | {$binhluan['tieu_de']}</h5>
		                           	<p class="product_descr"> {$binhluan['noi_dung']}</p>
							   	</div>
					      	</div>
						<div class="clearfix"></div>
				     	</div>

				     	{/foreach}

					</div>
					{/if}

					{if isset($smarty.session.khachhang)}
					<div class="single-bottom3">
						<h6>Đánh giá của bạn</h6>
						<div class="comment">
							<div class="contact-form">
						  	 	{if isset($message)}{$message}{/if}
						 	    <form method="POST">
							    	<div>
								    	<span><label>Tiêu đề <span style="color:red">*</span></label></span>
								    	<span><input name="tieu_de" type="text" class="textbox" required value=""></span>
								    </div>
								    <div>
								     	<span><label>Nội dung <span style="color:red">*</span></label></span>
								     	<span><textarea name="noi_dung" required></textarea></span>
								    </div>
								    <div>
								    	<span><input name="hide" type="hidden" class="textbox"></span>
								    </div>
								   <div>
								   		<span><input type="submit" name="btnBinhLuan" value="Gửi"></span>
								  </div>
						    	</form>
						    </div>
					    </div>
					</div>
					{/if}

	       		</div>
   			</div>
		   <div class="clearfix"></div>		
	</div>
</div>
	<!-- end content -->

{/block}