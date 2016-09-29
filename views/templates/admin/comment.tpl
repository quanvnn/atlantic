{extends file = 'layouts/layoutAdmin.tpl'}

{block name = 'content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ YÊU CẦU CỦA KHÁCH HÀNG</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	    {if isset($alert)}{$alert}{/if}
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th style="width:7%">#</th>
	                                <th>Tên khách hàng</th>
	                                <th>Đánh giá sách</th>
	                                <th>Tiêu đề</th>
	                                <th>Nội dung</th>
	                                <th>Ngày liên hệ</th>
	                                <th>Xóa bình luận</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            
					            {foreach $DSBinhLuanAdmin as $binhluan}

					              <tr class="gradeU">
					                <td>{$i}</td>
					                <td>{$binhluan['ten_khach_hang']}</td>
					                <td>{$binhluan['ten_san_pham']}</td>
					                <td>{$binhluan['tieu_de']}</td>
					                <td>{$binhluan['noi_dung']}</td>
					                <td>{$binhluan['date']|date_format:"%e/%m/%Y"}</td>
					                <td><a href="{$path}/quan-tri/binh-luan/xoa/{$binhluan['id']}">xóa</a></td>
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