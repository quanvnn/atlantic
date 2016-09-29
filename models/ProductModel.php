<?php

include_once "models/Database.php";
class ProductModel extends Database
{
    public function getProductById($id)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham=?');
        return $this->loadRow(array($id));
    }
    public function countProductsInSubCat($stringIdCategory)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai in({$stringIdCategory})");
        return $this->loadNum();
    }
    public function getProductsInSubCat($stringIdCategory, $start, $limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai in({$stringIdCategory}) LIMIT {$start},{$limit}");
        return $this->loadAllRow();
    }
    public function getProductsFromTheSameCat($idProduct, $idCategory)
    {
        $this->setQuery('SELECT * FROM san_pham WHERE ma_san_pham !=? and ma_loai=?');
        return $this->loadAllRow(array($idProduct, $idCategory));
    }
    public function getProductInCat($idCategory, $start, $limit)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE ma_loai=? LIMIT {$start},{$limit}");
        return $this->loadAllRow(array($idCategory));
    }
    public function countProductsInCat($idCategory)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE ma_loai={$idCategory}");
        return $this->loadNum();
    }
    public function getProductInSubject($idSubject)
    {
        $this->setQuery("SELECT * FROM san_pham WHERE chu_de_id =? ");
        return $this->loadAllRow(array($idSubject));
    }
    public function countProductsInSubject($idSubject)
    {
        $this->setQuery("SELECT count(ma_san_pham) FROM san_pham WHERE chu_de_id = {$idSubject}");
        return $this->loadNum();
    }
}
?>