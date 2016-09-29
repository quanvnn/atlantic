<?php
session_start();

chdir(dirname(__DIR__));
define('path', 'http://atlantic.dev');
require_once "smarty/libs/Smarty.class.php";
require_once "models/CategoryModel.php";
include_once "library/Gio_hang.php";

class SmartyController extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateDir('views/templates');
        $this->setCompileDir('views/templates_c');
        $this->setCacheDir('views/caches');
        $this->setConfigDir('views/configs');
        $this->assign('path', path);

        $CategoryModel = new CategoryModel();
        $categories = $CategoryModel->getCat(); 
        //var_dump($categories); exit();
        $this->assign('DSLoaiSanPham', $categories);

        //check submit form đăng nhập header
        if (isset($_POST['btnDangNhap'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['mat_khau']);

            $clientModel = new ClientModel();
            $dataClient = $clientModel->getLogin($email, $pass);

            //var_dump($dataClient); exit();
            if ($dataClient) {
                // tạo session.khachhang
                $infoClient = array(
                                'ma_khach_hang'  => $dataClient['ma_khach_hang'],
                                'ten_khach_hang' => $dataClient['ten_khach_hang'],
                                'email'          => $email
                                );
                $_SESSION['khachhang'] = $infoClient;
                //var_dump($_SESSION['khachhang']); exit();
            }
        }
    }
}
?>