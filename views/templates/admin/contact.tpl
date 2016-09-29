{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

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
	        <div class="panel panel-default">
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr align="center">
	                                <th>#</th>
	                                <th>ID</th>
	                                <th>Tiêu đề</th>
	                                <th>Nội dung</th>
	                                <th>Email</th>
	                                <th>Ngày liên hệ</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            
					            {foreach $DSYeuCauKhachHang as $lienhe}

					              <tr class="gradeU">
					                <td>{$i}</td>
					                <td>{$lienhe['lien_he_id']}</td>
					                <td>{$lienhe['tieu_de']}</td>
					                <td>{$lienhe['noi_dung']}</td>
					                <td>{$lienhe['email']}</td>
					                <td>{$lienhe['ngay_lien_he']|date_format:"%e/%m/%Y"}</td>
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