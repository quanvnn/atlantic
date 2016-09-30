<?php
include_once('models/Database.php');
class AdminModel extends Database
{
    /**
     * Get info admin
     * 
     * @param  string $name
     * @param  string $pass
     * @return array
     */
    public function getInfoAdmin($name, $pass)
    {
        $this->setQuery('SELECT * FROM nguoi_dung WHERE ten_dang_nhap=? AND mat_khau=?');
        return $this->loadRow(array($name, $pass));
    }

    /**
     * Get products
     * 
     * @return array
     */
    public function getProductAdmin()
    {
        $this->setQuery("SELECT * FROM san_pham ORDER BY ma_san_pham DESC");
        return $this->loadAllRow();
    }

    /**
     * Delete product in database
     * 
     * @param  int $idProduct
     * @return bool
     */
    public function deleteProduct($idProduct)
    {
        $this->setQuery('DELETE FROM san_pham WHERE ma_san_pham=?');
        return $this->execute(array($idProduct));
    }

    /**
     * Insert product into database
     * 
     * @param array $data info products
     * @return bool
     */
    public function addProduct($data)
    {
        $sql = 'INSERT INTO san_pham(`ten_san_pham`, `ten_san_pham_url`, `ma_loai`, `mo_ta`, `gia_bia`, `gia_ban`, `hinh`, `ngay_tao`, `chu_de_id`) VALUES (?,?,?,?,?,?,?,now(),?)';
        $this->setQuery($sql);
        return $this->execute(array($data['ten_san_pham'], $data['ten_san_pham_url'], $data['ma_loai'], $data['mo_ta'], $data['gia_bia'], $data['gia_ban'], $data['hinh'], $data['chu_de_id']));
    }

    /**
     * Update product
     * 
     * @param  array $data info products
     * @return bool
     */
    public function updateProduct($data)
    {
        $sql = "UPDATE san_pham SET ten_san_pham=?, ten_san_pham_url=?, ma_loai=?, mo_ta=?, gia_bia=?, hinh=?, gia_ban=?, ngay_tao=now(), chu_de_id=? WHERE ma_san_pham=?";
        $this->setQuery($sql);
        return $this->execute(array($data['ten_san_pham'], $data['ten_san_pham_url'], $data['ma_loai'], $data['mo_ta'], $data['gia_bia'], $data['hinh'], $data['gia_ban'], $data['chu_de_id'], $data['ma_san_pham']));
    }

    /**
     * Delete category
     * 
     * @param  int $idCategory
     * @return bool
     */
    public function deleteCat($idCategory)
    {
        $this->setQuery('DELETE FROM loai_san_pham WHERE ma_loai=?');
        return $this->execute(array($idCategory));
    }

    /**
     * Insert category into database
     * 
     * @param array $data info categories
     * @return  bool
     */
    public function addCat($data)
    {
        $sql = 'INSERT INTO loai_san_pham(`ten_loai`, `ten_loai_san_pham_url`, `ma_loai_cha`) VALUES (?,?,0)';
        $this->setQuery($sql);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url']));
    }

    /**
     * Insert sub category
     * 
     * @param array $data info sub categories
     * @return  bool
     */
    public function addSubCat($data)
    {
        $sql = 'INSERT INTO loai_san_pham(`ten_loai`, `ten_loai_san_pham_url`, `ma_loai_cha`) VALUES (?,?,?)';
        $this->setQuery($sql);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai_cha']));
    }

    /**
     * Update category
     * 
     * @param  array $data info categories
     * @return bool
     */
    public function updateCat($data)
    {
        $sql = "UPDATE loai_san_pham SET ten_loai=?, ten_loai_san_pham_url=?, ma_loai_cha=0 WHERE ma_loai=?";
                $this->setQuery($sql);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai']));
    }

    /**
     * Update sub category
     * 
     * @param  array $data info sub categories
     * @return bool
     */
    public function updateSubCat($data)
    {
        $sql="UPDATE loai_san_pham SET ten_loai=?, ten_loai_san_pham_url=?, ma_loai_cha=? WHERE ma_loai=?";
                $this->setQuery($sql);
        return $this->execute(array($data['ten_loai'], $data['ten_loai_san_pham_url'], $data['ma_loai_cha'], $data['ma_loai']));
    }
    
    // Bang chu de
    // public function ThemChuDeSanPham($data)
    // {
    //     $chuoiSQL='INSERT INTO chu_de(`ten_chu_de`, `ten_chu_de_url`, `mo_ta`, `hinh`, `ngay_tao`) VALUES (?,?,?,?,now())';
    //     $this->setQuery($chuoiSQL);
    //     return $this->execute(array($data['ten_chu_de'], $data['ten_chu_de_url'], $data['mo_ta'], $data['hinh']));
    // }

    /**
     * Update sub category
     * 
     * @param  array $data info subjects
     * @return bool
     */
    public function updateSubject($data)
    {
        $sql = "UPDATE chu_de SET ten_chu_de=?, ten_chu_de_url=?, mo_ta=?, hinh=? WHERE ma_chu_de=?";
        $this->setQuery($sql);
        return $this->execute(array($data['ten_chu_de'], $data['ten_chu_de_url'], $data['mo_ta'], $data['hinh'], $data['ma_chu_de']));
    }
    

} // ./AdminModel
?>