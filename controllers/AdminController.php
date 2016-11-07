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
include_once('library/Redirect.php');

class AdminController
{   
    private $adminModel;
    private $categoryModel;
    private $commentModel;
    private $productModel;
    private $invoiceModel;
    private $contactModel;
    private $subjectModel;
    private $helperController;

    /**
     * Get admin model
     * 
     * @return class
     */
    private function AdminModel()
    {
        return $this->adminModel = new AdminModel();
    }

    /**
     * Get category model
     * 
     * @return class
     */
    private function CategoryModel()
    {
        return $this->categoryModel = new CategoryModel();
    }

    /**
     * Get comment model
     * 
     * @return class
     */
    private function CommentModel()
    {
        return $this->commentModel = new CommentModel();
    }

    /**
     * Get product model
     * 
     * @return class
     */
    private function ProductModel()
    {
        return $this->productModel = new ProductModel();
    }

    private function InvoiceModel()
    {
        return $this->invoiceModel = new InvoiceModel();
    }

    private function ContactModel()
    {
        return $this->contactModel = new ContactModel();
    }
    
    private function SubjectModel()
    {
        return $this->subjectModel = new SubjectModel();
    }

    private function HelperController()
    {
        return $this->helperController = new HelperController();
    }

    /**
     * Function redirect to $url
     * 
     * @param  string $url, example $url = 'admin.html'
     * @return void
     */
    public function redirect($url)
    {
        header('location:'.path.'/'.$url); 
        exit();
    }

    /**
     * Function redirect to manage comment page
     * 
     * @return response
     */
    public function redirectToCommentPage()
    {
        return $this->redirect('quan-tri/binh-luan.html');
    }

    /**
     * Function redirect to manage invoice page
     * 
     * @return response
     */
    public function redirectToInvoicePage()
    {
        return $this->redirect('quan-tri/don-hang.html');
    }

    /**
     * Function redirect to admin page
     * 
     * @return response
     */
    public function redirectToManageSystemPage()
    {
        return $this->redirect('quan-tri.html');
    }

    /**
     * Function redirect to login page
     * 
     * @return response
     */
    public function redirectToLoginAdminPage()
    {
        return $this->redirect('quan-tri/dang-nhap.html');
    }

    /**
     * Function redirect to manage products page
     * 
     * @return response
     */
    public function redirectToProductPage()
    {
        return $this->redirect('quan-tri/san-pham.html');
    }

    /**
     * Function redirect to manage categories page
     * 
     * @return response
     */
    public function redirectToCategoryPage()
    {
        return $this->redirect('quan-tri/loai-san-pham.html');
    }

    /**
     * Function redirect to manage subujects page
     * 
     * @return response
     */
    public function redirectToSubjectPage()
    {
        return $this->redirect('quan-tri/chu-de.html');
    }




    /**
     * Home page in admin tool.
     * If have a session admin, login. Else, redirect to login page.
     * 
     * @return void
     */
    public function manageSystem()
    {
        
        if (! isset($_SESSION['admin'])) {

            $this->redirectToLoginAdminPage();

        } else {

            $smarty = new SmartyController();

            $smarty->display('admin/admin.tpl');
        }
    }

    /**
     * Product page
     * Display all products
     * Can add, update and delete product
     *
     * @return void
     */
    public function manageProducts()
    {
        // Get products
        $products = $this->AdminModel()->getProductAdmin();

        if ($products) {
            $smarty = new SmartyController();
            $smarty->assign('DSSanPham', $products);
            $smarty->display('admin/product.tpl');    
        } else {
            $this->redirectToProductPage();
        }
    }

