{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THAY ĐỔI THỂ LOẠI SÁCH</h3>
        </div>  

  		<div class="col-sm-8">

  		<!-- Thông báo -->
  		{if !empty($alert)}
			<div class="alert alert-info">{$alert}</div>
		{/if}
		<!-- ./thông báo -->

		  	<div class="col-sm-7">
		  		<fieldset class="form-group">
		  			<label>Thể loại sách {$mangErr['ten_loai']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="{$data['ten_loai']}" placeholder="Ví dụ: Khởi nghiệp">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-7">
		  		<fieldset class="form-group">
		  			<label>Tên Url {$mangErr['ten_loai_san_pham_url']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="{$data['ten_loai_san_pham_url']}" placeholder="Ví dụ: khoi-nghiep">
		  		</fieldset>
		  	</div>

			<div class="col-sm-7">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnCapNhatLoaiSanPham" value="Cập Nhật">
				</fieldset>
			</div>
		</div>
	</div>

	</form>
</div>

{/block}