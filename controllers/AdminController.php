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

/**
 * Handle requests and respone Admin tool.
 */
class AdminController
{
    /**
     * Sign up admin account.
     *
     * If have cookie, check info cookie with database then create session admin.
     * Else, admin must login
     *
     * @return null
     */
    public function loginAdmin()
    {
        $smarty = new SmartyController();

        // Cookie name
        $COOKIE_NAME = "admin";

        // Cookie time
        $COOKIE_TIME = (3600 * 24 * 7);

        // Check cookie
        if (isset($_COOKIE[$COOKIE_NAME])) {
            parse_str($_COOKIE[$COOKIE_NAME]);

            // Check user name and pass with database
            $adminModel = new AdminModel();
            $admin = $adminModel->getInfoAdmin($username, $password);

            if ($admin) {
                //Create session admin
                $infoAdmin = array(
                    'ten_nguoi_dung' => $admin['ho_ten'],
                    'tendn'          => $admin['ten_dang_nhap']);
                $_SESSION['admin'] = $infoAdmin;
                header('location:'.path.'/quan-tri.html'); exit();
            }
        }

        // Submit form login
        if (isset($_POST['btnDangNhapAdmin'])) {
            
            // Validate user name
            $username = addslashes($_POST['ten_dang_nhap']);

            // Validate pass
            $pass = addslashes($_POST['mat_khau']);

            // Check user name and pass with database
            $adminModel = new AdminModel();
            $admin = $adminModel->getInfoAdmin($username, md5($pass));

            if ($admin) {
                // Create session admin
                $infoAdmin = array(
                    'ten_nguoi_dung' => $admin['ho_ten'],
                    'tendn'          => $admin['ten_dang_nhap']
                    );
                $_SESSION['admin'] = $infoAdmin;

                // Check box remember to set cookie
                if (isset($_POST['remember'])) {
                    $COOKIE_VALUE = "username=".$admin['ten_dang_nhap']."&password=".$admin['mat_khau'];
                    setcookie($COOKIE_NAME, $COOKIE_VALUE, time() + $COOKIE_TIME);
                }
                header('location:'.path.'/quan-tri.html'); exit();
            }
            else
                $smarty->assign('err','Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.');
        }
        $smarty->display('admin/login.tpl');
    }

    /**
     * Home page in admin tool
     *
     * If have a session admin, login. Else, redirect to login page
     * 
     * @return null
     */
    public function manageSystem()
    {
        // Check session admin
        if (! isset($_SESSION['admin'])) {
            header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
        } else {
            $smarty = new SmartyController();
            $smarty->display('admin/admin.tpl');
        }
    }

    /**
     * Sign out admin account.
     *
     * Desloy session and delete cookie admin
     *
     * @return null
     */
    public function logoutAdmin() {
        session_destroy();
        unset($_SESSION['admin']);
        if (isset($_COOKIE['admin'])) {
            setcookie("admin", "", time() - 3600);
        }
        header('location:'.path.'/quan-tri/dang-nhap.html'); exit();
    }

    /**
     * Product page.
     *
     * @return null
     */
    public function manageProducts()
    {
        // Get products
        $adminModel = new AdminModel();
        $products = $adminModel->getProductAdmin();

        if ($products) {
            $smarty = new SmartyController();
            $smarty->assign('DSSanPham', $products);
            $smarty->display('admin/product.tpl');    
        } else {
            // Redirect to product page
            header('location:'.path.'/quan-tri/san-pham.html'); exit();
        }
    }

    /**
     * Delete products.
     *
     * @return null
     */
    public function deleteProduct()
    {
        if (isset($_GET['key'])) {

            // Product id
            $idProduct = $_GET['key'];

            // Delete product by id
            $productModel = new ProductModel();
            $product = $productModel->getProductById($idProduct);

                // Delete old image
                if(file_exists('./public/hinh_san_pham/'.$product['hinh'])) {
                    unlink('./public/hinh_san_pham/'.$product['hinh']);
                    $admin = new AdminModel();
                    $admin->deleteProduct($idProduct);
                }

            // Redirect to product page admin
            header('location:'.path.'/quan-tri/san-pham.html');
        }
    }

