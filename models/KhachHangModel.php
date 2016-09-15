<?php
include_once('models/Database.php');
class KhachHangModel extends Database
{
    public function ThemKhachHang($data)
    {
        $chuoiSQL='INSERT INTO khach_hang(ten_khach_hang, email, mat_khau) VALUES (?,?,?)';
        $this->setQuery($chuoiSQL);
        $this->execute(array($data['ten_khach_hang'], $data['email'], md5($data['mat_khau'])));
        return $this->lastInsertId();
    }
    public function getKhachHangDangNhap($email,$matkhau)
    {
        $this->setQuery('SELECT * FROM khach_hang WHERE email=? AND mat_khau=?');
        return $this->loadRow(array($email,md5($matkhau)));
    }
    public function ThemDonDatHang($data)
    {
        $chuoiSQL='INSERT INTO hoa_don (ngay_hd, ma_khach_hang, tri_gia, ten_nguoi_nhan, dia_chi, dien_thoai) VALUES (now(),?,?,?,?,?)';
        $this->setQuery($chuoiSQL);
         $this->execute(array($data['ma_khach_hang'], $data['tri_gia'], $data['ten_nguoi_nhan'], $data['dia_chi'], $data['dien_thoai']));
        return $this->lastInsertId();
    }
    public function ThemCTDonDatHang($data)
    {
        $chuoiSQL='INSERT INTO ct_hoa_don (`so_hoa_don`, `ma_san_pham`, `so_luong`, `don_gia`) VALUES (?,?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['so_hoa_don'], $data['ma_san_pham'], $data['so_luong'], $data['don_gia']));
    }
    public function TTDonDatHang($SoHD)
    {
        $chuoiSQL='SELECT `ct_hoa_don`.`so_hoa_don`,`ngay_hd`,`hoa_don`.`ma_khach_hang`,`ten_khach_hang`, `dia_chi`, `dien_thoai`, `email`,`hoa_don`.`tri_gia`,
          `ct_hoa_don`.`ma_san_pham`,`ten_san_pham` ,`so_luong`, `ct_hoa_don`.`don_gia`, `hoa_don`.`ten_nguoi_nhan`
          FROM `ct_hoa_don` 
          INNER JOIN  `hoa_don` ON `ct_hoa_don`.`so_hoa_don`=`hoa_don`.`so_hoa_don` 
          INNER JOIN  `khach_hang` ON `hoa_don`.`ma_khach_hang`=`khach_hang`.`ma_khach_hang` 
          INNER JOIN  `san_pham` ON `san_pham`.`ma_san_pham`=`ct_hoa_don`.`ma_san_pham`
          Where `ct_hoa_don`.`so_hoa_don` =?';
        $this->setQuery($chuoiSQL);
        return $this->loadAllRow(array($SoHD));        
    }
    public function GuiYeuCau($data)
    {
        $chuoiSQL='INSERT INTO lien_he (`email`, `tieu_de`, `noi_dung`, `ngay_lien_he`) VALUES (?,?,?,now())';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['email'], $data['tieu_de'], $data['noi_dung']));
    }
    public function CheckEmail($email)
    {
        $this->setQuery("SELECT email FROM khach_hang WHERE email =?");
        return $this->loadRow(array($email));
    }
    public function UpdatePassWord($password,$postemail)
    {
        $chuoiSQL="UPDATE khach_hang SET mat_khau=? WHERE email=?";
        $this->setQuery($chuoiSQL);
        return $this->execute(array(md5($password),$postemail));
    }

}// ./KhachHangModel
?>