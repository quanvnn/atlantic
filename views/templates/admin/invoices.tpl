{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ ĐƠN HÀNG</h3>
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
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th style="width:10%">#</th>
	                                <th style="width:12%">Số hóa đơn</th>
	                                <th style="width:28%">Tên khách hàng</th>
	                                <th style="width:20%">Trị giá</th>
	                                <th style="width:15%">Ngày</th>
	                                <th style="width:15%">Chi tiết hóa đơn</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            {foreach $DSHoaDon as $hoadon}
					              <tr class="gradeU" align="center">
					                <td>{$i}</td>
					                <td>{$hoadon['so_hoa_don']}</td>
					                <td>{$hoadon['ten_khach_hang']}</td>
					                <td align="right">{number_format($hoadon['tri_gia'])} đ</td>
					                <td>{$hoadon['ngay_hd']|date_format:"%e/%m/%Y"}</td>
					                <td><a href="{$path}/quan-tri/don-hang/chi-tiet-don-hang-{$hoadon['so_hoa_don']}">Chi tiết</a></td>
					              </tr>
					                {$i = $i + 1}
					            {/foreach}
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