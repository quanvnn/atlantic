<?php
include_once('controllers/SmartyController.php');
include_once('models/CategoryModel.php');
include_once('models/ClientModel.php');
include_once('models/CommentModel.php');
include_once('models/ProductModel.php');
include_once('models/SubjectModel.php');
include_once('library/Gio_hang.php');
include_once('library/Pager.php');

class FrontController
{
	public function index()
	{
        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->getSubject(); //var_dump($subjects); exit();
		$smarty = new SmartyController;
        $smarty->assign('DSChuDe', $subjects);
		$smarty->display('home.tpl');
	}
	public function getProductsInCat()
	{
		//sản phẩm theo loại cha chính là danh sách sản phẩm theo loại con của thằng loại cha
        //nhận url loại cha từ GET -> truy xuất mã loại cha -> truy xuất danh sách loại con dựa vào mã loại cha
        //-> tạo một mảng chứa các mã loại con từ danh sách loại con
        //-> tách mảng thành chuỗi mã loại để truy xuất danh sách sản phẩm dựa vào chuỗi mã loại đó
        if (isset($_GET['key'])) {
            
            $stringUrl = $_GET['key']; 
            //echo $chuoi; exit();
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getCatByUrl($stringUrl); 
            //var_dump($categories); exit();

            if ($categories) {
                $smarty = new SmartyController();
                $subCategories = $categoryModel->getSubCat($categories['ma_loai']);
                //var_dump($subCategories); exit();

                if ($subCategories) {
                    // Tạo một mảng chứa các mã loại con
                    $arrayIdCategories = array();

                    foreach ($subCategories as $subCategory) {
                        $arrayIdCategories[] = $subCategory['ma_loai'];
                    }

                    // Tách mảng mã loại con thành 1 chuỗi
                    $stringIdCategory = implode(',', $arrayIdCategories); 
                    //echo $stringIdCategory; exit();
                    $productModel = new ProductModel();
                    // phân trang
                    $pager = new Pager();
                    $limit = 8;
                    $start = $pager->findStart($limit); //echo $start; exit();
                    $countProduct = $productModel->countProductsInSubCat($stringIdCategory);  
                    //var_dump($countProduct); exit();
                    $pages = $pager->findPages($countProduct[0], $limit);
                    $pageLink = $pager->pageLink($_GET['page'], $pages, $stringUrl);  
                    //echo ($pageLink); exit();
                    // End phân trang
                    $products = $productModel->getProductsInSubCat($stringIdCategory, $start, $limit);
                    if ($products) {
                        $smarty->assign('DSSanPham', $products);
                        $smarty->assign('PageLink', $pageLink);
                    } else {
                    	header("location:".path); exit();
                    }
                }

                $smarty->assign('LoaiCha', $categories);
                $smarty->display('front/product_in_category.tpl');
            }  
        }
	}
    public function getProductsInSubCat()
    {
        if (isset($_GET['key'])) 
        {
            $stringUrl = $_GET['key'];
            //echo $stringUrl; exit();
            $categoryModel = new CategoryModel();
            $subCategories = $categoryModel->getCatByUrl($stringUrl);
            //var_dump($subCategories); exit();
            if ($subCategories) {
                //dùng cho breadcrumb
                $categories = $categoryModel->getCatByID($subCategories['ma_loai_cha']);
                //var_dump($categories); exit();

                // phân trang
                $pager = new Pager();
                $limit = 12;
                $start = $pager->findStart($limit); 
                //echo $start; exit();

                $productModel = new ProductModel();
                $countProduct = $productModel->countProductsInSubCat($subCategories['ma_loai']);
                //var_dump($countProduct); exit();
                $pages = $pager->findPages($countProduct[0], $limit);
                $url = $categories['ten_loai_san_pham_url'].'/'.$stringUrl;
                $pageLink = $pager->pageLink($_GET['page'], $pages, $url);
                // ./phan trang
                $products = $productModel->getProductsInSubCat($subCategories['ma_loai'], $start, $limit);
                //var_dump($products); exit();
                $smarty = new SmartyController();
                if ($products) {
                    $smarty->assign('DSSanPham', $products);
                    $smarty->assign('PageLink', $pageLink);
                } else {
                    header('location:'.path.'/'.$categories['ten_loai_san_pham_url'].'.html'); exit();
                }

                $smarty->assign('LoaiCon', $subCategories);
                $smarty->assign('LoaiCha', $categories);
                $smarty->display('front/product_in_category.tpl');
            } else {
                header('loaction:'.path); exit();
            }
        } else {
            header('loaction:'.path); exit();
        }
    }

