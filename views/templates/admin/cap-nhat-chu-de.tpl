{extends file="layouts/layoutAdmin.tpl"}

{block name='content'}

<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">CẬP NHẬT CHỦ ĐỀ SÁCH</h3>
        </div>
        <!-- /.col-lg-12 -->
    <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	  	
	  	<div class="col-sm-6">
				<!-- Thông báo -->
		  		{if !empty($alert)}
					<div class="alert alert-info">{$alert}</div>
				{/if}
				<!-- ./thông báo -->
		  	<div class="col-sm-12">
		  		<fieldset class="form-group">
		  			<label>Chủ đề sách {$mangErr['ten_chu_de']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_chu_de" value="{$data['ten_chu_de']}" placeholder="Ví dụ: Tứ Đại Kỳ Thư">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-12">
		  		<fieldset class="form-group">
		  			<label>Chủ đề Url {$mangErr['ten_chu_de_url']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_chu_de_url" value="{$data['ten_chu_de_url']}" placeholder="Ví dụ: tu-dai-ky-thu">
		  		</fieldset>
		  	</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Ảnh đại diện cho chủ đề {$mangErr['hinh']}</label>
				  	<input type="file" class="form-control" id="hinh" name="hinh">
				  	<small class="text-muted">Chú ý: đảm bảo các ảnh theo đúng kích thước quy định.
				  	Ảnh chủ đề 1, 2: 556 x 387 px.
				  	Ảnh chủ đề 3, 6: 760 x 297 px.
				  	Ảnh chủ đề 4, 5,: 365 x 291 px.
				  	Ảnh chủ đề 7, 9: 370 x 272 px.
				  	Ảnh chủ đề 8: 350 x 269 px.
				  	</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
					<label>Mô tả chủ đề {$mangErr['mo_ta']}</label>
				  	<textarea name="mo_ta" class="form-control" rows="5">{$data['mo_ta']}</textarea>
				  	<small class="text-muted">Ví dụ: REVIVE YOUR WARDROBE WITH CHIC KNITS</small>
				</fieldset>
			</div>

			<div class="col-sm-12">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnCapNhatChuDe" value="Cập Nhật">
				</fieldset>
			</div>
			
		</div>

	</form>
	
    </div>
</div><!-- /#page-wrapper -->

{/block}