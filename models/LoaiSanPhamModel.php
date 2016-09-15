<?php
include_once('models/Database.php');
class LoaiSanPhamModel extends Database
{
    public function DSLoaiSanPham()
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai_cha=0');
        $DSLoaiCha=$this->loadAllRow();
        //Tạo mảng chứa loại sản phẩm
        $mangLoaiSanPham=array();
        foreach($DSLoaiCha as $loaicha)
        {
            $mangLoaiSanPham[]=array($loaicha,$this->DSLoaiSanPhamCon($loaicha['ma_loai']));
        }
        return $mangLoaiSanPham;
    }
    // Truy xuất danh sách loại con dựa vào mã loại cha
    public function DSLoaiSanPhamCon($maloaicha)
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai_cha=?');
        return $this->loadAllRow(array($maloaicha));
    }
    public function DSLoaiSanPhamId($ma_loai)
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai=?');
        return $this->loadRow(array($ma_loai));
    }
    // Truy xuất loại sản phẩm dựa vào tên loại url
    public function LoaiSanPhamTheoUrl($chuoi)
    {
        $this->setQuery("SELECT * FROM loai_san_pham WHERE ten_loai_san_pham_url=?");
        return $this->loadRow(array($chuoi));
    }
    public function LoaiSanPhamMaLoai($maloai)
    {
        $this->setQuery("SELECT * FROM loai_san_pham WHERE ma_loai=?");
        return $this->loadRow(array($maloai));
    }
}
?>