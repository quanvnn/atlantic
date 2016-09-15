{extends file="layouts/layoutAdmin.tpl"}

{block name='content'}

<div id="page-wrapper">
    
    <div class="row">
	  	
	  	<div class="col-sm-6">
	  		
		  	<div class="col-lg-12">
	            <h3 class="page-header">THÊM THỂ LOẠI CHA</h3>
	        </div>
	        <!-- /.col-lg-12 -->

			<!-- Thông báo -->
			<div class="col-lg-12">
		  		{if !empty($alert['loaicha'])}
					<div class="alert alert-info">{$alert['loaicha']}</div>
				{/if}
			</div>
			<!-- ./thông báo -->
			
			<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="col-sm-12">
		  	
			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Thể loại cha {$mangErr['ten_loai']}</label>
			  			<input type="text" class="form-control" id="ten_san_pham" name="ten_loai" value="{$data1['ten_loai']}" placeholder="Ví dụ: Khởi nghiệp">
			  		</fieldset>
			  	</div>

			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Tên Url {$mangErr['ten_loai_san_pham_url']}</label>
			  			<input type="text" class="form-control" id="ten_san_pham_url" name="ten_loai_san_pham_url" value="{$data1['ten_loai_san_pham_url']}" placeholder="Ví dụ: khoi-nghiep">
			  		</fieldset>
			  	</div>

				<div class="col-sm-10">
					<fieldset class="form-group">
					  	<input type="submit" class="btn btn-primary" name="btnThemLoaiCha" value="Đồng ý">
					</fieldset>
				</div>
			
			</div>
			</form>
			
		</div><!-- ./class="col-sm-6"-->
        
		  	
		<div class="col-sm-6">
		  	
		  	<div class="col-lg-12">
		        <h3 class="page-header">THÊM THỂ LOẠI CON</h3>
		   	</div><!-- /.col-lg-12 -->
					
			<!-- Thông báo -->
			<div class="col-lg-12">
		  		{if !empty($alert['loaicon'])}
					<div class="alert alert-info">{$alert['loaicon']}</div>
				{/if}
			</div>
			<!-- ./thông báo -->

			<form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="col-sm-12">

		        <div class="col-sm-10">
		          <fieldset class="form-group">
		            <label>Thể loại cha</label>
		              <select name="ma_loai" class="form-control">
		                {foreach $DSLoaiSanPham as $value}
		                  {$loaicha = $value[0]}
		                  {if $data2['ma_loai_cha'] == $loaicha['ma_loai']}
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
			  			<input type="text" class="form-control" id="ten_san_pham2" name="ten_loai" value="{$data2['ten_loai']}" placeholder="Ví dụ: kinh tế học">
			  		</fieldset>
			  	</div>

			  	<div class="col-sm-10">
			  		<fieldset class="form-group">
			  			<label>Tên Url {$mangErr['ten_loai_san_pham_url']}</label>
			  			<input type="text" class="form-control" id="ten_san_pham_url2" name="ten_loai_san_pham_url" value="{$data2['ten_loai_san_pham_url']}" placeholder="Ví dụ: kinh-te-hoc">
			  		</fieldset>
			  	</div>

				<div class="col-sm-10">
					<fieldset class="form-group">
					  	<input type="submit" class="btn btn-primary" name="btnThemLoaiCon" value="Đồng ý">
					</fieldset>
				</div>
				
			</div>
			</form>
		
		</div><!-- ./class="col-sm-6"-->
	</div>
</div><!-- /#page-wrapper -->

{/block}

{block name='script'}
<script>
        $(document).ready(function(){
            $("#ten_san_pham2").blur(function(){
                var tensp=$("#ten_san_pham2").val();
                if(tensp!="")
                  $("#ten_san_pham_url2").val(bodau(tensp));
            });
        });
        
        function bodau(str){
          str= str.toLowerCase();
          str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
          str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
          str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
          str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
          str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
          str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
          str= str.replace(/đ/g,"d");
          str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
          str= str.replace(/-+-/g,"-");
          str= str.replace(/^\-+|\-+$/g,"");
          return str;
        }
    </script>
{/block}