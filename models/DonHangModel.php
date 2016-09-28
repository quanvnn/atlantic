<?php
include_once('models/Database.php');
class DonHangModel extends Database
{
    public function DSHoaDon()
    {
        $chuoiSQL = "SELECT `hoa_don`.`so_hoa_don`, `hoa_don`.`ngay_hd`, `hoa_don`.`tri_gia`, `khach_hang`.`ten_khach_hang` 
            FROM `hoa_don`
            INNER JOIN `khach_hang` ON `khach_hang`.`ma_khach_hang` = `hoa_don`.`ma_khach_hang`";
        $this->setQuery($chuoiSQL);
        return $this->loadAllRow();
    }
    public function ChiTietDonHang($SoHD)
    {
        $chuoiSQL = "SELECT 
        	`khach_hang`.`ten_khach_hang`, `khach_hang`.`email`, 
        	`hoa_don`.`ten_nguoi_nhan`, `hoa_don`.`dien_thoai`, `hoa_don`.`dia_chi`, `hoa_don`.`ngay_hd`, `hoa_don`.`tri_gia`,
        	`ct_hoa_don`.`so_luong`, `ct_hoa_don`.`don_gia`, `ct_hoa_don`.`ma_san_pham`,
        	`san_pham`.`ten_san_pham`
        FROM `ct_hoa_don` 
		INNER JOIN  `hoa_don`    ON `ct_hoa_don`.`so_hoa_don` = `hoa_don`.`so_hoa_don` 
        INNER JOIN  `khach_hang` ON `hoa_don`.`ma_khach_hang` = `khach_hang`.`ma_khach_hang` 
        INNER JOIN  `san_pham`   ON `san_pham`.`ma_san_pham`  = `ct_hoa_don`.`ma_san_pham`
        WHERE `ct_hoa_don`.`so_hoa_don` =?";
        $this->setQuery($chuoiSQL);
        return $this->loadAllRow(array($SoHD));        
    }
}
?>