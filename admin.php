<?php

include_once('controllers/AdminController.php');
include_once('controllers/AuthController.php');

$AdminController = new AdminController();
$AuthController = new AuthController();

    if (isset($_GET['kihieu'])) {
        //var_dump($_GET['kihieu']); exit();
        
        switch ($_GET['kihieu']) {
            
            case 'quan-tri':
                $AdminController->manageSystem(); 
                break;

            case 'quan-tri-dang-nhap':
                $AuthController->loginAdmin();
                break;

            case 'quan-tri-dang-xuat':
                $AuthController->logoutAdmin(); 
                break;

            case 'quan-tri-san-pham':
                $AdminController->manageProducts(); 
                break;

            case 'quan-tri-them-san-pham':
                $AdminController->addProduct(); 
                break;

            case 'quan-tri-xoa-san-pham':
                $AdminController->deleteProduct(); 
                break;

            case 'quan-tri-cap-nhat-san-pham':
                $AdminController->updateProduct(); 
                break;

            case 'quan-tri-loai-san-pham':
                $AdminController->manageCategories(); 
                break;

            case 'quan-tri-xoa-loai-san-pham':
                $AdminController->deleteCategory(); 
                break;

            case 'quan-tri-them-loai-san-pham':
                $AdminController->addCategory(); 
                break;

            case 'quan-tri-cap-nhat-loai-cha':
                $AdminController->updateCategory(); 
                break;

            case 'quan-tri-cap-nhat-loai-con':
                $AdminController->updateSubCategory(); 
                break;

            case 'quan-tri-chu-de':
                $AdminController->manageSubject(); 
                break;

            case 'quan-tri-them-chu-de':
                $AdminController->addSubject(); 
                break;

            case 'quan-tri-cap-nhat-chu-de':
                $AdminController->updateSubject(); 
                break;

            case 'quan-tri-don-hang':
                $AdminController->manageInvoices(); 
                break;

            case 'quan-tri-chi-tiet-don-hang':
                $AdminController->manageInvoiceDetails(); 
                break;

            case 'quan-tri-yeu-cau-cua-khach-hang':
                $AdminController->manageRequireClient(); 
                break;

            case 'quan-tri-binh-luan': 
                $AdminController->manageComment(); 
                break;

            case 'quan-tri-xoa-binh-luan':
                $AdminController->deleteComment();
                break;
        }
    }

?>
