<?php
include_once('models/Database.php');
class CategoryModel extends Database
{
    public function getCat()
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai_cha=0');
        $categories = $this->loadAllRow();
        //Tạo mảng chứa loại sản phẩm
        $arrayCatergory = array();
        foreach($categories as $categorie) {
            $arrayCatergory[] = array($categorie, $this->getSubCat($categorie['ma_loai']));
        }
        return $arrayCatergory;
    }
    // Truy xuất danh sách loại con dựa vào mã loại cha
    public function getSubCat($idCategory)
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai_cha=?');
        return $this->loadAllRow(array($idCategory));
    }
    public function getCatByID($idCategory)
    {
        $this->setQuery('SELECT * FROM loai_san_pham WHERE ma_loai=?');
        return $this->loadRow(array($idCategory));
    }
    // Truy xuất loại sản phẩm dựa vào tên loại url
    public function getCatByUrl($url)
    {
        $this->setQuery("SELECT * FROM loai_san_pham WHERE ten_loai_san_pham_url=?");
        return $this->loadRow(array($url));
    }
}
?>