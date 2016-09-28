{extends file="layouts/layoutAdmin.tpl"}

{block name='content'}

<script src="{$path}/public/ckeditor/ckeditor.js"></script>

<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THÊM SÁCH MỚI</h3>
        </div>
        <!-- /.col-lg-12 -->
    <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	  	
	  	<div class="col-sm-8">
				<!-- Thông báo -->
		  		{if !empty($alert)}
					<div class="alert alert-info">{$alert}</div>
				{/if}
				<!-- ./thông báo -->
		  	<div class="col-sm-5">
		  		<fieldset class="form-group">
		  			<label>Tựa sách {$mangErr['ten_san_pham']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" value="{$data['ten_san_pham']}" placeholder="Ví dụ: Think and grow rich">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
		  		<fieldset class="form-group">
		  			<label>Tên url {$mangErr['ten_san_pham_url']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_san_pham_url" value="{$data['ten_san_pham_url']}" placeholder="Ví dụ: think-and-grow-rich">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-5">
			 	<fieldset class="form-group">
			 		<label>Giá bìa {$mangErr['gia_bia']}</label>
		  			<input type="number" class="form-control" id="don_gia" name="gia_bia" value="{$data['gia_bia']}" placeholder="Ví dụ: 2,000">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
					<label>Giá bán {$mangErr['gia_ban']}</label>
		  			<input type="number" class="form-control" id="don_gia_khuyen_mai" name="gia_ban" value="{$data['gia_ban']}" placeholder="Ví dụ: 1,000">
		  		</fieldset>
			</div>

		  	<div class="col-sm-5">
				<fieldset class="form-group">
					<label>Thể loại sách</label>
				  	<select name="ma_loai" class="form-control">
			      	{foreach $DSLoaiSanPham as $loai}
			      		{$loaicha=$loai[0]}
			      		{$DSLoaiCon=$loai[1]}	      	
						  <optgroup label="{$loaicha['ten_loai']}">
						  	{if $DSLoaiCon}
						    	{foreach $DSLoaiCon as $loaicon}
						    		{if $data['ma_loai']== $loaicon['ma_loai']}
						    			<option value="{$loaicon['ma_loai']}" selected="selected">{$loaicon['ten_loai']}</option>
						    		{else}
						    			<option value="{$loaicon['ma_loai']}">{$loaicon['ten_loai']}</option>
						    		{/if}
						    	{/foreach}				    	
						    {/if}
						  </optgroup>			  
					 {/foreach}}
					</select>
				</fieldset>
			</div>

			<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
					<label>Ảnh bìa sách {$mangErr['hinh']}</label> <small class="text-muted">(Phải đảm bảo kích thước 200x300 px)</small>
				  	<input type="file" class="form-control" id="hinh" name="hinh">
				  	
				</fieldset>
			</div>

			<div class="col-sm-5">
			 	<fieldset class="form-group">
			 		<label>Tác giả</label>
		  			<input type="text" class="form-control">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-6 col-sm-offset-1">
				<fieldset class="form-group">
			 		<label>Chủ đề</label>
		  			<select class="form-control" name="chu_de_id">
		  				<option value="0">Mặc định</option>
		  				{if $DanhSachChuDe}
						    	{foreach $DanhSachChuDe as $chude}
						    		{if $data['chu_de_id'] == $chude['ma_chu_de']}
						    			<option value="{$chude['ma_chu_de']}" selected="selected">{$chude['ten_chu_de']}</option>
						    		{else}
						    			<option value="{$chude['ma_chu_de']}">{$chude['ten_chu_de']}</option>
						    		{/if}
						    	{/foreach}				    	
						    {/if}
		  			</select>
		  		</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Mô tả nội dung quyển sách {$mangErr['mo_ta']}</label>
				  	<textarea name="mo_ta" class="ckeditor" rows="5">{$data['mo_ta']}</textarea>
				</fieldset>
			</div>

			<div class="col-sm-2">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnThemSanPham" value="Đồng ý">
				</fieldset>
			</div>
			
		</div>

	</form>
	
    </div>
</div><!-- /#page-wrapper -->

{/block}