    public function getProductInSubject()
    {
        if (isset($_GET['key'])) {
            $stringUrl = $_GET['key']; 
            //echo $stringUrl; exit();
            $array = explode('-', $stringUrl);
            $idSubject = $array[count($array)-1]; 
            //echo $idSubject; exit();
            $subjectModel = new SubjectModel();
            $subjects = $subjectModel->getSubjectID($idSubject);
            //var_dump($subjects); exit();
            if ($subjects) {
                $productModel = new ProductModel();
                
                $pager = new Pager();
                $limit = 8;
                $start = $pager->findStart($limit); //echo $start; exit();
                $countProduct = $productModel->countProductsInSubject($idSubject);
                //var_dump($countProduct); exit();
                $pages = $pager->findPages($countProduct[0], $limit);
                $pageLink = $pager->pageLink($_GET['page'], $pages, $chuoi);
                
                $products = $productModel->getProductInSubject($idSubject);
                //var_dump($products); exit();

                $smarty = new SmartyController();
                if ($products) {
                    $smarty->assign('DSSanPham', $products);
                    $smarty->assign('PageLink', $pageLink);
                } else {
                    header('location:'.path); exit();
                }
                $smarty->assign('ChuDe', $subjects);
                $smarty->display('front/product_in_category.tpl');
            } else {
                header('loaction:'.path); exit();
            }
        } else {
            header('loaction:'.path); exit();
        }
    }

    

