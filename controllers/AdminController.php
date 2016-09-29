<?php
include_once('controllers/SmartyController.php');
include_once('controllers/HelperController.php');
include_once('models/LoaiSanPhamModel.php');
include_once('models/BinhLuanModel.php');
include_once('models/SanPhamModel.php');
include_once('models/DonHangModel.php');
include_once('models/LienHeModel.php');
include_once('models/ChuDeModel.php');
include_once('models/AdminModel.php');

class AdminController
{
    public function QuanTriDangNhap()
    {
        $smarty = new SmartyController();

        //nếu cookie.nguoi_dung đã tồn tại thì check tên đăng nhập và mật khẩu từ cookie với csdl
        $cookie_name = "nguoi_dung";
        $cookie_time = (3600 * 24 * 7); // 7 days

        if (isset($_COOKIE[$cookie_name])) {
            //var_dump($_COOKIE[$cookie_name]);
            parse_str($_COOKIE[$cookie_name]);
            //kiểm tra user và pass với CSDL
            $admin = new AdminModel();
            $nguoi_dung = $admin->getInfoAdmin($tendn, $mat_khau);
            if ($nguoi_dung) {
                //Tạo session.nguoi_dung
                $arrTTNguoiDung=array(
                    'ten_nguoi_dung' => $nguoi_dung['ho_ten'],
                    'tendn'          => $nguoi_dung['ten_dang_nhap']);
                $_SESSION['nguoi_dung'] = $arrTTNguoiDung;
                header('location:'.path.'/quan-tri.html'); exit();
            }
        }

        //khi submit form đăng nhập
        if (isset($_POST['btnDangNhapAdmin'])) {
            //validate bien post
            $ten_dang_nhap = addslashes($_POST['ten_dang_nhap']);
            $mat_khau = addslashes($_POST['mat_khau']);

            //kiểm tra user và pass với CSDL
            $admin = new AdminModel();
            $nguoi_dung = $admin->getInfoAdmin($ten_dang_nhap, md5($mat_khau));

            if ($nguoi_dung) {
                //Tạo session.nguoi_dung
                $arrTTNguoiDung = array(
                    'ten_nguoi_dung' =>$nguoi_dung['ho_ten'],
                    'tendn'          =>$nguoi_dung['ten_dang_nhap']
                    );
                $_SESSION['nguoi_dung'] = $arrTTNguoiDung;
                if (isset($_POST['remember'])) {
                    $cookie_value = "tendn=".$nguoi_dung['ten_dang_nhap']."&mat_khau=".$nguoi_dung['mat_khau'];
                    setcookie($cookie_name, $cookie_value, time() + $cookie_time);
                    //var_dump($_COOKIE['nguoi_dung']); exit();
                }
                header('location:'.path.'/quan-tri.html'); exit();
            }
            else
                $smarty->assign('err','Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.');
        }
        $smarty->display('admin/dang-nhap.tpl');
    }
    public function QuanTri()
    {
        // kiểm tra tồn tại của session.nguoi_dung
        if (!isset($_SESSION['nguoi_dung'])) {
            // var_dump($_SESSION['nguoi_dung']);exit();
            // bắt buộc đăng nhập
            header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
        } else {
            // cho phép vào trang quản trị
            $smarty = new SmartyController();
            $smarty->display('admin/admin.tpl');
        }
    }
    public function QuanTriDangXuat() {
        session_destroy();
        unset($_SESSION['nguoi_dung']);
        if (isset($_COOKIE['nguoi_dung'])) {
            setcookie("nguoi_dung", "", time() - 3600);
        }
        header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
    }
    public function QuanTriSanPham()
    {
        $admin = new AdminModel();
        $DSSanPham = $admin->getProductAdmin();
        $smarty = new SmartyController();
        if ($DSSanPham) {
            $smarty->assign('DSSanPham', $DSSanPham);
            $smarty->display('admin/san-pham.tpl');    
        } else {
            header('location:'.path.'/quan-tri/san-pham.html'); exit();
        }
    }
    public function QuanTriXoaSanPham()
    {
        if (isset($_GET['key'])) {
            $msp = $_GET['key'];
            $SanPhamModel = new SanPhamModel();
            $data = $SanPhamModel->SanPhamId($msp); //var_dump($data); exit();
            if(file_exists('./public/hinh_san_pham/'.$data['hinh'])) {
                unlink('./public/hinh_san_pham/'.$data['hinh']);
                $admin = new AdminModel();
                $admin->deleteProduct($msp);
            }
            header('location:'.path.'/quan-tri/san-pham.html');
        }
    }
    public function QuanTriThemSanPham()
    {
        $alert ='';
        $data = array(
                'ten_san_pham'        =>'',
                'ten_san_pham_url'    =>'',
                'ma_loai'             =>'',
                'mo_ta'               =>'',
                'gia_bia'             =>'',
                'gia_ban'             =>'',
                'hinh'                =>'',
                'chu_de_id'           =>'',
                );
        $mangErr = array(
                'ten_san_pham'=>'',
                'ten_san_pham_url'=>'',
                'mo_ta'=>'',
                'gia_bia'=>'',
                'gia_ban'=>'',
                'hinh'=>''
                );
        if (isset($_POST['btnThemSanPham'])) {
            $data = array(
                'ten_san_pham'        => $_POST['ten_san_pham'],
                'ten_san_pham_url'    => $_POST['ten_san_pham_url'],
                'ma_loai'             => $_POST['ma_loai'],
                'mo_ta'               => $_POST['mo_ta'],
                'gia_bia'             => $_POST['gia_bia'],
                'gia_ban'             => $_POST['gia_ban'],
                'hinh'                => $_FILES['hinh'],
                'chu_de_id'           => $_POST['chu_de_id'],
                );
            //var_dump($data); exit();
            $check = new HelperController();
            //var_dump($check->checkData($data)); exit();
            if ($check->checkData($data)) {
                //Hàm trả về true false 
                // Đảm bảo các trường bắt buộc ko để trống thì tiến hành Upload file
                //var_dump($check->checkimage($data['hinh'])); exit();
                if ($check->checkimage($data['hinh'])) {
                    // thực hiện upload hình vào csdl
                    $hinh = $_FILES['hinh'];
                    //var_dump($hinh);
                    $data['hinh'] = time().'-'.$hinh['name'];
                    //var_dump($data['hinh']); exit();
                    //var_dump(move_uploaded_file($hinh['tmp_name'],'./public/hinh_san_pham/'.$data['hinh'])); exit();

                    if (move_uploaded_file($hinh['tmp_name'],'./public/hinh_san_pham/'.$data['hinh'])) {
                        // insert sản phẩm vào csdl
                        $admin = new AdminModel();
                        $admin->addProduct($data);
                        $alert = 'Thêm sản phẩm thành công!';
                        //var_dump($alert); exit();
                    }

                } else {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                    echo 'sai'; exit();
                }
                    
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        //hiển thị mảng thông tin sản phẩm trả về trình duyệt khi đã nhập
        $smarty->assign('data', $data);
        //hiển thị mảng báo lỗi
        $smarty->assign('mangErr', $mangErr);
        //hiển thị list loại sản phẩm
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $smarty->assign('DSLoaiSanPham', $LoaiSanPhamModel->getCat());
        $ChuDeModel = new ChuDeModel();
        $smarty->assign('DanhSachChuDe', $ChuDeModel->DanhSachChuDe());
        $smarty->assign('alert', $alert);
        $smarty->display('admin/them-san-pham.tpl');
    }
    public function QuanTriCapNhatSanPham()
    {
        //validate biến GET
        //nhận GET mã sản phẩm để truy xuất csdl sản phẩm hiển thị ra trình duyệt
        //trước khi update vào csdl từ biến POST thì validate các trường nhập vào
        //ở đây chỉ validate cơ bản không được để trống các trường bắt buộc
        //sau khi validate, nếu báo lỗi thì hiển thị lỗi ra trình duyệt
        //nếu không lỗi thì tiến hành truy vấn Update csdl
        
        //Validate biến GET: nếu biến GET tồn tại và kiểu nguyên lớn hơn 0
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            //mã sản phẩm
            $key = $_GET['key']; //echo $key; exit();
        } else {
            header('location:'.path.'/quan-tri/san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat(); 
        //var_dump($DSLoaiSanPham); exit();
        //hiển thị list danh sách chủ đề ra trình duyệt để lựa chọn update
        $ChuDeModel = new ChuDeModel();
        $DanhSachChuDe = $ChuDeModel->DanhSachChuDe();
        //var_dump($DSChuDe); exit();
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $SanPhamModel = new SanPhamModel();
        $data = $SanPhamModel->SanPhamId($key); //var_dump($data); exit();
        $hinh_cu = $data['hinh'];
        //var_dump($data['hinh']); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/san-pham.html');
            exit();
        }
        $mangErr = array(
            'ten_san_pham'     =>'',
            'ten_san_pham_url' =>'',
            'mo_ta'            =>'',
            'gia_bia'          =>'',
            'gia_ban'          =>'',
            'hinh'             =>'');
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatSanPham'])) {
            $data = array(
                'ma_san_pham'        =>$key,
                'ten_san_pham'       =>$_POST['ten_san_pham'], 
                'ten_san_pham_url'   =>$_POST['ten_san_pham_url'], 
                'ma_loai'            =>$_POST['ma_loai'], 
                'mo_ta'              =>$_POST['mo_ta'], 
                'gia_bia'            =>$_POST['gia_bia'], 
                'gia_ban'            =>$_POST['gia_ban'],
                'hinh'               =>$_FILES['hinh'],
                'chu_de_id'          =>$_POST['chu_de_id'],
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkData($data)) {
                //nếu không có lỗi xảy ra đối với các trường bắt buộc
                //tiến hành kiểm tra trường upload hình
                $hinh = $_FILES['hinh']; 
                //var_dump($hinh); exit();
                if ($check->checkimage($hinh) == 0) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    // thực hiện upload hình vào csdl
                    $nameHinh = time().'-'.$hinh['name'];
                    if (move_uploaded_file($hinh['tmp_name'],'./public/hinh_san_pham/'.$nameHinh)){
                        //nếu upload thành công ta sẽ xóa hình cũ đi
                        if (file_exists('./public/hinh_san_pham/'.$hinh_cu)) {
                            unlink('./public/hinh_san_pham/'.$hinh_cu);
                        }
                        //thực hiện sản phẩm update vào csdl
                        $data['hinh'] = $nameHinh;
                        $admin = new AdminModel();
                        $admin->updateProduct($data);
                        //Thông báo ra trình duyệt
                        $alert = 'Cập nhật sản phẩm thành công!';
                    }
                }
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $mangErr);
        $smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
        $smarty->assign('DanhSachChuDe', $DanhSachChuDe);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/cap-nhat-san-pham.tpl');
    }
    public function QuanTriLoaiSanPham()
    {
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat(); //var_dump($getCat); exit();
        $smarty = new SmartyController();
        if ($DSLoaiSanPham) {
            $smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
            $smarty->display('admin/loai-san-pham.tpl');    
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html'); exit();
        }         
        
    }
    public function QuanTriXoaLoaiSanPham()
    {
        //echo 'ok';
        if (isset($_GET['key'])) {
            //var_dump($_GET['key']); exit();
            $maloai = $_GET['key'];
            $admin = new AdminModel();
            $admin->deleteCat($maloai);
            header('location:'.path.'/quan-tri/loai-san-pham.html');
        }
    }
    public function QuanTriThemLoaiSanPham()
    {
        $alert = array();
        $data['loaicha'] = array(
                'ten_loai'=>'',
                'ten_loai_san_pham_url'=>'',
                'ma_loai_cha'=>''
                );
        $data['loaicon'] = array(
                'ten_loai'=>'',
                'ten_loai_san_pham_url'=>'',
                'ma_loai_cha'=>''
                );
        $mangErr = array(
                'ten_loai'=>'',
                'ten_loai_san_pham_url'=>'',
                );

        //Thêm loại cha
        if (isset($_POST['btnThemLoaiCha'])) {
            $data['loaicha'] = array(
                'ten_loai'                 =>$_POST['ten_loai'],
                'ten_loai_san_pham_url'    =>$_POST['ten_loai_san_pham_url'],
                );
            //var_dump($data); exit();
            $check = new HelperController();
            if ($check->checkDataLoaiSanPham($data['loaicha'])) {
                //Hàm trả về true false
                // insert sản phẩm vào csdl
                $admin = new AdminModel();
                $admin->addCat($data['loaicha']);
                $alert['loaicha'] = 'Thêm thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert['loaicha'] = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        //Thêm loại con
        if (isset($_POST['btnThemLoaiCon'])) {
            $data['loaicon'] = array(
                        'ten_loai'                 =>$_POST['ten_loai'],
                        'ten_loai_san_pham_url'    =>$_POST['ten_loai_san_pham_url'],
                        'ma_loai_cha'              =>$_POST['ma_loai']
                );
            //var_dump($data); exit();
            $check = new HelperController();
            if ($check->checkDataLoaiSanPham($data['loaicon'])) {
                // insert sản phẩm vào csdl
                $admin = new AdminModel();
                $admin->addSubCat($data['loaicon']);
                $alert['loaicon'] = 'Thêm thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert['loaicon'] = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        
        $smarty = new SmartyController();
        $smarty->assign('data1', $data['loaicha']);
        $smarty->assign('data2', $data['loaicon']);
        //hiển thị mảng báo lỗi
        $smarty->assign('mangErr', $mangErr);
        $smarty->assign('alert', $alert);
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat();
        //var_dump($DSLoaiSanPham); exit();
        $smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
        $smarty->display('admin/them-loai-san-pham.tpl');
    }
    public function QuanTriCapNhatLoaiSanPham()
    {
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            //mã sản phẩm
            $key = $_GET['key']; //echo $key; exit();
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat();
        //var_dump($DSLoaiSanPham); exit();
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $data = $LoaiSanPhamModel->getCatID($key); //var_dump($data); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        $mangErr = array(
            'ten_loai'              =>'',
            'ten_loai_san_pham_url' =>'',
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            $data = array(
                'ma_loai'                     => $key,
                'ten_loai'                    => $_POST['ten_loai'],
                'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url']
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataLoaiSanPham($data)) {
                //thực hiện sản phẩm update vào csdl
                $admin = new AdminModel();
                $admin->updateCat($data);
                //Thông báo ra trình duyệt
                $alert = 'Cập nhật thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $mangErr);
        $smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/cap-nhat-loai-san-pham.tpl');
    }
    public function QuanTriCapNhatLoaiCon()
    {
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            //mã sản phẩm
            $key = $_GET['key']; //echo $key; exit();
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $LoaiSanPhamModel = new LoaiSanPhamModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat(); //var_dump($getCat); exit();
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $data = $LoaiSanPhamModel->getCatID($key); //var_dump($data); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        $mangErr = array(
            'ten_loai'              =>'',
            'ten_loai_san_pham_url' =>'',
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            $data = array(
                'ma_loai'                     => $key,
                'ten_loai'                    => $_POST['ten_loai'],
                'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url'],
                'ma_loai_cha'                 => $_POST['ma_loai']
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataLoaiSanPham($data)) {
                //thực hiện sản phẩm update vào csdl
                $admin = new AdminModel();
                $admin->updateSubCat($data);
                //Thông báo ra trình duyệt
                $alert = 'Cập nhật thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $mangErr);
        $smarty->assign('DSLoaiSanPham', $DSLoaiSanPham);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/cap-nhat-loai-con.tpl');
    }
    public function QuanTriChuDe()
    {
        $ChuDeModel = new ChuDeModel();
        $DSChuDe = $ChuDeModel->getSubject();
        //var_dump($DSChuDe); exit();
        
        if ($DSChuDe) {
            $smarty = new SmartyController();
            $smarty->assign('DSChuDe', $DSChuDe);
            $smarty->display('admin/chu_de.tpl');
        } else {
            header('location:'.path.'/quan-tri/them-chu-de-sach.html');
            exit();
        }
    }
    public function QuanTriThemChuDe()
    {
        header('location:'.path.'/quan-tri/chu-de.html');
        // $alert ='';
        // $data = array(
        //         'ten_chu_de'=>'',
        //         'ten_chu_de_url'=>'',
        //         'mo_ta'=>'',
        //         'hinh'=>''
        //         );
        // $mangErr = array(
        //         'ten_chu_de'=>'',
        //         'ten_chu_de_url'=>'',
        //         'mo_ta'=>'',
        //         'hinh'=>''
        //         );
        // if(isset($_POST['btnThemChuDeSanPham']))
        // {
        //     $data = array(
        //         'ten_chu_de'          =>$_POST['ten_chu_de'],
        //         'ten_chu_de_url'      =>$_POST['ten_chu_de_url'],
        //         'mo_ta'               =>$_POST['mo_ta'],
        //         'hinh'                =>$_FILES['hinh'],
        //         );
        //     //var_dump($data); exit();
        //     $check = new HelperController();
        //     if($check->checkDataChuDe($data))//Hàm trả về true false
        //     {
        //         // Đảm bảo các trường bắt buộc ko để trống thì tiến hành Upload file
        //         if($check->checkimage($data['hinh']))
        //         {
        //             // thực hiện upload hình vào csdl
        //             $hinh = $_FILES['hinh'];
        //             $nameHinh = time().'-'.$hinh['name'];
        //             $data['hinh'] = $nameHinh;
        //             //var_dump($data); exit();
        //             if(move_uploaded_file($hinh['tmp_name'],'./public/images/'.$data['hinh']))
        //             {
        //                 // insert sản phẩm vào csdl
        //                 $admin = new AdminModel();
        //                 $admin->ThemChuDeSanPham($data);
        //                 $alert = 'Thêm chủ đề mới thành công!';
        //             }
        //         }
        //         else
        //             $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình tải lên nhỏ hơn 2 Mb.';
        //     }
        //     else
        //     {
        //         //thông báo lỗi các trường bắt buộc ko được để trống
        //         $mangErr = $check->getDataErr();
        //         //var_dump($mangErr); exit();
        //         $alert = 'Vui lòng điển đầy đủ thông tin.';
        //     }
        // }
        // $smarty = new SmartyController();
        // //hiển thị mảng thông tin sản phẩm trả về trình duyệt khi đã nhập
        // $smarty->assign('data',$data);
        // //hiển thị mảng báo lỗi
        // $smarty->assign('mangErr',$mangErr);
        // //hiển thị list loại sản phẩm
        // $smarty->assign('alert',$alert);
        // $smarty->display('admin/them-chu-de-san-pham.tpl');
    }
    public function QuanTriCapNhatChuDe()
    {
        //Validate biến GET: nếu biến GET tồn tại và kiểu nguyên lớn hơn 0
        if (isset($_GET['key'])) {
            //mã sản phẩm
            $key = $_GET['key']; //echo $key; exit();
            $mang = explode('-', $key); //var_dump($mang); exit;
            $ma_chu_de = $mang[count($mang)-1];
        } else {
            header('location:'.path.'/quan-tri/chu-de.html');
            exit();
        }
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $ChuDeModel = new ChuDeModel();
        $data = $ChuDeModel->getSubjectID($ma_chu_de); //var_dump($data); exit();
        $hinh_cu = $data['hinh'];
        //var_dump($data['hinh']); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/chu-de.html'); exit();
        }
        $mangErr = array(
            'ten_chu_de'     =>'',
            'ten_chu_de_url' =>'',
            'mo_ta'            =>'',
            'hinh'             =>''
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatChuDe'])) {
            $data = array(
                'ma_chu_de'          =>$ma_chu_de,
                'ten_chu_de'         =>$_POST['ten_chu_de'], 
                'ten_chu_de_url'     =>$_POST['ten_chu_de_url'], 
                'mo_ta'              =>$_POST['mo_ta'], 
                'hinh'               =>$_FILES['hinh'],
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataChuDe($data)) {
                //nếu không có lỗi xảy ra đối với các trường bắt buộc
                //tiến hành kiểm tra trường upload hình
                $hinh = $_FILES['hinh']; //var_dump($hinh); exit();
                if ($check->checkimage($hinh) == 0) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    // thực hiện upload hình vào csdl
                    $nameHinh = time().'-'.$hinh['name'];
                
                    if (move_uploaded_file($hinh['tmp_name'],'./public/images/'.$nameHinh)) {
                        //nếu upload thành công ta sẽ xóa hình cũ đi
                        if (file_exists('./public/images/'.$hinh_cu)) {
                            unlink('./public/images/'.$hinh_cu);
                        }
                        //thực hiện sản phẩm update vào csdl
                        $data['hinh'] = $nameHinh;
                        $admin = new AdminModel();
                        $admin->updateSubject($data);
                        //Thông báo ra trình duyệt
                        $alert = 'Cập nhật thành công!';
                    }
                }
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $mangErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $mangErr);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/cap-nhat-chu-de.tpl');
    }
    public function QuanTriDonHang()
    {
    	$DonHangModel = new DonHangModel();
    	$DSHoaDon = $DonHangModel->getInvoices();
    	//var_dump($DSHoaDon); exit();
    	$smarty = new SmartyController();
    	if ($DSHoaDon) {
    		$smarty->assign('DSHoaDon', $DSHoaDon);
    	}
    	$smarty->display('admin/don-hang.tpl');
    }
    public function QuanTriChiTietDonHang()
    {
    	$smarty = new SmartyController();
    	if (isset($_GET['key'])) {
            //chua validate bien GET
    		$soHD = $_GET['key'];
    		$DonHangModel = new DonHangModel();
    		$ChiTietDonHang = $DonHangModel->getInfoInvoice($soHD);
    		//var_dump($ChiTietDonHang); exit();
    		if ($ChiTietDonHang) {
    			$smarty->assign('ChiTietDonHang',$ChiTietDonHang);
    		} else {
    			header('location:'.path.'/quan-tri/don-hang.html'); exit();
    		}
    	} else {
    		header('location:'.path.'/quan-tri/don-hang.html'); exit();
    	}
    	$smarty->display('admin/chi-tiet-don-hang.tpl');
    }
    public function QuanTriYeuCauKhachHang()
    {
        $LienHeModel = new LienHeModel();
        $DSYeuCauKhachHang = $LienHeModel->DSYeuCauKhachHang();
        //var_dump($DSYeuCauKhachHang); exit();
        $smarty = new SmartyController();
        if ($DSYeuCauKhachHang) {
            $smarty->assign('DSYeuCauKhachHang', $DSYeuCauKhachHang);
        }
        $smarty->display('admin/lien-he.tpl');
    }
    public function QuanTriBinhLuan()
    {
        $BinhLuanModel = new BinhLuanModel();
        $DSBinhLuanAdmin = $BinhLuanModel->getCommentAdmin();
        //var_dump($DSBinhLuanAdmin); exit();
        $smarty = new SmartyController();
        if ($DSBinhLuanAdmin)
        {
            $smarty->assign('DSBinhLuanAdmin', $DSBinhLuanAdmin);
        }
        $smarty->display('admin/binh-luan.tpl');
    }
    public function QuanTriXoaBinhLuan()
    {
        if (isset($_GET['key'])) {
            $id = $_GET['key'];
            //var_dump($id); exit();
            $smarty = new SmartyController();
            $BinhLuanModel = new BinhLuanModel();
            $BinhLuanModel->deleteComment($id);
            header('location:'.path.'/quan-tri/binh-luan.html');
            exit();
        } else {
            header('location:'.path.'/quan-tri/binh-luan.html'); exit();
        }
    }
}// ./ AdminController
?>