    /**
     * Insert products into database.
     *
     * @return null
     */
    public function addProduct()
    {
        // A message comfirm
        $alert ='';

        // Array product is empty
        $data = [
                'ten_san_pham'        =>'',
                'ten_san_pham_url'    =>'',
                'ma_loai'             =>'',
                'mo_ta'               =>'',
                'gia_bia'             =>'',
                'gia_ban'             =>'',
                'hinh'                =>'',
                'chu_de_id'           =>'',
                ];

        // Array error is empty
        $arrayErr = [
                        'ten_san_pham'     =>'',
                        'ten_san_pham_url' =>'',
                        'mo_ta'            =>'',
                        'gia_bia'          =>'',
                        'gia_ban'          =>'',
                        'hinh'             =>''
                        ];

        // Submit button add product
        if (isset($_POST['btnThemSanPham'])) {

            // Array product after submit form
            $data = [
                            'ten_san_pham'        => $_POST['ten_san_pham'],
                            'ten_san_pham_url'    => $_POST['ten_san_pham_url'],
                            'ma_loai'             => $_POST['ma_loai'],
                            'mo_ta'               => $_POST['mo_ta'],
                            'gia_bia'             => $_POST['gia_bia'],
                            'gia_ban'             => $_POST['gia_ban'],
                            'hinh'                => $_FILES['hinh'],
                            'chu_de_id'           => $_POST['chu_de_id'],
                            ];
            
            $check = new HelperController();

            // Check validation array product
            if ($check->checkData($data)) {
                
                // Check image product
                if ($check->checkimage($data['hinh'])) {
                    $img = $_FILES['hinh'];
                    $data['hinh'] = time().'-'.$img['name'];
                    
                    // Upload image into database
                    if (move_uploaded_file($img['tmp_name'],'./public/hinh_san_pham/'.$data['hinh'])) {
                        
                        // Insert products into database
                        $admin = new AdminModel();
                        $admin->addProduct($data);

                        // Confirm a message success to admin
                        $alert = 'Thêm sản phẩm thành công!';
                    }
                } else {
                    // Confirm a message fail to admin
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                }
            } else {
                // Confirm a message fail to admin
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();
        
        // Display info products to views
        $smarty->assign('data', $data);

        // Display a message error to views
        $smarty->assign('mangErr', $arrayErr);
        
        // Display categories to views
        $categoryModel = new CategoryModel();
        $smarty->assign('DSLoaiSanPham', $categoryModel->getCat());

        // Display subjects to views
        $subjectModel = new SubjectModel();
        $smarty->assign('DanhSachChuDe', $subjectModel->getSubject());

        // Confirm alert
        $smarty->assign('alert', $alert);

        $smarty->display('admin/add_product.tpl');
    }

    /**
     * Update products into database.
     *
     * @return null
     */
    public function updateProduct()
    {
        // Validate GET
        if (isset($_GET['key']) && filter_var($_GET['key'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            
            // Product id
            $idProduct = $_GET['key'];
        } else {
            // Redirect to product page
            header('location:'.path.'/quan-tri/san-pham.html'); exit();
        }

        // Display categories
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat(); 

        // Display subjects
        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->getSubject();

        // Display products
        $productModel = new ProductModel();
        $products = $productModel->getProductById($idProduct); 

        // use $oldImage to delete file image after upload new product
        $oldImgage = $products['hinh'];
        
        // If database dont't have products, redirect to product page
        if (! $products) {
            header('location:'.path.'/quan-tri/san-pham.html'); exit();
        }

        //
        $arrayErr = [
                    'ten_san_pham'     =>'',
                    'ten_san_pham_url' =>'',
                    'mo_ta'            =>'',
                    'gia_bia'          =>'',
                    'gia_ban'          =>'',
                    'hinh'             =>''
                    ];

        //
        $alert = '';

        //Submit form update product
        if (isset($_POST['btnCapNhatSanPham'])) {

            // Data products after submit
            $products = [
                'ma_san_pham'        =>$idProduct,
                'ten_san_pham'       =>$_POST['ten_san_pham'], 
                'ten_san_pham_url'   =>$_POST['ten_san_pham_url'], 
                'ma_loai'            =>$_POST['ma_loai'], 
                'mo_ta'              =>$_POST['mo_ta'], 
                'gia_bia'            =>$_POST['gia_bia'], 
                'gia_ban'            =>$_POST['gia_ban'],
                'hinh'               =>$_FILES['hinh'],
                'chu_de_id'          =>$_POST['chu_de_id'],
                ];

            $check = new HelperController();

            // Check data products
            if ($check->checkData($products)) {

                $newImage = $_FILES['hinh']; 
                
                // Check image
                if ($check->checkimage(! $newImage)) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    
                    // Upload new image
                    $imageName = time().'-'.$newImage['name'];
                    if (move_uploaded_file($newImage['tmp_name'],'./public/hinh_san_pham/'.$imageName)){
                        
                        // Delete old image
                        if (file_exists('./public/hinh_san_pham/'.$oldImgage)) {
                            unlink('./public/hinh_san_pham/'.$oldImgage);
                        }
                        
                        // Update product
                        $products['hinh'] = $imageName;
                        $admin = new AdminModel();
                        $admin->updateProduct($products);
                        
                        // Confirm a message seccess to admin
                        $alert = 'Cập nhật sản phẩm thành công!';
                    }
                }
            } else {
                $arrayErr = $check->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();

        // Display products to view
        $smarty->assign('data', $products);

        // Display error to view
        $smarty->assign('mangErr', $arrayErr);

        // Display categories to view
        $smarty->assign('DSLoaiSanPham', $categories);

        // Display subjects to view
        $smarty->assign('DanhSachChuDe', $subjects);

        // Display alert to view
        $smarty->assign('alert', $alert);

        $smarty->display('admin/update_product.tpl');
    }

    /**
     * Categories page.
     * 
     * @return null
     */
    public function manageCategories()
    {
        // Get data categories
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat();
        
        if ($categories) {
            $smarty = new SmartyController();
            $smarty->assign('DSLoaiSanPham', $categories);
            $smarty->display('admin/categories.tpl');    
        } else {
            // Redirect to categories page
            header('location:'.path.'/quan-tri/loai-san-pham.html'); exit();
        }
    }

    /**
     * Delete categories
     * 
     * @return null
     */
    public function deleteCategory()
    {
        if (isset($_GET['key'])) {

            // Category id
            $idCategory = $_GET['key'];

            // Delete category
            $adminModel = new AdminModel();
            $adminModel->deleteCat($idCategory);

            // Redirect to categories page
            header('location:'.path.'/quan-tri/loai-san-pham.html');
        }
    }

    /**
     * Insert new categories
     *
     * @return  null
     */
    public function addCategory()
    {
        $alert = array();
        $data['loaicha'] = [
                        'ten_loai'             =>'',
                        'ten_loai_san_pham_url'=>'',
                        'ma_loai_cha'          =>''
                        ];
        $data['loaicon'] = [
                        'ten_loai'=>'',
                        'ten_loai_san_pham_url'=>'',
                        'ma_loai_cha'=>''
                        ];
        $arrayErr = [
                        'ten_loai'=>'',
                        'ten_loai_san_pham_url'=>'',
                        ];

        // Submit form add category
        if (isset($_POST['btnThemLoaiCha'])) {
            $data['loaicha'] = [
                            //'ten_loai'             => $_POST['ten_loai'],
                            'ten_loai_san_pham_url'    => $_POST['ten_loai_san_pham_url'],
                            ];

            $check = new HelperController();

            // Check data categories
            if ($check->checkDataCategory($data['loaicha'])) {
                // Insert categories into database
                $adminModel = new AdminModel();
                $adminModel->addCat($data['loaicha']);

                // Confirm a message seccess
                $alert['loaicha'] = 'Thêm thành công!';
            } else {
                $arrayErr = $check->getDataErr();
                $alert['loaicha'] = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        // Submit form add sub category
        if (isset($_POST['btnThemLoaiCon'])) {
            $data['loaicon'] = [
                                    'ten_loai'                 =>$_POST['ten_loai'],
                                    'ten_loai_san_pham_url'    =>$_POST['ten_loai_san_pham_url'],
                                    'ma_loai_cha'              =>$_POST['ma_loai']
                            ];
            
            $check = new HelperController();

            // Check data categories
            if ($check->checkDataCategory($data['loaicon'])) {
                // Insert sub categories into database
                $adminModel = new AdminModel();
                $adminModel->addSubCat($data['loaicon']);

                // Confirm a message seccess
                $alert['loaicon'] = 'Thêm thành công!';
            } else {
                $arrayErr = $check->getDataErr();
                $alert['loaicon'] = 'Vui lòng điển đầy đủ thông tin.';
            }
        }
        
        $smarty = new SmartyController();

        // Display categories and sub categories
        $smarty->assign('data1', $data['loaicha']);
        $smarty->assign('data2', $data['loaicon']);
        
        // Display error from check form and alert message
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('alert', $alert);

        // Get categories
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCat();
        // Display categories to view
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