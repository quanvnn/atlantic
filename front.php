<?php
include_once('controllers/FrontController.php');
$FrontController = new FrontController();
if(isset($_GET['kihieu']))
{
	//echo $_GET['kihieu']; exit();
    //echo $_GET['page']; exit();
    switch ($_GET['kihieu'])
    {
        case 'ho-tro-khach-hang':$FrontController->HoTroKhachHang(); break;
        case 'gui-yeu-cau':$FrontController->GuiYeuCau(); break;
        case 'dang-ky':$FrontController->DangKy(); break;
        case 'gio-hang':$FrontController->ThongTinGioHang(); break;
        case 'huy-gio-hang':$FrontController->HuyGioHang(); break;
        case 'dat-hang':$FrontController->DatHang(); break;
        case 'dang-xuat':$FrontController->DangXuat(); break;
        case 'thong-tin-don-hang':$FrontController->ThongTinDonHang(); break;
        case 'quen-mat-khau':$FrontController->QuenMatKhau(); break;
        
        case 'san-pham-loai-cha':$FrontController->SanPhamTheoLoaiCha(); break;
        case 'san-pham-loai-con':$FrontController->SanPhamTheoLoaiCon(); break;
        case 'chi-tiet-san-pham':$FrontController->ChiTietSanPham(); break;
        case 'san-pham-theo-chu-de':$FrontController->SanPhamTheoChuDe(); break;
        case 'reset-password':$FrontController->ResetPassWord(); break;
    }
}
else
    $FrontController->index();
?>