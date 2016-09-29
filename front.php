<?php
include_once('controllers/FrontController.php');
$FrontController = new FrontController();
if (isset($_GET['kihieu'])) {
	//echo $_GET['kihieu']; exit();
    //echo $_GET['page']; exit();
    switch ($_GET['kihieu']) {
        case 'ho-tro-khach-hang':
            $FrontController->careClient(); break;
        case 'gui-yeu-cau':
            $FrontController->sendRequest(); break;
        case 'dang-ky':
            $FrontController->createAccount(); break;
        case 'gio-hang':
            $FrontController->getInfoCart(); break;
        case 'huy-gio-hang':
            $FrontController->deleteCart(); break;
        case 'dat-hang':
            $FrontController->checkout(); break;
        case 'dang-xuat':
            $FrontController->logoutClient(); break;
        case 'thong-tin-don-hang':
            $FrontController->getInfoInvoice(); break;
        case 'quen-mat-khau':
            $FrontController->forgotPassWord(); break;
        
        case 'san-pham-loai-cha':
            $FrontController->getProductsInCat(); break;
        case 'san-pham-loai-con':
            $FrontController->getProductsInSubCat(); break;
        case 'chi-tiet-san-pham':
            $FrontController->getProductDetails(); break;
        case 'san-pham-theo-chu-de':
            $FrontController->getProductInSubject(); break;
        case 'reset-password':
            $FrontController->resetPassWord(); break;
    }
}
else
    $FrontController->index();
?>