    /**
     * Validation id
     * @param  int $id
     * @return bool
     */
    public function validateId($id)
    {
        return filter_var($id, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
    }

    /**
     * Delete products base on product id
     * And delete old image
     * @return void
     */
    public function deleteProduct()
    {
        if (isset($_GET['key'])) {

            // Product id
            $idProduct = $this->validateId($_GET['key']);

            // Delete product by id
            $product = $this->ProductModel()->getProductById($idProduct);

                // Delete old image
                if(file_exists('./public/hinh_san_pham/'.$product['hinh'])) {
                    unlink('./public/hinh_san_pham/'.$product['hinh']);
                    
                    // Delete product
                    $this->AdminModel()->deleteProduct($idProduct);
                }

                $this->redirectToProductPage();
        }
    }

    /**
     * Insert products into database
     *
     * @return void
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

            // Check validation array product
            if ($this->HelperController()->checkData($data)) {
                
                // Check image product
                if ($check->checkimage($data['hinh'])) {
                    $img = $_FILES['hinh'];
                    $data['hinh'] = time().'-'.$img['name'];
                    
                    // Upload image into database
                    if (move_uploaded_file($img['tmp_name'],'./public/hinh_san_pham/'.$data['hinh'])) {
                        
                        // Insert products into database
                        $this->AdminModel()->addProduct($data);

                        // Confirm a message success to admin
                        $alert = 'Thêm sản phẩm thành công!';
                    }
                } else {
                    // Confirm a message fail to admin
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                }
            } else {
                // Confirm a message fail to admin
                $arrayErr = $this->HelperController()->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();
        
        // Display info products to views
        $smarty->assign('data', $data);

        // Display a message error to views
        $smarty->assign('mangErr', $arrayErr);
        
        // Display categories to views
        $smarty->assign('DSLoaiSanPham', $this->CategoryModel()->getCat());

        // Display subjects to views
        $smarty->assign('DanhSachChuDe', $this->SubjectModel()->getSubject());

        // Confirm alert
        $smarty->assign('alert', $alert);

        $smarty->display('admin/add_product.tpl');
    }

    /**
     * Update products
     *
     * @return void
     */
    public function updateProduct()
    {
        // Validate GET
        if (isset($_GET['key'])) {
            // Product id
            $idProduct = $this->validateId($_GET['key']);
        } else {
            $this->redirectToProductPage();
        }

        // Display products
        $products = $this->ProductModel()->getProductById($idProduct); 

        // use $oldImage to delete file image after upload new product
        $oldImgage = $products['hinh'];
        
        // If database dont't have products, redirect to product page
        if (! $products) {
            $this->redirectToProductPage();
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

            // Check data products
            if ($this->HelperController()->checkData($products)) {

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
                        
                        $products['hinh'] = $imageName;
                        
                        // Update product
                        $this->AdminModel()->updateProduct($products);
                        
                        // Confirm a message seccess to admin
                        $alert = 'Cập nhật sản phẩm thành công!';
                    }
                }
            } else {
                $arrayErr = $this->HelperController()->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();

        // Display products to view
        $smarty->assign('data', $products);

        // Display error to view
        $smarty->assign('mangErr', $arrayErr);

        // Display categories to view
        $smarty->assign('DSLoaiSanPham', $this->CategoryModel()->getCat());

        // Display subjects to view
        $smarty->assign('DanhSachChuDe', $this->SubjectModel()->getSubject());

        // Display alert to view
        $smarty->assign('alert', $alert);

        $smarty->display('admin/update_product.tpl');
    }

    /**
     * Categories page.
     * 
     * @return void
     */
    public function manageCategories()
    {
        // Get data categories
        $categories = $this->CategoryModel()->getCat();
        
        if ($categories) {
            $smarty = new SmartyController();
            $smarty->assign('DSLoaiSanPham', $categories);
            $smarty->display('admin/categories.tpl');    
        } else {
            $this->redirectToCategoryPage();
        }
    }

    /**
     * Delete categories
     * 
     * @return void
     */
    public function deleteCategory()
    {
        if (isset($_GET['key'])) {

            // Category id
            $idCategory = $this->validateId($_GET['key']);

            // Delete category
            $this->AdminModel()->deleteCat($idCategory);

            $this->redirectToCategoryPage();
        }
    }

    /**
     * Insert new categories
     *
     * @return  void
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

            // Check data categories
            if ($this->HelperController()->checkDataCategory($data['loaicha'])) {
                // Insert categories into database
                $this->AdminModel()->addCat($data['loaicha']);

                // Confirm a message seccess
                $alert['loaicha'] = 'Thêm thành công!';
            } else {
                $arrayErr = $this->HelperController()->getDataErr();
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

            // Check data categories
            if ($this->HelperController()->checkDataCategory($data['loaicon'])) {
                // Insert sub categories into database
                $this->AdminModel()->addSubCat($data['loaicon']);

                // Confirm a message seccess
                $alert['loaicon'] = 'Thêm thành công!';
            } else {
                $arrayErr = $this->HelperController()->getDataErr();
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

        // Display categories to view
        $smarty->assign('DSLoaiSanPham', $this->CategoryModel()->getCat());

        $smarty->display('admin/add_category.tpl');
    }

    /**
     * Update category
     * 
     * @return void
     */
    public function updateCategory()
    {
        // Validate product id
        if (isset($_GET['key'])) {
            $idProduct = $this->validateId($_GET['key']);
        } else {
            $this->redirectToCategoryPage();
        }

        // Get Categories by id
        $data = $this->CategoryModel()->getCatByID($idProduct);

        // If fail
        if (! $data) {
            $this->redirectToCategoryPage();
        }

        // Array error is empty
        $arrayErr = [
                    'ten_loai'              =>'',
                    'ten_loai_san_pham_url' =>'',
                    ];

        $alert = '';

        // Submit form update category
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            // Data categories after submit
            $data = array(
                'ma_loai'                     => $idProduct,
                'ten_loai'                    => $_POST['ten_loai'],
                'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url']
                );

            // Check data category
            if ($this->HelperController()->checkDataCategory($data)) {

                // Insert data categories intio database
                $this->AdminModel()->updateCat($data);
                
                // Confirm a message success
                $alert = 'Cập nhật thành công!';
            } else {
                $arrayErr = $this->HelperController()->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();
        
        $smarty->assign('data', $data);

        $smarty->assign('mangErr', $arrayErr);

        $smarty->assign('alert', $alert);

        $smarty->display('admin/update_category.tpl');
    }

    /**
     * Update Sub Category
     * 
     * @return void
     */
    public function updateSubCategory()
    {
        if (isset($_GET['key'])) {

            $idProduct = $this->validateId($_GET['key']);
        } else {
            $this->redirectToCategoryPage();
        }
        
        // Get info category by id
        $data = $this->CategoryModel()->getCatByID($idProduct); 
        
        if (! $data) {
            $this->redirectToCategoryPage();
        }
        
        $arrayErr = [
                        'ten_loai'              =>'',
                        'ten_loai_san_pham_url' =>'',
                    ];

        $alert = '';

        // Submit form update category
        if (isset($_POST['btnCapNhatLoaiSanPham'])) {
            $data = [
                            'ma_loai'                     => $idProduct,
                            'ten_loai'                    => $_POST['ten_loai'],
                            'ten_loai_san_pham_url'       => $_POST['ten_loai_san_pham_url'],
                            'ma_loai_cha'                 => $_POST['ma_loai']
                            ];
            
            // Check data category
            if ($this->HelperController()->checkDataCategory($data)) {
                
                // Insert categories into database
                $this->AdminModel()->updateSubCat($data);
                
                // Confirm to browser
                $alert = 'Cập nhật thành công!';
            } else {
                // Confirm error to browser
                $arrayErr = $this->HelperController()->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();
        
        $smarty->assign('data', $data);
        
        $smarty->assign('mangErr', $arrayErr);

        // Get categories list to display out browser
        $smarty->assign('DSLoaiSanPham', $this->CategoryModel()->getCat());

        $smarty->assign('alert', $alert);

        $smarty->display('admin/update_subcategory.tpl');
    }

    /**
     * Subject page.
     * 
     * @return void
     */
    public function manageSubject()
    {
        // Get data subjects
        $subjects = $this->SubjectModel()->getSubject();
        
        if ($subjects) {
            $smarty = new SmartyController();
            $smarty->assign('DSChuDe', $subjects);
            $smarty->display('admin/subject.tpl');
        } else {
            $this->redirect('quan-tri/them-chu-de-sach.html');
        }
    }

    /**
     * Add subjects
     * 
     * @return  void
     */
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

    /**
     * Update subjects
     * 
     * @return void
     */
    public function updateSubject()
    {
        // Validate $_GET
        if (isset($_GET['key'])) {
            
            $stringUrl = $_GET['key'];
            
            $array = explode('-', $stringUrl); 
            
            $idSubject = $this->validateId($array[count($array)-1]);
        } else {
            $this->redirectToSubjectPage();
        }

        // Get subject by id
        $data = $this->SubjectModel()->getSubjectID($idSubject);

        // Use old image name to delete old image when upload new image
        $oldImgage = $data['hinh'];

        if (! $data) {
            $this->redirectToSubjectPage();
        }

        $arrayErr = [
                    'ten_chu_de'     =>'',
                    'ten_chu_de_url' =>'',
                    'mo_ta'          =>'',
                    'hinh'           =>''
                ];

        $alert = '';

        // Submit form update subject
        if (isset($_POST['btnCapNhatChuDe'])) {
            $data = [
                        'ma_chu_de'          =>$idSubject,
                        'ten_chu_de'         =>$_POST['ten_chu_de'], 
                        'ten_chu_de_url'     =>$_POST['ten_chu_de_url'], 
                        'mo_ta'              =>$_POST['mo_ta'], 
                        'hinh'               =>$_FILES['hinh'],
                    ];
            
            // Check data subject
            if ($this->helperController()->checkDataSubject($data)) {

                $newImage = $_FILES['hinh'];

                if ($check->checkimage(! $newImage)) {
                    $alert = 'Vui lòng kiểm tra lại hình và đảm bảo rằng hình sản phẩm nhỏ hơn 2 Mb.';
                } else {
                    
                    $imageName = time().'-'.$newImage['name'];
                
                    // Upload new image
                    if (move_uploaded_file($newImage['tmp_name'],'./public/images/'.$imageName)) {
                        
                        // Delete old image
                        if (file_exists('./public/images/'.$oldImgage)) {
                            unlink('./public/images/'.$oldImgage);
                        }
                        
                        $data['hinh'] = $imageName;

                        // Insert data subject into database
                        $this->AdminModel()->updateSubject($data);
                        
                        // Confirm to browser
                        $alert = 'Cập nhật thành công!';
                    }
                }
            } else {
                // Confirm error
                $arrayErr = $this->helperController()->getDataErr();
                $alert = 'Vui lòng điển đầy đủ thông tin.';
            }
        }

        $smarty = new SmartyController();
        $smarty->assign('data', $data);
        $smarty->assign('mangErr', $arrayErr);
        $smarty->assign('alert', $alert);
        $smarty->display('admin/update_subject.tpl');
    }

    /**
     * Invoices page.
     * 
     * @return void
     */
    public function manageInvoices()
    {
        // Get data invoices
    	$invoices = $this->InvoiceModel()->getInvoices();

    	// Display invoices to views
    	$smarty = new SmartyController();
    	if ($invoices) {
    		$smarty->assign('DSHoaDon', $invoices);
    	}

    	$smarty->display('admin/invoices.tpl');
    }

    /**
     * Invoices detail page.
     * 
     * @return void
     */
    public function manageInvoiceDetails()
    {
    	$smarty = new SmartyController();
    	if (isset($_GET['key'])) {
            
            // Invoice id
    		$idInvoice = $this->validateId($_GET['key']);

            // Get data invoices
    		$invoices = $this->InvoiceModel()->getInfoInvoice($idInvoice);

    		// Display invoices to views
    		if ($invoicesDetail) {
    			$smarty->assign('ChiTietDonHang',$invoices);
    		} else {
                $this->redirectToInvoicePage();
    		}
    	} else {
            $this->redirectToInvoicePage();
    	}

    	$smarty->display('admin/invoice_details.tpl');
    }

    /**
     * Request from client.
     * 
     * @return void
     */
    public function manageRequireClient()
    {
        // Get request client
        $requestClient = $this->ContactModel()->getRequireClient();
        
        // Display request client
        $smarty = new SmartyController();
        if ($requestClient) {
            $smarty->assign('DSYeuCauKhachHang', $requestClient);
        }

        $smarty->display('admin/contact.tpl');
    }

    /**
     * Comment page.
     * 
     * @return void
     */
    public function manageComment()
    {
        $comments = $this->CommentModel()->getCommentAdmin();
        //var_dump($comments); exit();
        
        $smarty = new SmartyController();
        if ($comments) {
            $smarty->assign('DSBinhLuanAdmin', $comments);
        }

        $smarty->display('admin/comment.tpl');
    }

    /**
     * Delete comment.
     * 
     * @return void
     */
    public function deleteComment()
    {
        if (isset($_GET['key'])) {
            
            // Comment id
            $idComment = $this->validateId($_GET['key']);
            
            $this->CommentModel()->deleteComment($idComment);

            $this->redirectToCommentPage();
        } else {
            $this->redirectToCommentPage();
        }
    }

}