    public function getProductDetails()
    {
        if (isset($_GET['key'])) {
            $stringUrl = $_GET['key'];
            //echo $stringUrl; exit();
            $array = explode('-', $stringUrl);
            $idProduct = $array[count($array) - 1];
            // $idProduct: mã sản phẩm
            $productModel = new ProductModel();
            $products = $productModel->getProductById($idProduct); 
            //var_dump($products); exit();
            
            //Hiển thị thông tin sách ra trình duyệt
            $smarty = new SmartyController();
            if ($products) {
                $smarty->assign('san_pham', $products);
                //Sản phẩm cùng loại
                $productInTheSameCategory = $productModel->getProductsFromTheSameCat($idProduct, $products['ma_loai']); 
                //var_dump($productInTheSameCategory);exit();
                if ($productInTheSameCategory) {
                    $smarty->assign('DSSanPhamCungLoai', $productInTheSameCategory);
                }
            }

            //Thêm sách vào giỏ hàng
            if (isset($_POST['btnMua'])) {
                $shoppingCart = new Gio_hang();
                $idProduct = $products['ma_san_pham'];
                $nameProduct = $products['ten_san_pham'];
                $price = $products['gia_ban'];
                $number = $_POST['soluong'];
                $shoppingCart->Them($idProduct, $nameProduct, $price, $number);
                //var_dump($_SESSION['giohang']); exit();
            }

            //Khi form comment submit
            if (isset($_SESSION['khachhang']) && isset($_POST['btnBinhLuan'])) {
                $clients = $_SESSION['khachhang'];
                //var_dump($clients); exit();
                $idClient = $clients['ma_khach_hang'];
                $idProduct = $products['ma_san_pham'];

                //cắm cờ
                $err = false;

                //validate tiêu đề không chứa các kí tự đặc biệt ảnh hưởng truy vấn csdl
                $title = addslashes($_POST['tieu_de']);
                if (empty($title)) {
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập tiêu đề.</span>");
                    $err = true;
                } else {
                    //validate mã hóa các thẻ html khi insert vào csdl
                    $title = htmlspecialchars($title);
                }
                
                //validate nội dung tin nhắn
                $content = addslashes($_POST['noi_dung']);
                if (empty($content)) {
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập nội dung bình luận.</span>");
                    $err = true;
                } else {
                    $content = htmlentities($content);
                }

                if ($err) {
                    //gủi thông báo lỗi ra trình duyệt
                    $smarty->assign('message',"<span style='color:red'>Vui lòng nhập tiêu đề và nội dung đánh giá.</span>");
                } else {
                    //nếu không có lỗi thì insert bình luận vào csdl
                    $commentModel = new CommentModel();
                    $commentModel->addComment($title, $content, $idClient, $idProduct);
                    //gủi thông báo thành công ra trình duyệt
                    $smarty->assign('message', "<span style='color:red'>Cảm ơn đánh giá của bạn.</span>");
                }
            }

            //Hiển thị comment ra trình duyệt
            $commentModel = new CommentModel();
            $comments = $commentModel->getComment($idProduct);
            //var_dump($comments); exit();
            if ($comments) {
                $smarty->assign('DSBinhLuan', $comments);
            }
            
            $smarty->display('front/product_details.tpl');
        } else {
            header('loaction:'.path); exit();
        }
    }

    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    // 29/9

    
    public function getInfoCart() 
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
        $smarty->display('front/shopping_cart.tpl');
    }
    public function deleteCart() 
    {
        $gio_hang = new Gio_hang();
        $gio_hang->HuyGioHang();
        header('location:'.path.'/khach-hang/gio-hang');
    }
    public function createAccount()
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
                $KhachHangModel = new ClientModel();
                $data['ma_khach_hang'] = $KhachHangModel->getClient($data);
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

            $KhachHangModel = new ClientModel();
            $data = $KhachHangModel->getLogin($email, $mat_khau);

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
        $smarty->display('front/login.tpl');
    }
    public function logoutClient()
    {
        if (isset($_SESSION['khachhang'])) {
            session_destroy();
            unset($_SESSION['khachhang']);
        }
        header('location:'.path);
    }
    public function checkout()
    {
        //kiểm tra tồn tại session[khach_hang], nếu khách hàng đã đăng nhập thì chuyển sang trang yêu cầu khách hàng cung cấp tên người nhận, điện thoại, địa chỉ
        //sau đó gửi mail cho khách hàng để hoàn tất
        //nếu khách hàng chưa đăng nhập thì chuyển sang trang login.tpl yêu cầu khách hàng đăng nhập nếu đã có tài khoản, hoặc đăng ký khi chưa có tài khoản
        //đăng ký xong hay đăng nhập xong thì chuyển sang trang yêu cầu khách hàng cung cấp tên người nhận, điện thoại, địa chỉ
        //sau đó gửi mail cho khách hàng để hoàn tất
        if (isset($_SESSION['khachhang'])) 
        {
            //var_dump($_SESSION['khachhang']); exit();
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
                $KhachHangModel = new ClientModel();
                if($SoHD = $KhachHangModel->addInvoices($dataHoaDon))
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
                        $KhachHangModel->addDetailInvoices($ChiTietHD);
                    }
                    $gio_hang->HuyGioHang();
                    header('location:'.path.'/khach-hang/thong-tin-don-hang/'.$SoHD); exit();
                }
            }
            $smarty = new SmartyController();
            $smarty->display('front/checkout.tpl');
        } 
        else 
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
                if (! $dataErr) {
                    //insert dữ liệu khách hàng vào csdl
                    $KhachHangModel = new ClientModel();
                    $data['ma_khach_hang'] = $KhachHangModel->getClient($data);
                    $_SESSION['khachhang'] = $data;
                    //var_dump($_SESSION['khachhang']); exit();
                    $smarty->display('front/checkout.tpl'); exit();
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

                $KhachHangModel = new ClientModel();
                $data = $KhachHangModel->getLogin($email, $mat_khau);

                //var_dump($data); exit();
                if ($data) {
                    // tạo session.khachhang
                    $arrTTKhachHang = array(
                                    'ma_khach_hang'   =>$data['ma_khach_hang'],
                                    'ten_khach_hang'  =>$data['ten_khach_hang'],
                                    'email'           =>$email);
                    $_SESSION['khachhang'] = $arrTTKhachHang;
                    //var_dump($_SESSION['khachhang']); exit();
                    $smarty->display('front/checkout.tpl'); exit();
                } else {
                    $smarty->assign('message_dangnhap',"<span style='color:red'>Vui lòng kiểm tra email và mật khẩu.</span>");
                }
            }
            $smarty->display('front/login.tpl');
        }
    }
    public function getInfoInvoice()
    {
        if (isset($_GET['key'])) {
            $soHD = $_GET['key'];
            //echo $soHD; exit;
            $KhachHangModel = new ClientModel();
            $TTDonDatHang = $KhachHangModel->getInfoInvoicesByID($soHD);
            //var_dump($TTDonDatHang); exit;
            if (! $TTDonDatHang) {
                header('location:'.path); exit();
            }
            $smarty = new SmartyController();
            $smarty->assign('DonDatHang', $TTDonDatHang);
            //gui mail thong tin don hang cho khach hang
            $this->guiMail($TTDonDatHang);
            $smarty->display('front/invoice_details.tpl');
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
    public function careClient()
    {
        $smarty = new SmartyController();
        $smarty->display('front/client_care.tpl');
    }
    public function sendRequest()
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
                $KhachHangModel = new ClientModel();
                if ($KhachHangModel->addRequire($data)) {
                    $smarty->assign('message',"<span style='color:blue'>Cảm ơn tin nhắn của bạn, chúng tôi sẽ hồi đáp trong thời gian sớm nhất.</span>");
                }
            } else {
                $smarty->assign('dataErr', $dataErr);
                $smarty->assign('data', $data);
            }
        }
        $smarty->display('front/send_require.tpl');
    }
    public function forgotPassWord()
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
                $KhachHangModel = new ClientModel();
                $CheckEmail = $KhachHangModel->checkEmail($email);
                if ($CheckEmail) {
                    //Mã hóa email
                    $email = $CheckEmail['email'];
                    $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
                    $hash = hash('sha512', $salt.$email);
                    //Gửi link reset password qua mail cho khách hàng
                    $this->sendMailResetPassword($email,$hash);
                    $smarty->assign('alert', "Vui lòng check mail để đặt lại mật khẩu.");
                } else {
                    $smarty->assign('alert', "Tài khoản này không tồn tại, <a href='".path."/khach-hang/dang-ky'>đăng ký.</a>");
                }
            }
        }
        $smarty->display('front/forgot.tpl');
    }
    public function sendMailResetPassword($email,$hash)
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
    public function resetPassWord()
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
                    $KhachHangModel = new ClientModel();
                    if ($KhachHangModel->updatePassWord($password,$postemail)){
                        $smarty->assign('alert',"Your password has been successfully reset.");
                    }
                } else {
                    $smarty->assign('alert',"Your password's do not match.");
                }
            } else {
                $smarty->assign('alert',"Your password reset key is invalid.");
            }
        }
        $smarty->display('front/reset_password.tpl');
    }
}// ./class FrontController
?>