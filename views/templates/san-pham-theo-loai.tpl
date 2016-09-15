{extends file='layouts/layout.tpl'}

{block name='content'}

<!-- content -->
<div class="container">
	<div class="women_main">
		<!-- start sidebar -->
		<div class="col-md-3 s-d">
		  <div class="w_sidebar">
			
			{foreach $DSLoaiSanPham as $LoaiSanPham}
				{$loaicha = $LoaiSanPham[0]}
				{$DSLoaiCon = $LoaiSanPham[1]}
			
				<div class="w_nav1">
					<h4>{$loaicha['ten_loai']}</h4>
					<ul>
						{foreach $DSLoaiCon as $loaicon}
							<li><a href="{$path}/{$loaicha['ten_loai_san_pham_url']}/{$loaicon['ten_loai_san_pham_url']}.html">{$loaicon['ten_loai']}</a></li>
						{/foreach}
					</ul>	
				</div>
			
			{/foreach}

		   </div>
		</div>

	<!-- start content -->
	<div class="col-md-9 w_content">
	
		<!-- breadcrumb -->
		{if isset($LoaiCon)}
	        <ol class="breadcrumb">
	          <li><a href="{$path}">Trang chủ</a></li>
	          <li><a href="{$path}/{$LoaiCha['ten_loai_san_pham_url']}.html">{$LoaiCha['ten_loai']}</a></li>
	          <li class="active">{$LoaiCon['ten_loai']}</li>
	        </ol>
	    {elseif isset($LoaiCha)}
	         <ol class="breadcrumb">
	          <li><a href="{$path}">Trang chủ</a></li>
	          <li class="active">{$LoaiCha['ten_loai']}</li>
	         </ol>
	    {elseif isset($ChuDe)}
	    	<ol class="breadcrumb">
	          <li><a href="{$path}">Trang chủ</a></li>
	          <li class="active">{$ChuDe['ten_chu_de']}</li>
	        </ol>
	    {else}
	          <div class="alert alert-warning">
	            <strong>Xin lỗi!</strong> Hiện tại chưa có sản phẩm.
	          </div>
	    {/if}
		<!-- end breadcrumb -->

		<!-- grids_of_4 -->
		<div class="grids_of_4">
		  
		  	{foreach $DSSanPham as $SanPham}

			   	<div class="caption-style-2">
					<a href="{$path}/{$SanPham['ten_san_pham_url']}-{$SanPham['ma_san_pham']}.html"><img src="{$path}/public/hinh_san_pham/{$SanPham['hinh']}" alt=""/></a>
					<div class="caption">
						<div class="blur"></div>
						<div class="caption-text">
							<h1>{$SanPham['ten_san_pham']}</h1>
							<p>{number_format($SanPham['gia_ban'])} đ</p>
						</div>
					</div>
				</div>
			
			{/foreach}

			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->
		
		<div>{$PageLink}</div>
	</div>
	</div>
	<div class="clearfix"></div>
	
	<!-- end content -->

{/block}