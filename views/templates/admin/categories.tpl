{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ THỂ LOẠI SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="{$path}/quan-tri/them-the-loai-sach.html"><button type="button" class="btn btn-default">THÊM THỂ LOẠI MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th width="70px">#</th>
	                                <th width="75px">id</th>
	                                <th>Thể loại cha</th>
	                                <th>Thể loại con</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            {foreach $DSLoaiSanPham as $v}
					            	{$loaicha = $v[0]}
					            	{$DSloaicon = $v[1]}
					              <tr class="gradeU">
					                <td>{$i}</td>
					                <td>{$loaicha['ma_loai']}</td>
					                <td>
					                	<table>
					                		<tr>
					                			<td width="300px">{$loaicha['ten_loai']}</td>
					                			<td ><a href="{$path}/quan-tri/cap-nhat-the-loai-sach-{$loaicha['ma_loai']}">Edit</a> | <a href="{$path}/quan-tri/xoa-the-loai-sach-{$loaicha['ma_loai']}">Delete</a></td>
					                		</tr>
					                	</table>
					                <td>
					                	{foreach $DSloaicon as $loaicon}
					                		<table>
					                			<tr>
						                			<td width="300px">{$loaicon['ten_loai']}</td>
						                			<td><a href="{$path}/quan-tri/cap-nhat-the-loai-con-{$loaicon['ma_loai']}">Edit</a> | <a href="{$path}/quan-tri/xoa-the-loai-sach-{$loaicon['ma_loai']}">Delete</a></td>
					                			</tr>
					                		</table>
					                	{/foreach}
					                </td>
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