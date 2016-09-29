<?php
include_once('controllers/SmartyController.php');
include_once('controllers/HelperController.php');
include_once('models/CategoryModel.php');
include_once('models/CommentModel.php');
include_once('models/ProductModel.php');
include_once('models/InvoiceModel.php');
include_once('models/ContactModel.php');
include_once('models/SubjectModel.php');
include_once('models/AdminModel.php');

class AdminController
{
    public function loginAdmin()
    {
        $smarty = new SmartyController();

        //nếu cookie.admin đã tồn tại thì check tên đăng nhập và mật khẩu từ cookie với csdl
        $COOKIE_NAME = "admin";
        $COOKIE_TIME = (3600 * 24 * 7); // 7 days

        if (isset($_COOKIE[$COOKIE_NAME])) {
            //var_dump($_COOKIE[$COOKIE_NAME]);
            parse_str($_COOKIE[$COOKIE_NAME]);
            //kiểm tra user và pass với CSDL
            $adminModel = new AdminModel();
            $admin = $adminModel->getInfoAdmin($username, $password);
            if ($admin) {
                //Tạo session.admin
                $infoAdmin = array(
                    'ten_nguoi_dung' => $admin['ho_ten'],
                    'tendn'          => $admin['ten_dang_nhap']);
                $_SESSION['admin'] = $infoAdmin;
                header('location:'.path.'/quan-tri.html'); exit();
            }
        }

        //khi submit form đăng nhập
        if (isset($_POST['btnDangNhapAdmin'])) {
            //validate bien post
            $username = addslashes($_POST['ten_dang_nhap']);
            $pass = addslashes($_POST['mat_khau']);

            //kiểm tra user và pass với CSDL
            $adminModel = new AdminModel();
            $admin = $adminModel->getInfoAdmin($username, md5($pass));

            if ($admin) {
                //Tạo session.admin
                $infoAdmin = array(
                    'ten_nguoi_dung' => $admin['ho_ten'],
                    'tendn'          => $admin['ten_dang_nhap']
                    );
                $_SESSION['admin'] = $infoAdmin;
                if (isset($_POST['remember'])) {
                    $COOKIE_VALUE = "username=".$admin['ten_dang_nhap']."&password=".$admin['mat_khau'];
                    setcookie($COOKIE_NAME, $COOKIE_VALUE, time() + $COOKIE_TIME);
                    //var_dump($_COOKIE['admin']); exit();
                }
                header('location:'.path.'/quan-tri.html'); exit();
            }
            else
                $smarty->assign('err','Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.');
        }
        $smarty->display('admin/login.tpl');
    }
    public function manageSystem()
    {
        // kiểm tra tồn tại của session.nguoi_dung
        if (! isset($_SESSION['admin'])) {
            // var_dump($_SESSION['nguoi_dung']);exit();
            // bắt buộc đăng nhập
            header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
        } else {
            // cho phép vào trang quản trị
            $smarty = new SmartyController();
            $smarty->display('admin/admin.tpl');
        }
    }
    public function logoutAdmin() {
        session_destroy();
        unset($_SESSION['admin']);
        if (isset($_COOKIE['admin'])) {
            setcookie("admin", "", time() - 3600);
        }
        header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
    }
    public function manageProducts()
    {
        $adminModel = new AdminModel();
        $products = $adminModel->getProductAdmin();
        $smarty = new SmartyController();
        if ($products) {
            $smarty->assign('DSSanPham', $products);
            $smarty->display('admin/product.tpl');    
        } else {
            header('location:'.path.'/quan-tri/san-pham.html'); exit();
        }
    }
    public function deleteProduct()
    {
        if (isset($_GET['key'])) {
            $idProduct = $_GET['key'];
            $productModel = new ProductModel();
            $product = $productModel->getProductById($idProduct); //var_dump($product); exit();
            if(file_exists('./public/hinh_san_pham/'.$product['hinh'])) {
                unlink('./public/hinh_san_pham/'.$product['hinh']);
                $admin = new AdminModel();
                $admin->deleteProduct($idProduct);
            }
            header('location:'.path.'/quan-tri/san-pham.html');
        }
    }
    public function addProduct()
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
        $arrayErr = array(
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
                    $img = $_FILES['hinh'];
                    //var_dump($hinh);
                    $data['hinh'] = time().'-'.$img['name'];
                    //var_dump($data['hinh']); exit();
                    
                    if (move_uploaded_file($img['tmp_name'],'./public/hinh_san_pham/'.$data['hinh'])) {
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
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        //hiển thị mảng thông tin sản phẩm trả về trình duyệt khi đã nhập
        $smarty->assign('data', $data);
        //hiển thị mảng báo lỗi
        $smarty->assign('mangErr', $arrayErr);
        //hiển thị list loại sản phẩm
        $categoryModel = new CategoryModel();
        $smarty->assign('DSLoaiSanPham', $categoryModel->getCat());
        $subjectModel = new SubjectModel();
        $smarty->assign('DanhSachChuDe', $subjectModel->getSubject());
        $smarty->assign('alert', $alert);
        $smarty->display('admin/add_product.tpl');
    }
    public function updateProduct()
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
            $idProduct = $_GET['key']; //echo $idProduct; exit();
        } else {
            header('location:'.path.'/quan-tri/san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat(); 
        //var_dump($categories); exit();

        //hiển thị list danh sách chủ đề ra trình duyệt để lựa chọn update
        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->getSubject();
        //var_dump($subjects); exit();

        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $productModel = new ProductModel();
        $products = $productModel->getProductById($idProduct); 
        //var_dump($products); exit();
        $oldImgage = $products['hinh'];
        //var_dump($oldImage); exit();
        if (! $products) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/san-pham.html');
            exit();
        }
        $arrayErr = array(
            'ten_san_pham'     =>'',
            'ten_san_pham_url' =>'',
            'mo_ta'            =>'',
            'gia_bia'          =>'',
            'gia_ban'          =>'',
            'hinh'             =>'');
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatSanPham'])) {
            $products = array(
                'ma_san_pham'        =>$idProduct,
                'ten_san_pham'       =>$_POST['ten_san_pham'], 
                'ten_san_pham_url'   =>$_POST['ten_san_pham_url'], 
                'ma_loai'            =>$_POST['ma_loai'], 
                'mo_ta'              =>$_POST['mo_ta'], 
                'gia_bia'            =>$_POST['gia_bia'], 
                'gia_ban'            =>$_POST['gia_ban'],
                'hinh'               =>$_FILES['hinh'],
                'chu_de_id'          =>$_POST['chu_de_id'],
                );
            //var_dump($products);exit();
            $check = new HelperController();
            if ($check->checkData($products)) {
                //nếu không có lỗi xảy ra đối với các trường bắt buộc
                //tiến hành kiểm tra trường upload hình
                $newImage = $_FILES['hinh']; 
                //var_dump($newImage); exit();
                if ($check->checkimage(! $newImage)) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    // thực hiện upload hình vào csdl
                    $imageName = time().'-'.$newImage['name'];
                    if (move_uploaded_file($newImage['tmp_name'],'./public/hinh_san_pham/'.$imageName)){
                        //nếu upload thành công ta sẽ xóa hình cũ đi
                        if (file_exists('./public/hinh_san_pham/'.$oldImgage)) {
                            unlink('./public/hinh_san_pham/'.$oldImgage);
                        }
                        //thực hiện sản phẩm update vào csdl
                        $products['hinh'] = $imageName;
                        $admin = new AdminModel();
                        $admin->updateProduct($products);
                        //Thông báo ra trình duyệt
                        $alert = 'Cập nhật sản phẩm thành công!';
                    }
                }
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $products);
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('DSLoaiSanPham', $categories);
        $smarty->assign('DanhSachChuDe', $subjects);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/update_product.tpl');
    }
    public function manageCategories()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat(); 
        //var_dump($categories); exit();
        $smarty = new SmartyController();
        if ($categories) {
            $smarty->assign('DSLoaiSanPham', $categories);
            $smarty->display('admin/categories.tpl');    
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html'); exit();
        }
    }
    public function deleteCategory()
    {
        //echo 'ok';
        if (isset($_GET['key'])) {
            //var_dump($_GET['key']); exit();
            $idCategory = $_GET['key'];
            $adminModel = new AdminModel();
            $adminModel->deleteCat($idCategory);
            header('location:'.path.'/quan-tri/loai-san-pham.html');
        }
    }
    public function addCategory()
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
        $arrayErr = array(
                'ten_loai'=>'',
                'ten_loai_san_pham_url'=>'',
                );

        //Thêm loại cha
        if (isset($_POST['btnThemLoaiCha'])) {
            $data['loaicha'] = array(
                //'ten_loai'             => $_POST['ten_loai'],
                'ten_loai_san_pham_url'    => $_POST['ten_loai_san_pham_url'],
                );
            //var_dump($data); exit();
            $check = new HelperController();
            if ($check->checkDataCategory($data['loaicha'])) {
                //Hàm trả về true false
                // insert sản phẩm vào csdl
                $adminModel = new AdminModel();
                $adminModel->addCat($data['loaicha']);
                $alert['loaicha'] = 'Thêm thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
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
            if ($check->checkDataCategory($data['loaicon'])) {
                // insert sản phẩm vào csdl
                $adminModel = new AdminModel();
                $adminModel->addSubCat($data['loaicon']);
                $alert['loaicon'] = 'Thêm thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
                $alert['loaicon'] = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        
        $smarty = new SmartyController();
        $smarty->assign('data1', $data['loaicha']);
        $smarty->assign('data2', $data['loaicon']);
        //hiển thị mảng báo lỗi
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('alert', $alert);
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat();
        //var_dump($categories); exit();
        $smarty->assign('DSLoaiSanPham', $categories);
        $smarty->display('admin/add_category.tpl');
    }
    public function updateCategory()
    {
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            //mã sản phẩm
            $idProduct = $_GET['key']; //echo $idProduct; exit();
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat();
        //var_dump($categories); exit();
        //hiển thị thông tin loai sản phẩm muốn cập nhập ra trình duyệt
        $data = $categoryModel->getCatByID($idProduct); //var_dump($data); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        $arrayErr = array(
            'ten_loai'              =>'',
            'ten_loai_san_pham_url' =>'',
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            $data = array(
                'ma_loai'                     => $idProduct,
                'ten_loai'                    => $_POST['ten_loai'],
                'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url']
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataCategory($data)) {
                //thực hiện sản phẩm update vào csdl
                $adminModel = new AdminModel();
                $adminModel->updateCat($data);
                //Thông báo ra trình duyệt
                $alert = 'Cập nhật thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('DSLoaiSanPham', $categories);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/update_category.tpl');
    }
    public function updateSubCategory()
    {
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            //mã sản phẩm
            $idProduct = $_GET['key']; //echo $key; exit();
        } else {
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        //hiển thị list danh sách loại ra trình duyệt để lựa chọn update
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat(); //var_dump($categories); exit();
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $data = $categoryModel->getCatByID($idProduct); 
        //var_dump($data); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/loai-san-pham.html');
            exit();
        }
        $arrayErr = array(
            'ten_loai'              =>'',
            'ten_loai_san_pham_url' =>'',
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            $data = array(
                'ma_loai'                     => $idProduct,
                'ten_loai'                    => $_POST['ten_loai'],
                'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url'],
                'ma_loai_cha'                 => $_POST['ma_loai']
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataCategory($data)) {
                //thực hiện sản phẩm update vào csdl
                $admin = new AdminModel();
                $admin->updateSubCat($data);
                //Thông báo ra trình duyệt
                $alert = 'Cập nhật thành công!';
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('DSLoaiSanPham', $categories);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/update_subcategory.tpl');
    }
    public function manageSubject()
    {
        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->getSubject();
        //var_dump($subjects); exit();
        
        if ($subjects) {
            $smarty = new SmartyController();
            $smarty->assign('DSChuDe', $subjects);
            $smarty->display('admin/subject.tpl');
        } else {
            header('location:'.path.'/quan-tri/them-chu-de-sach.html');
            exit();
        }
    }
    public function addSubject()
    {
        header('location:'.path.'/quan-tri/subject.html');
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
        //     if($check->checkDataSubject($data))//Hàm trả về true false
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
        // $smarty->display('admin/add_subject.tpl');
    }
    public function updateSubject()
    {
        //Validate biến GET: nếu biến GET tồn tại và kiểu nguyên lớn hơn 0
        if (isset($_GET['key'])) {
            //mã sản phẩm
            $stringUrl = $_GET['key']; 
            //echo $stringUrl; exit();
            $array = explode('-', $stringUrl); 
            //var_dump($array); exit;
            $idSubject = $array[count($array)-1];
        } else {
            header('location:'.path.'/quan-tri/chu-de.html');
            exit();
        }
        //hiển thị thông tin sản phẩm muốn cập nhập ra trình duyệt
        $subjectModel = new SubjectModel();
        $data = $subjectModel->getSubjectID($idSubject); //var_dump($data); exit();
        $oldImgage = $data['hinh'];
        //var_dump($data['hinh']); exit();
        if (! $data) {
            //có thể người dùng nhập biến GET bất kỳ
            //nếu GET mã sản phẩm không tồn tại trong csdl nên ko thể có sản phẩm để xuất ra
            header('location:'.path.'/quan-tri/chu-de.html'); exit();
        }
        $arrayErr = array(
            'ten_chu_de'     =>'',
            'ten_chu_de_url' =>'',
            'mo_ta'          =>'',
            'hinh'           =>''
            );
        $alert = '';

        //Khi submit
        if (isset($_POST['btnCapNhatChuDe'])) {
            $data = array(
                'ma_chu_de'          =>$idSubject,
                'ten_chu_de'         =>$_POST['ten_chu_de'], 
                'ten_chu_de_url'     =>$_POST['ten_chu_de_url'], 
                'mo_ta'              =>$_POST['mo_ta'], 
                'hinh'               =>$_FILES['hinh'],
                );
            //var_dump($data);exit();
            $check = new HelperController();
            if ($check->checkDataSubject($data)) {
                //nếu không có lỗi xảy ra đối với các trường bắt buộc
                //tiến hành kiểm tra trường upload hình
                $newImage = $_FILES['hinh']; //var_dump($hinh); exit();

                if ($check->checkimage(! $newImage)) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    // thực hiện upload hình vào csdl
                    $imageName = time().'-'.$newImage['name'];
                
                    if (move_uploaded_file($newImage['tmp_name'],'./public/images/'.$imageName)) {
                        //nếu upload thành công ta sẽ xóa hình cũ đi
                        if (file_exists('./public/images/'.$oldImgage)) {
                            unlink('./public/images/'.$oldImgage);
                        }
                        //thực hiện sản phẩm update vào csdl
                        $data['hinh'] = $imageName;
                        $admin = new AdminModel();
                        $admin->updateSubject($data);
                        //Thông báo ra trình duyệt
                        $alert = 'Cập nhật thành công!';
                    }
                }
            } else {
                //thông báo lỗi các trường bắt buộc ko được để trống
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/update_subject.tpl');
    }
    public function manageInvoices()
    {
    	$invoiceModel = new InvoiceModel();
    	$invoices = $invoiceModel->getInvoices();
    	//var_dump($invoices); exit();
    	$smarty = new SmartyController();
    	if ($invoices) {
    		$smarty->assign('DSHoaDon', $invoices);
    	}
    	$smarty->display('admin/invoices.tpl');
    }
    public function manageInvoiceDetails()
    {
    	$smarty = new SmartyController();
    	if (isset($_GET['key'])) {
            //chua validate bien GET
    		$idInvoice = $_GET['key'];
    		$invoiceModel = new InvoiceModel();
    		$invoices = $invoiceModel->getInfoInvoice($idInvoice);
    		//var_dump($invoices); exit();
    		if ($invoicesDetail) {
    			$smarty->assign('ChiTietDonHang',$invoices);
    		} else {
    			header('location:'.path.'/quan-tri/don-hang.html'); exit();
    		}
    	} else {
    		header('location:'.path.'/quan-tri/don-hang.html'); exit();
    	}
    	$smarty->display('admin/invoice_details.tpl');
    }
    public function manageRequireClient()
    {
        $contactModel = new ContactModel();
        $requestClient = $contactModel->getRequireClient();
        //var_dump($requestClient); exit();
        $smarty = new SmartyController();
        if ($requestClient) {
            $smarty->assign('DSYeuCauKhachHang', $requestClient);
        }
        $smarty->display('admin/contact.tpl');
    }
    public function manageComment()
    {
        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentAdmin();
        //var_dump($comments); exit();
        $smarty = new SmartyController();
        if ($comments)
        {
            $smarty->assign('DSBinhLuanAdmin', $comments);
        }
        $smarty->display('admin/comment.tpl');
    }
    public function deleteComment()
    {
        if (isset($_GET['key'])) {
            $idComment = $_GET['key'];
            //var_dump($id); exit();
            $smarty = new SmartyController();
            $commentModel = new CommentModel();
            $commentModel->deleteComment($idComment);
            header('location:'.path.'/quan-tri/binh-luan.html');
            exit();
        } else {
            header('location:'.path.'/quan-tri/binh-luan.html'); exit();
        }
    }
}// ./ AdminController
?>