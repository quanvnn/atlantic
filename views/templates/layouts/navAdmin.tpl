        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            {block name='navTopAdmin'}{include file='layouts/navTopAdmin.tpl'}{/block}
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{$path}/quan-tri.html"><i class="fa fa-dashboard fa-fw"></i> Trang quản lý</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Quản lý CSDL<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{$path}/quan-tri/san-pham.html">Dữ liệu sách</a>
                                </li>
                                <li>
                                    <a href="{$path}/quan-tri/loai-san-pham.html">Thể loại sách</a>
                                </li>
                                <li>
                                    <a href="{$path}/quan-tri/chu-de.html">Chủ đề sách</a>
                                </li>
                                <li>
                                    <a href="{$path}/quan-tri/don-hang.html">Đơn hàng</a>
                                </li>
                                <li>
                                    <a href="{$path}/quan-tri/yeu-cau-cua-khach-hang.html">Liên hệ</a>
                                </li>
                                <li>
                                    <a href="{$path}/quan-tri/binh-luan.html">Bình luận</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>