<?php
session_start();

chdir(dirname(__DIR__));
define('path', 'http://atlantic.dev');
require_once "smarty/libs/Smarty.class.php";
require_once "models/LoaiSanPhamModel.php";
//require_once('models/LoaiSanPhamModel.php');
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

        $LoaiSanPhamModel = new CategoryModel();
        $DSLoaiSanPham = $LoaiSanPhamModel->getCat(); 
        //var_dump($DSLoaiSanPham); exit();
        $this->assign('DSLoaiSanPham', $DSLoaiSanPham);

        //check submit form đăng nhập header
        if (isset($_POST['btnDangNhap'])) {
            $email = addslashes($_POST['email']);
            $mat_khau = addslashes($_POST['mat_khau']);

            $KhachHangModel = new ClientModel();
            $dataKhachHang = $KhachHangModel->getLogin($email, $mat_khau);

            //var_dump($dataKhachHang); exit();
            if ($dataKhachHang) {
                // tạo session.khachhang
                $arrTTKhachHang = array(
                                'ma_khach_hang'  => $dataKhachHang['ma_khach_hang'],
                                'ten_khach_hang' => $dataKhachHang['ten_khach_hang'],
                                'email'          => $email
                                );
                $_SESSION['khachhang'] = $arrTTKhachHang;
                //var_dump($_SESSION['khachhang']); exit();
            }
        }
    }
}
?>