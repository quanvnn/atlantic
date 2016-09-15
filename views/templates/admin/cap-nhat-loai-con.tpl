{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
	
	<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">THAY ĐỔI THỂ LOẠI CON</h3>
        </div>  

  		<div class="col-sm-6">

  		<!-- Thông báo -->
  		
	  		{if !empty($alert)}
				<div class="alert alert-info">{$alert}</div>
			{/if}

		<!-- ./thông báo -->

			<div class="col-sm-10">
	          <fieldset class="form-group">
	            <label>Thể loại cha</label>
	              <select name="ma_loai" class="form-control">
	                {foreach $DSLoaiSanPham as $value}
	                  {$loaicha = $value[0]}
	                  {if $data['ma_loai_cha'] == $loaicha['ma_loai']}
	                    <option value="{$loaicha['ma_loai']}" selected="selected">{$loaicha['ten_loai']}</option>
	                  {else}
	                    <option value="{$loaicha['ma_loai']}">{$loaicha['ten_loai']}</option>
	                  {/if}
	                {/foreach}}
	              </select>
	          </fieldset>
	        </div>

		  	<div class="col-sm-10">
		  		<fieldset class="form-group">
		  			<label>Thể loại con {$mangErr['ten_loai']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="{$data['ten_loai']}" placeholder="Ví dụ: Kinh Tế Học">
		  		</fieldset>
		  	</div>

		  	<div class="col-sm-10">
		  		<fieldset class="form-group">
		  			<label>Tên Url {$mangErr['ten_loai_san_pham_url']}</label>
		  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="{$data['ten_loai_san_pham_url']}" placeholder="Ví dụ: kinh-te-hoc">
		  		</fieldset>
		  	</div>

			<div class="col-sm-10">
				<fieldset class="form-group">
				  	<input type="submit" class="btn btn-primary" name="btnCapNhatLoaiSanPham" value="Cập Nhật">
				</fieldset>
			</div>
		</div>
	</div>

	</form>
</div>

{/block}