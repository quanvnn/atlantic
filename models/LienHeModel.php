<?php
include_once('models/Database.php');
class LienHeModel extends Database
{
    public function DSYeuCauKhachHang()
    {
        $chuoiSQL = 'SELECT * FROM `lien_he`';
        $this->setQuery($chuoiSQL);
        return $this->loadAllRow();
    }   
} // ./BinhLuanModel
?>