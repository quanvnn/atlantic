{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">CHI TIẾT ĐƠN HÀNG</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table ">   
					        <tbody>
						            <tr>          
						              <td>Tên khách hàng: {$ChiTietDonHang[0]['ten_khach_hang']}</td>
						              <td>Email: {$ChiTietDonHang[0]['email']}</td>
						            </tr>
						            <tr>
						              <td>Tên người nhận: {$ChiTietDonHang[0]['ten_nguoi_nhan']}</td>
						              <td>Điện thoại: {$ChiTietDonHang[0]['dien_thoai']}</td>
						            </tr>
						            <tr><td colspan="2">Địa chỉ: {$ChiTietDonHang[0]['dia_chi']}</td></tr>
					        </tbody>
					    </table>
					    <table class="table table-striped">      
					        <tbody>
					            {$i=1}    
					            <tr align="center"><td>#</td><td>MÃ SÁCH</td><td>TỰA SÁCH</td><td>SỐ LƯỢNG</td><td>ĐƠN GIÁ</td><td>THÀNH TIỀN</td></tr>
					            
					            {foreach $ChiTietDonHang as $donhang}

					                <tr align="center">
					                    <td>{$i}</td>
					                    <td>{$donhang['ma_san_pham']}</td>
					                    <td align="left">{$donhang['ten_san_pham']}</td>
					                    <td>{$donhang['so_luong']}</td>
					                    <td align="right">{number_format($donhang['don_gia'])} đ</td>
					                    <td align="right">{number_format($donhang['don_gia']*$donhang['so_luong'])} đ</td>
					                </tr>
					                {$i=$i+1}        
					            
					            {/foreach}

					            <tr>
					                <td colspan="2">Ngày: {$donhang['ngay_hd']|date_format:"%e/%m/%Y"}</td>
					                <td colspan="3" align="right">TRỊ GIÁ</td>
					                <td align="right">{number_format($ChiTietDonHang[0]['tri_gia'])} đ</td>
					            </tr>
					        </tbody>
					    </table>
	                </div>
	                <!-- /.table-responsive -->
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>

{/block}

{block name='script'}

	<!-- DataTables JavaScript -->
    <script src="{$path}/public/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{$path}/public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

{/block}