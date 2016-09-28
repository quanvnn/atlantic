<?php
include_once('controllers/AdminController.php');
$AdminController = new AdminController();

    if (isset($_GET['kihieu'])) {
        //var_dump($_GET['kihieu']); exit();
        switch ($_GET['kihieu']) {
            case 'quan-tri':
                $AdminController->QuanTri(); break;
            case 'quan-tri-dang-nhap':
                $AdminController->QuanTriDangNhap(); break;
            case 'quan-tri-dang-xuat':
                $AdminController->QuanTriDangXuat(); break;
            case 'quan-tri-san-pham':
                $AdminController->QuanTriSanPham(); break;
            case 'quan-tri-them-san-pham':
                $AdminController->QuanTriThemSanPham(); break;
            case 'quan-tri-xoa-san-pham':
                $AdminController->QuanTriXoaSanPham(); break;
            case 'quan-tri-cap-nhat-san-pham':
                $AdminController->QuanTriCapNhatSanPham(); break;
            case 'quan-tri-loai-san-pham':
                $AdminController->QuanTriLoaiSanPham(); break;
            case 'quan-tri-xoa-loai-san-pham':
                $AdminController->QuanTriXoaLoaiSanPham(); break;
            case 'quan-tri-them-loai-san-pham':
                $AdminController->QuanTriThemLoaiSanPham(); break;
            case 'quan-tri-them-loai-con':
                $AdminController->QuanTriThemLoaiCon(); break;
            case 'quan-tri-cap-nhat-loai-cha':
                $AdminController->QuanTriCapNhatLoaiSanPham(); break;
            case 'quan-tri-cap-nhat-loai-con':
                $AdminController->QuanTriCapNhatLoaiCon(); break;
            case 'quan-tri-chu-de':
                $AdminController->QuanTriChuDe(); break;
            case 'quan-tri-them-chu-de':
                $AdminController->QuanTriThemChuDe(); break;
            case 'quan-tri-cap-nhat-chu-de':
                $AdminController->QuanTriCapNhatChuDe(); break;
            case 'quan-tri-don-hang':
                $AdminController->QuanTriDonHang(); break;
            case 'quan-tri-chi-tiet-don-hang':
                $AdminController->QuanTriChiTietDonHang(); break;
            case 'quan-tri-yeu-cau-cua-khach-hang':
                $AdminController->QuanTriYeuCauKhachHang(); break;
            case 'quan-tri-binh-luan': 
                $AdminController->QuanTriBinhLuan(); break;
            case 'quan-tri-xoa-binh-luan':
                $AdminController->QuanTriXoaBinhLuan(); break;
        }
    }

?>
