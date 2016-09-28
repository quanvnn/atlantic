{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="{$path}/quan-tri/them-sach.html"><button type="button" class="btn btn-default">THÊM SÁCH MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th style="width:70px">#</th>
	                                <th style="width:75px">id</th>
	                                <th>Hình</th>
	                                <th>Tên sách</th>
	                                <th style="width:150px">Giá bìa</th>
	                                <th style="width:150px">Giá bán</th>
	                                <th style="width:150px">Edit | Delete</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            {foreach $DSSanPham as $v}
					              <tr class="gradeU">
					                <td>{$i}</td>
					                <td>{$v['ma_san_pham']}</td>
					                <td><img src="{$path}/public/hinh_san_pham/{$v['hinh']}" style="width:75px"></td>
					                <td>{$v['ten_san_pham']}</td>
					                <td>{number_format($v['gia_bia'])} đ</td>
					                <td>{number_format($v['gia_ban'])} đ</td>
					                <td><a href="{$path}/quan-tri/cap-nhat-sach-{$v['ma_san_pham']}">Edit</a> | <a href="{$path}/quan-tri/xoa-sach-{$v['ma_san_pham']}">Delete</a></td>
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