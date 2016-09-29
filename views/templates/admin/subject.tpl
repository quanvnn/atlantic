{extends file='layouts/layoutAdmin.tpl'}

{block name='content'}

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">QUẢN LÝ CHỦ ĐỀ SÁCH</h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <a href="{$path}/quan-tri/them-chu-de-sach.html"><button type="button" class="btn btn-default">TẠO CHỦ ĐỀ MỚI</button></a>
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <div class="dataTable_wrapper">
	                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                        <thead>
	                            <tr>
	                                <th width="75px">#</th>
	                                <th width="75px">ID</th>
	                                <th width="200px">ẢNH CHỦ ĐỀ</th>
	                                <th width="">CHỦ ĐỀ SÁCH</th>
	                                <th width="100px">CẬP NHẬT</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            {$i=1}
					            {foreach $DSChuDe as $v}
					              <tr class="gradeU">
					                <td>{$i}</td>
					                <td>{$v['ma_chu_de']}</td>
					                <td><img src="{$path}/public/images/{$v['hinh']}" width="200px"></td>
					                <td>{$v['ten_chu_de']}</td>
					                <td><a href="{$path}/quan-tri/cap-nhat-chu-de-{$v['ten_chu_de_url']}-{$v['ma_chu_de']}">Cập Nhật</a></td>
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