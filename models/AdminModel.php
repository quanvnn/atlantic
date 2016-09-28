<?php
include_once('models/Database.php');
class AdminModel extends Database
{
    public function getNguoiDungDangNhap($tendangnhap, $matkhau)
    {
        $this->setQuery('SELECT * FROM nguoi_dung WHERE ten_dang_nhap=? AND mat_khau=?');
        return $this->loadRow(array($tendangnhap, $matkhau));
    }
    // Bang san pham
    public function DSSanPhamAdmin()
    {
        $this->setQuery("SELECT * FROM san_pham ORDER BY ma_san_pham DESC");
        return $this->loadAllRow();
    }
    public function XoaSanPham($id)
    {
        $this->setQuery('DELETE FROM san_pham WHERE ma_san_pham=?');
        return $this->execute(array($id));
    }
    public function ThemSanPham($data)
    {
        $chuoiSQL = 'INSERT INTO san_pham(`ten_san_pham`, `ten_san_pham_url`, `ma_loai`, `mo_ta`, `gia_bia`, `gia_ban`, `hinh`, `ngay_tao`, `chu_de_id`) VALUES (?,?,?,?,?,?,?,now(),?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_san_pham'], $data['ten_san_pham_url'], $data['ma_loai'], $data['mo_ta'], $data['gia_bia'], $data['gia_ban'], $data['hinh'], $data['chu_de_id']));
    }
    public function CapNhatSanPham($data)
    {
        $chuoiSQL = "UPDATE san_pham SET ten_san_pham=?, ten_san_pham_url=?, ma_loai=?, mo_ta=?, gia_bia=?, hinh=?, gia_ban=?, ngay_tao=now(), chu_de_id=? WHERE ma_san_pham=?";
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_san_pham'], $data['ten_san_pham_url'], $data['ma_loai'], $data['mo_ta'], $data['gia_bia'], $data['hinh'], $data['gia_ban'], $data['chu_de_id'], $data['ma_san_pham']));
    }
    // Bang loai san pham
    public function XoaLoaiSanPham($maloai)
    {
        $this->setQuery('DELETE FROM loai_san_pham WHERE ma_loai=?');
        return $this->execute(array($maloai));
    }
    public function ThemLoaiSanPham($data)
    {
        $chuoiSQL = 'INSERT INTO loai_san_pham(`ten_loai`, `ten_loai_san_pham_url`, `ma_loai_cha`) VALUES (?,?,0)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url']));
    }
    public function ThemLoaiCon($data)
    {
        $chuoiSQL = 'INSERT INTO loai_san_pham(`ten_loai`, `ten_loai_san_pham_url`, `ma_loai_cha`) VALUES (?,?,?)';
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai_cha']));
    }
    public function CapNhatLoaiCha($data)
    {
        $chuoiSQL = "UPDATE loai_san_pham SET ten_loai=?, ten_loai_san_pham_url=?, ma_loai_cha=0 WHERE ma_loai=?";
                $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai']));
    }
    public function CapNhatLoaiCon($data)
    {
        $chuoiSQL="UPDATE loai_san_pham SET ten_loai=?, ten_loai_san_pham_url=?, ma_loai_cha=? WHERE ma_loai=?";
                $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai_cha'], $data['ma_loai']));
    }
    // Bang chu de
    // public function ThemChuDeSanPham($data)
    // {
    //     $chuoiSQL='INSERT INTO chu_de(`ten_chu_de`, `ten_chu_de_url`, `mo_ta`, `hinh`, `ngay_tao`) VALUES (?,?,?,?,now())';
    //     $this->setQuery($chuoiSQL);
    //     return $this->execute(array($data['ten_chu_de'], $data['ten_chu_de_url'], $data['mo_ta'], $data['hinh']));
    // }
    public function CapNhatChuDe($data)
    {
        $chuoiSQL = "UPDATE chu_de SET ten_chu_de=?, ten_chu_de_url=?, mo_ta=?, hinh=? WHERE ma_chu_de=?";
        $this->setQuery($chuoiSQL);
        return $this->execute(array($data['ten_chu_de'], $data['ten_chu_de_url'], $data['mo_ta'], $data['hinh'], $data['ma_chu_de']));
    }
    

} // ./AdminModel
?>