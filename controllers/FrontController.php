<?php
include_once('controllers/SmartyController.php');
include_once('models/LoaiSanPhamModel.php');
include_once('models/KhachHangModel.php');
include_once('models/BinhLuanModel.php');
include_once('models/SanPhamModel.php');
include_once('models/ChuDeModel.php');
include_once('library/Gio_hang.php');
include_once('library/Pager.php');

class FrontController
{
	public function index()
	{
        $ChuDeModel = new ChuDeModel();
        $DSChuDe = $ChuDeModel->DanhSachChuDe(); //var_dump($DSChuDe); exit();
		$smarty = new SmartyController;
        $smarty->assign('DSChuDe', $DSChuDe);
		$smarty->display('trang-chu.tpl');
	}
	public function SanPhamTheoLoaiCha()
	{
		//sản phẩm theo loại cha chính là danh sách sản phẩm theo loại con của thằng loại cha
        //nhận url loại cha từ GET -> truy xuất mã loại cha -> truy xuất danh sách loại con dựa vào mã loại cha
        //-> tạo một mảng chứa các mã loại con từ danh sách loại con
        //-> tách mảng thành chuỗi mã loại để truy xuất danh sách sản phẩm dựa vào chuỗi mã loại đó
        if (isset($_GET['key'])) {
            
            $chuoi = $_GET['key']; //echo $chuoi; exit();
            $LoaiSanPhamModel = new LoaiSanPhamModel();
            $LoaiCha = $LoaiSanPhamModel->getCatUrl($chuoi); //var_dump($LoaiCha); exit();

            if ($LoaiCha) {
                $smarty = new SmartyController();
                $DSLoaiCon = $LoaiSanPhamModel->getSubCat($LoaiCha['ma_loai']);
                //var_dump($DSLoaiCon); exit();

                if ($DSLoaiCon) {
                    // Tạo một mảng chứa các mã loại con
                    $mangMaLoai = array();
                    foreach ($DSLoaiCon as $loaicon) 
                    {
                        $mangMaLoai[] = $loaicon['ma_loai'];
                    }
                    // Tách mảng mã loại con thành 1 chuỗi
                    $chuoiMaLoai = implode(',', $mangMaLoai); //echo $chuoiMaLoai; exit();
                    $SanPhamModel = new SanPhamModel();
                    // phân trang
                    $pager = new Pager();
                    $limit = 8;
                    $start = $pager->findStart($limit); //echo $start; exit();
                    $tongsanpham = $SanPhamModel->TongSanPhamTheoLoaiCon($chuoiMaLoai);  //var_dump($tongsanpham); exit();
                    $pages = $pager->findPages($tongsanpham[0], $limit);
                    $PageLink = $pager->pageLink($_GET['page'], $pages,$chuoi);  //echo ($PageLink); exit();
                    // End phân trang
                    $DSSanPham = $SanPhamModel->SanPhamTheoLoaiConPhanTrang($chuoiMaLoai, $start, $limit);
                    if ($DSSanPham) {
                        $smarty->assign('DSSanPham', $DSSanPham);
                        $smarty->assign('PageLink', $PageLink);
                    } else {
                    	header("location:".path); exit();
                    }
                }

                $smarty->assign('LoaiCha', $LoaiCha);
                $smarty->display('san-pham-theo-loai.tpl');
            }
        }
	}
    public function SanPhamTheoLoaiCon()
    {
        if (isset($_GET['key'])) 
        {
            $chuoi = $_GET['key'];
            $LoaiSanPhamModel = new LoaiSanPhamModel();
            $LoaiCon = $LoaiSanPhamModel->getCatUrl($chuoi);
            //var_dump($LoaiCon); exit();
            if ($LoaiCon) {
                $LoaiCha = $LoaiSanPhamModel->getCatID($LoaiCon['ma_loai_cha']);//dùng cho breadcrumb
                
                $SanPhamModel = new SanPhamModel();
                // phân trang
                $pager = new Pager();
                $limit = 12;
                $start = $pager->findStart($limit); //echo $start; exit();
                $tongsanpham = $SanPhamModel->TongSanPhamTheoLoai($LoaiCon['ma_loai']);
                $pages = $pager->findPages($tongsanpham[0], $limit);
                $url = $LoaiCha['ten_loai_san_pham_url'].'/'.$chuoi;
                $PageLink = $pager->pageLink($_GET['page'], $pages, $url);
                // ./phan trang
                $DSSanPham = $SanPhamModel->SanPhamTheoLoaiPhanTrang($LoaiCon['ma_loai'], $start, $limit);
                $smarty = new SmartyController();
                if ($DSSanPham) {
                    $smarty->assign('DSSanPham', $DSSanPham);
                    $smarty->assign('PageLink', $PageLink);
                } else {
                    header('location:'.path.'/'.$LoaiCha['ten_loai_san_pham_url'].'.html'); exit();
                }

                $smarty->assign('LoaiCon', $LoaiCon);
                $smarty->assign('LoaiCha', $LoaiCha);
                $smarty->display('san-pham-theo-loai.tpl');
            } else {
                header('loaction:'.path); exit();
            }
        } else {
            header('loaction:'.path); exit();
        }
    }
    public function SanPhamTheoChuDe()
    {
        if (isset($_GET['key'])) {
            $chuoi = $_GET['key']; //echo $chuoi; exit();
            $mang = explode('-', $chuoi);
            $ma_chu_de = $mang[count($mang)-1]; //echo $ma_chu_de; exit();
            $ChuDeModel = new ChuDeModel();
            $ChuDe = $ChuDeModel->ChuDeId($ma_chu_de);
            //var_dump($ChuDe); exit();
            if ($ChuDe) {
                $SanPhamModel = new SanPhamModel();
                
                $pager = new Pager();
                $limit = 8;
                $start = $pager->findStart($limit); //echo $start; exit();
                $tongsanpham = $SanPhamModel->TongSanPhamTheoChuDe($ma_chu_de);
                //var_dump($tongsanpham); exit();
                $pages = $pager->findPages($tongsanpham[0], $limit);
                $PageLink = $pager->pageLink($_GET['page'], $pages, $chuoi);
                
                $DSSanPham = $SanPhamModel->DSSanPhamTheoChuDePhanTrang($ma_chu_de);
                //var_dump($DSSanPham); exit();

                $smarty = new SmartyController();
                if ($DSSanPham) {
                    $smarty->assign('DSSanPham', $DSSanPham);
                    $smarty->assign('PageLink', $PageLink);
                } else {
                    header('location:'.path); exit();
                }
                $smarty->assign('ChuDe', $ChuDe);
                $smarty->display('san-pham-theo-loai.tpl');
            } else {
                header('loaction:'.path); exit();
            }
        } else {
            header('loaction:'.path); exit();
        }
    }
    public function ChiTietSanPham()
    {
        if (isset($_GET['key'])) {
            $chuoi = $_GET['key'];
            $mang = explode('-', $chuoi);
            $id = $mang[count($mang) - 1];// $id: mã sản phẩm
            $SanPhamModel = new SanPhamModel();
            $san_pham = $SanPhamModel->SanPhamId($id); //var_dump($san_pham); exit();
            
            //Hiển thị thông tin sách ra trình duyệt
            $smarty = new SmartyController();
            if ($san_pham) {
                $smarty->assign('san_pham', $san_pham);
                //Sản phẩm cùng loại
                $DSSanPhamCungLoai = $SanPhamModel->DSSanPhamCungLoai($id, $san_pham['ma_loai']); 
                //var_dump($DSSanPhamCungLoai);exit();
                if ($DSSanPhamCungLoai) {
                    $smarty->assign('DSSanPhamCungLoai', $DSSanPhamCungLoai);
                }
            }

            //Thêm sách vào giỏ hàng
            if (isset($_POST['btnMua'])) {
                $gio_hang = new Gio_hang();
                $id = $san_pham['ma_san_pham'];
                $ten = $san_pham['ten_san_pham'];
                $dg = $san_pham['gia_ban'];
                $sl = $_POST['soluong'];
                $gio_hang->Them($id, $ten, $dg, $sl);
                //var_dump($_SESSION['giohang']); exit();
            }

            //Khi form comment submit
            if (isset($_SESSION['khachhang']) && isset($_POST['btnBinhLuan'])) {
                $khach_hang = $_SESSION['khachhang'];
                //var_dump($khach_hang); exit();
                $khach_hang_id = $khach_hang['ma_khach_hang'];
                $sach_id = $san_pham['ma_san_pham'];

                //cắm cờ
                $err = false;

                //validate tiêu đề không chứa các kí tự đặc biệt ảnh hưởng truy vấn csdl
                $tieu_de = addslashes($_POST['tieu_de']);
                if (empty($tieu_de)) {
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập tiêu đề.</span>");
                    $err = true;
                } else {
                    //validate mã hóa các thẻ html khi insert vào csdl
                    $tieu_de = htmlspecialchars($tieu_de);
                }
                
                //validate nội dung tin nhắn
                $noi_dung = addslashes($_POST['noi_dung']);
                if (empty($noi_dung)) {
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập nội dung bình luận.</span>");
                    $err = true;
                } else {
                    $noi_dung = htmlentities($noi_dung);
                }

                if ($err) {
                    //gủi thông báo lỗi ra trình duyệt
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập tiêu đề và nội dung đánh giá.</span>");
                } else {
                    //nếu không có lỗi thì insert bình luận vào csdl
                    $BinhLuanModel = new BinhLuanModel();
                    $BinhLuanModel->addComment($tieu_de, $noi_dung, $khach_hang_id, $sach_id);
                    //gủi thông báo thành công ra trình duyệt
                    $smarty->assign('message', "<span style='color:red'>Cảm ơn đánh giá của bạn.</span>");
                }
            }

            //Hiển thị comment ra trình duyệt
            $BinhLuanModel = new BinhLuanModel();
            $DSBinhLuan = $BinhLuanModel->getComment($id);
            //var_dump($DSBinhLuan); exit();
            if ($DSBinhLuan) {
                $smarty->assign('DSBinhLuan', $DSBinhLuan);
            }
            
            $smarty->display('chi-tiet-san-pham.tpl');
        } else {
            header('loaction:'.path); exit();
        }
    }
    public function ThongTinGioHang() 
    {
        $gio_hang = new Gio_hang();
        if (isset($_POST['btnCapNhat'])) {
            $ttgh=$gio_hang->ThongTinGioHang();

            if ($ttgh) {

                foreach($ttgh as $msp => $tt) {
                    $slMoi = $_POST['sl_'.$msp];
                    if ($slMoi != $tt[1]) {
                        $gio_hang->CapNhatGioHang($msp, $slMoi);
                    }
                }
            }
        }
        $ttgh = $gio_hang->ThongTinGioHang();
        //var_dump($ttgh);exit();
        $smarty = new SmartyController();
        if ($ttgh) {
            $gio_hang->TongSoTien();
            $smarty->assign('ttgh', $ttgh);
        }
        $smarty->display('front/gio-hang.tpl');
    }
    public function HuyGioHang() 
    {
        $gio_hang = new Gio_hang();
        $gio_hang->HuyGioHang();
        header('location:'.path.'/khach-hang/gio-hang');
    }
    public function DangKy()
    {
        $smarty = new SmartyController();
        //form đăng ký submit
        if (isset($_POST['btnDangKy'])) {
            $dataErr = $data = array();

            $ten_khach_hang = $_POST['ten_khach_hang'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];

            if ($ten_khach_hang == '' || $email == '' || $mat_khau == '') {
                //đảm bảo các trường không được để trống
                $dataErr = "<span style='color:red'>Vui lòng điền đầy đủ thông tin.</span>";
                $smarty->assign('message_dangky', $dataErr);
            } else {
                //validate input
                if (! preg_match("/^[a-zA-Z ]+$/", $ten_khach_hang)) {
                    $dataErr['ten_khach_hang'] = "Tên chỉ được chứa kí tự alphabets và khoảng trắng.";
                } else {
                    $data['ten_khach_hang'] = $ten_khach_hang;
                }

                if (! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) {
                    $dataErr['email'] = "Email không đúng định dạng.";
                } else {
                    $data['email'] = $email;
                }

                if (strlen($mat_khau) < 6) {
                    $dataErr['mat_khau'] = "Mật khẩu ít nhất 6 kí tự.";
                } else {
                    $data['mat_khau'] = $mat_khau;
                }

                if (! empty($_POST['hide'])){
                    $dataErr['hide'] = 'hide';
                }
            }
            
            // var_dump($dataK);
            // var_dump($dataErr); exit();
            if (! $dataErr)
            {
                //insert dữ liệu khách hàng vào csdl
                $KhachHangModel = new KhachHangModel();
                $data['ma_khach_hang'] = $KhachHangModel->ThemKhachHang($data);
                $_SESSION['khachhang'] = $data;
                //var_dump($_SESSION['khachhang']); exit();
                $smarty->assign('message_dangky', "<span style='color:green'>Đăng ký thành công.</span>");
            } else {
                $smarty->assign('dataErrDangKy', $dataErr);
                $smarty->assign('dataDangKy', $data);
            }
        }

        //submit form đăng nhập
        if (isset($_POST['btnDangNhap'])) {
            //Validate input
            $email = addslashes($_POST['email']);
            $mat_khau = addslashes($_POST['mat_khau']);

            $KhachHangModel = new KhachHangModel();
            $data = $KhachHangModel->getKhachHangDangNhap($email, $mat_khau);

            //var_dump($data); exit();
            if ($data) {
                // tạo session.khachhang
                $arrTTKhachHang = array(
                                'ma_khach_hang'   => $data['ma_khach_hang'],
                                'ten_khach_hang'  => $data['ten_khach_hang'],
                                'email'           => $email
                                 );
                $_SESSION['khachhang'] = $arrTTKhachHang;
                //var_dump($_SESSION['khachhang']); exit();
                $smarty->assign('message_dangnhap', "<span style='color:green'>Đăng nhập thành công.</span>");
            } else {
                $smarty->assign('message_dangnhap', "<span style='color:red'>Vui lòng kiểm tra email và mật khẩu.</span>");
            }
        }
        $smarty->display('front/dang-ky.tpl');
    }
    public function DangXuat()
    {
        if (isset($_SESSION['khachhang'])) {
            session_destroy();
            unset($_SESSION['khachhang']);
        }
        header('location:'.path);
    }
    public function DatHang()
    {
        //kiểm tra tồn tại session[khach_hang], nếu khách hàng đã đăng nhập thì chuyển sang trang yêu cầu khách hàng cung cấp tên người nhận, điện thoại, địa chỉ
        //sau đó gửi mail cho khách hàng để hoàn tất
        //nếu khách hàng chưa đăng nhập thì chuyển sang trang dang-ky.tpl yêu cầu khách hàng đăng nhập nếu đã có tài khoản, hoặc đăng ký khi chưa có tài khoản
        //đăng ký xong hay đăng nhập xong thì chuyển sang trang yêu cầu khách hàng cung cấp tên người nhận, điện thoại, địa chỉ
        //sau đó gửi mail cho khách hàng để hoàn tất
        if (isset($_SESSION['khachhang'])) {

            if (isset($_POST['btnDatHang'])) {
                $dataKhachHang = $_SESSION['khachhang'];
                $dataHoaDon = array(
                                'ma_khach_hang'  => $dataKhachHang['ma_khach_hang'],
                                'ten_nguoi_nhan' => $_POST['ten_nguoi_nhan'],
                                'dia_chi'        => $_POST['dia_chi'],
                                'dien_thoai'     => $_POST['dien_thoai'],
                                'tri_gia'        => $_SESSION['TongSoTien'],
                                );
                //var_dump($dataHoaDon); exit();
                $KhachHangModel = new KhachHangModel();
                if($SoHD = $KhachHangModel->ThemDonDatHang($dataHoaDon))
                {
                    $gio_hang = new Gio_hang();
                    $ttGH = $gio_hang->ThongTinGioHang();
                    //var_dump($ttGH); exit;
                    foreach($ttGH as $msp => $tt)
                    {
                        $ChiTietHD = array(
                                'so_hoa_don'  =>$SoHD,
                                'ma_san_pham' =>$msp,
                                'so_luong'    =>$tt[1],
                                'don_gia'     =>$tt[0],);
                        $KhachHangModel->ThemCTDonDatHang($ChiTietHD);
                    }
                    $gio_hang->HuyGioHang();
                    header('location:'.path.'/khach-hang/thong-tin-don-hang/'.$SoHD); exit();
                }
            }
            $smarty = new SmartyController();
            $smarty->display('front/dat-hang.tpl');
        } else {
            $smarty = new SmartyController();
            //form đăng ký submit
            if (isset($_POST['btnDangKy'])) {
                $dataErr = $data = array();

                $ten_khach_hang = $_POST['ten_khach_hang'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];

                if ($ten_khach_hang == '' || $email == '' || $mat_khau == '') {
                    //đảm bảo các trường không được để trống
                    $dataErr = "<span style='color:red'>Vui lòng điền đầy đủ thông tin.</span>";
                    $smarty->assign('message_dangky', $dataErr);
                } else {
                    //validate input
                    if (! preg_match("/^[a-zA-Z ]+$/", $ten_khach_hang)) {
                        $dataErr['ten_khach_hang'] = "Tên chỉ được chứa kí tự alphabets và khoảng trắng.";
                    } else {
                        $data['ten_khach_hang'] = $ten_khach_hang;
                    }

                    if (! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) {
                        $dataErr['email'] = "Email không đúng định dạng.";
                    } else {
                        $data['email'] = $email;
                    }

                    if (strlen($mat_khau) < 6) {
                        $dataErr['mat_khau'] = "Mật khẩu ít nhất 6 kí tự.";
                    } else {
                        $data['mat_khau'] = $mat_khau;
                    }

                    if (! empty($_POST['hide'])){
                        $dataErr['hide'] = 'hide';
                    }
                }
                
                // var_dump($dataK);
                // var_dump($dataErr); exit();
                if (! $dataErr) {
                    //insert dữ liệu khách hàng vào csdl
                    $KhachHangModel = new KhachHangModel();
                    $data['ma_khach_hang'] = $KhachHangModel->ThemKhachHang($data);
                    $_SESSION['khachhang'] = $data;
                    //var_dump($_SESSION['khachhang']); exit();
                    $smarty->display('front/dat-hang.tpl'); exit();
                } else {
                    $smarty->assign('dataErrDangKy', $dataErr);
                    $smarty->assign('dataDangKy', $data);
                }
            }

            //submit form đăng nhập
            if (isset($_POST['btnDangNhap'])) {
                //Validate input
                $email = addslashes($_POST['email']);
                $mat_khau = addslashes($_POST['mat_khau']);

                $KhachHangModel = new KhachHangModel();
                $data = $KhachHangModel->getKhachHangDangNhap($email, $mat_khau);

                //var_dump($data); exit();
                if ($data) {
                    // tạo session.khachhang
                    $arrTTKhachHang = array(
                                    'ma_khach_hang'   =>$data['ma_khach_hang'],
                                    'ten_khach_hang'  =>$data['ten_khach_hang'],
                                    'email'           =>$email);
                    $_SESSION['khachhang'] = $arrTTKhachHang;
                    //var_dump($_SESSION['khachhang']); exit();
                    $smarty->display('front/dat-hang.tpl'); exit();
                } else {
                    $smarty->assign('message_dangnhap',"<span style='color:red'>Vui lòng kiểm tra email và mật khẩu.</span>");
                }
            }
            $smarty->display('front/dang-ky.tpl');
        }
    }
    public function ThongTinDonHang()
    {
        if (isset($_GET['key'])) {
            $soHD = $_GET['key'];
            //echo $soHD; exit;
            $KhachHangModel = new KhachHangModel();
            $TTDonDatHang = $KhachHangModel->TTDonDatHang($soHD);
            //var_dump($TTDonDatHang); exit;
            if (! $TTDonDatHang) {
                header('location:'.path); exit();
            }
            $smarty = new SmartyController();
            $smarty->assign('DonDatHang', $TTDonDatHang);
            //gui mail thong tin don hang cho khach hang
            $this->guiMail($TTDonDatHang);
            $smarty->display('thong-tin-don-hang.tpl');
        }
    }
    public function guiMail($HoaDon)
    {
        //var_dump($HoaDon); exit;
        require 'library/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        //Khai báo gửi mail bằng SMTP
        $mail->isSMTP();
        //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
        // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành
        // 1 = Thông báo lỗi ở client
        // 2 = Thông báo lỗi cả client và lỗi ở server
        $mail->SMTPDebug = 0;

        $mail->Debugoutput = 'html'; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->SMTPSecure='tls'; //Phương thức mã hóa thư - ssl hoặc tls  
        $mail->Host = "smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port = 587; // cổng để gửi mail
        $mail->SMTPAuth = true; //Xác thực SMTP
        $mail->Username = "kiemtraphpmail@gmail.com"; // Tên đăng nhập tài khoản Gmail
        $mail->Password = "atlantic.com"; //Mật khẩu của gmail

        $mail->setFrom('Atlantic', 'Admin'); // Thông tin người gửi
        $mail->addAddress($HoaDon[0]['email'], $HoaDon[0]['ten_khach_hang']); //Email của người nhận
        $mail->isHTML(true);

        $mail->CharSet = "utf-8"; //Thiết lập định dạng font chữ
        $mail->Subject = 'Thông tin đơn đặt hàng'; //Tiêu đề của thư
        $mail->Body    = $this->MailDonHang($HoaDon); //Nội dung của bức thư
        
        //Tiến hành gửi email và kiểm tra lỗi
        if (! $mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    public function MailDonHang($hoadon)
    {
        $noi_dung='
        <table align="center" border="0" style="border:1px solid #00F;" width="100%">
            <tr>
                <td>Tên khách hàng: '.$hoadon[0]['ten_khach_hang'].'</td>
                <td>Tên người nhận: '.$hoadon[0]['ten_nguoi_nhan'].'</td>
            </tr>
            <tr>
                <td colspan="4">Địa chỉ: '.$hoadon[0]['dia_chi'].'</td>
            </tr>
            <tr>
                <td >Số hóa đơn: '.$hoadon[0]['so_hoa_don'].'</td>
                <td>Ngày đặt: '.$hoadon[0]['ngay_hd'].'</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table align="center" cellspacing="10px" border="0" width="100%">
                        <tr><td>STT</td><td>MÃ SÁCH</td><td>TỰA SÁCH</td><td>ĐƠN GIÁ</td><td>SỐ LƯỢNG</td><td>THÀNH TIỀN</td></tr>';
                $i=1;$tt=0;
                foreach($hoadon as $item)
                {
                    $noi_dung.='<tr align="center">';
                        $noi_dung.= '<td>'.$i.'</td>';
                        $noi_dung.= '<td>'.$item['ma_san_pham'].'</td>';
                        $noi_dung.= '<td>'.$item['ten_san_pham'].'</td>';
                        $noi_dung.= '<td>'.$item['don_gia'].'</td>';
                        $noi_dung.= '<td>'.$item['so_luong'].'</td>';
                        $noi_dung.= '<td>'.number_format($item['don_gia']*$item['so_luong']).'</td>';
                    $noi_dung.='</tr>';
                    $tt=$tt+$item['so_luong']*$item['don_gia'];
                    $i++;
                }
                $noi_dung.='<tr><td colspan="5">Tổng trị giá hóa đơn</td><td>'.number_format($tt).'</td></tr>';    
                $noi_dung.='</table>        
                </td>
            </tr>
        </table>        
        ';
        return $noi_dung;
    }
    public function HoTroKhachHang()
    {
        $smarty = new SmartyController();
        $smarty->display('front/ho-tro-khach-hang.tpl');
    }
    public function GuiYeuCau()
    {
        $smarty = new SmartyController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataErr =  $data = array();
            if (empty($_POST['email'])){
                //thông báo email trống
                $dataErr['email'] = "Vui lòng nhập email.";
            } else{
                //Validate email
                if (! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) {
                    $dataErr['email'] = "Email không hợp lệ";
                } else {
                    $data['email'] = $_POST['email'];
                }
            }

            if (empty($_POST['tieu_de'])){
                //thông báo tiêu đề rỗng
                $dataErr['tieu_de'] = "Vui lòng nhập tiêu đề.";
            } else {
                //loại bỏ các tag html tránh lỗi XSS, thêm \ tránh ảnh hưởng truy vấn
                $data['tieu_de'] = addslashes(strip_tags($_POST['tieu_de']));
            }
            
            if (empty($_POST['noi_dung'])) {
                //thông báo nội dung rỗng
                $dataErr['noi_dung'] = 'Vui lòng nhập nội dung tin nhắn.';
            } else {
                $data['noi_dung'] = addslashes(strip_tags($_POST['noi_dung']));
            }

            //trường ẩn hạn chế spam
            if (! empty($_POST['hide'])){
                $dataErr['hide'] = 'hide';
            }

            // var_dump($data);
            // var_dump($dataErr); exit();
            if (! $dataErr) {
                //nếu không có lỗi xảy ra thì insert yêu cầu của khách hàng vào csdl
                $KhachHangModel = new KhachHangModel();
                if ($KhachHangModel->GuiYeuCau($data)) {
                    $smarty->assign('message',"<span style='color:blue'>Cảm ơn tin nhắn của bạn, chúng tôi sẽ hồi đáp trong thời gian sớm nhất.</span>");
                }
            } else {
                $smarty->assign('dataErr', $dataErr);
                $smarty->assign('data', $data);
            }
        }
        $smarty->display('front/gui-yeu-cau.tpl');
    }
    public function QuenMatKhau()
    {
        $smarty = new SmartyController();
        if (isset($_POST['btnQuenMatKhau'])) {
            $email = $_POST['email'];
            //var_dump($email);
            
            //validate email
            if (! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
                // email ko hợp lệ
                $smarty->assign('alert', 'Email không đúng định dạng.');
                $err = true;
            } else {
                // email hợp lệ
                $err = false;
            }
            
            //Nếu email hợp lệ thì check email trong csdl
            if (! $err) {
                $KhachHangModel = new KhachHangModel();
                $CheckEmail = $KhachHangModel->CheckEmail($email);
                if ($CheckEmail) {
                    //Mã hóa email
                    $email = $CheckEmail['email'];
                    $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
                    $hash = hash('sha512', $salt.$email);
                    //Gửi link reset password qua mail cho khách hàng
                    $this->SendMailResetPassword($email,$hash);
                    $smarty->assign('alert', "Vui lòng check mail để đặt lại mật khẩu.");
                } else {
                    $smarty->assign('alert', "Tài khoản này không tồn tại, <a href='".path."/khach-hang/dang-ky'>đăng ký.</a>");
                }
            }
        }
        $smarty->display('front/quen-mat-khau.tpl');
    }
    public function SendMailResetPassword($email,$hash)
    {
        //var_dump($HoaDon); exit;
        require 'library/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;

        $mail->Debugoutput = 'html';
        $mail->SMTPSecure='tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = "kiemtraphpmail@gmail.com";
        $mail->Password = "atlantic.com";

        $mail->setFrom('Atlantic', 'Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->CharSet = "utf-8";
        $mail->Subject = 'Reset Password';
        $mail->Body    = $this->MailResetPass($hash); // nội dung mail reset pass
        
        //Tiến hành gửi email và kiểm tra lỗi
        if (! $mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    public function MailResetPass($hash)
    {
        $url = path.'/khach-hang/reset-password/'.$hash;
        $noi_dung = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $url . "\n\nThanks,\nThe Administration";
        return $noi_dung;
    }
    public function ResetPassWord()
    {
        $smarty = new SmartyController();
        if (isset($_POST['btnResetPassWord'])) {
            $postemail = $_POST['email']; // giá trị email nhập vào
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $getemail = $_GET['key']; // giá trị email GET
            // Mã hóa email nhập vào để so sánh với mail từ biến GET
            $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
            $hash = hash('sha512', $salt.$postemail);

            // var_dump($getemail);
            // var_dump($hash);

            // So sánh mail GET và POST
            if ($hash == $getemail) {

                if ($password == $confirmpassword) {
                    //Update password vao csdl
                    $KhachHangModel = new KhachHangModel();
                    if ($KhachHangModel->UpdatePassWord($password,$postemail)){
                        $smarty->assign('alert',"Your password has been successfully reset.");
                    }
                } else {
                    $smarty->assign('alert',"Your password's do not match.");
                }
            } else {
                $smarty->assign('alert',"Your password reset key is invalid.");
            }
        }
        $smarty->display('front/dat-lai-mat-khau.tpl');
    }
}// ./class FrontController
?>