<?php
include_once('models/Database.php');
class SanPhamModel extends Database
{
    public function SanPhamId($id)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham=?');
        return $this->loadRow(array($id));
    }
    public function TongSanPhamTheoLoaiCon($DSmaloai)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai in({$DSmaloai})");
        return $this->loadNum();
    }
    public function SanPhamTheoLoaiConPhanTrang($DSmaloai,$start,$limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai in({$DSmaloai}) LIMIT {$start},{$limit}");
        return $this->loadAllRow();
    }
    public function DSSanPhamCungLoai($id,$maloai)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham !=? and ma_loai=?');
        return $this->loadAllRow(array($id,$maloai));
    }
    public function SanPhamTheoLoaiPhanTrang($maloai,$start,$limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai=? LIMIT {$start},{$limit}");
        return $this->loadAllRow(array($maloai));
    }
    public function TongSanPhamTheoLoai($maloai)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai={$maloai}");
        return $this->loadNum();
    }
    public function DSSanPhamTheoChuDePhanTrang($ma_chu_de)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE chu_de_id =? ");
        return $this->loadAllRow(array($ma_chu_de));
    }
    public function TongSanPhamTheoChuDe($ma_chu_de)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE chu_de_id = {$ma_chu_de}");
        return $this->loadNum();
    }
}
?>