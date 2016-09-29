<?php

include_once "models/Database.php";
class ProductModel extends Database
{
    public function getProductById($id)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham=?');
        return $this->loadRow(array($id));
    }
    public function countProductsInSubCat($DSmaloai)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai in({$DSmaloai})");
        return $this->loadNum();
    }
    public function getProductsInSubCat($DSmaloai, $start, $limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai in({$DSmaloai}) LIMIT {$start},{$limit}");
        return $this->loadAllRow();
    }
    public function getProductsFromTheSameCat($id, $maloai)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham !=? and ma_loai=?');
        return $this->loadAllRow(array($id,$maloai));
    }
    public function getProductInCat($maloai, $start, $limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai=? LIMIT {$start},{$limit}");
        return $this->loadAllRow(array($maloai));
    }
    public function countProductsInCat($maloai)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai={$maloai}");
        return $this->loadNum();
    }
    public function getProductInSubject($ma_chu_de)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE chu_de_id =? ");
        return $this->loadAllRow(array($ma_chu_de));
    }
    public function countProductsInSubject($ma_chu_de)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE chu_de_id = {$ma_chu_de}");
        return $this->loadNum();
    }
}
?>