<?php
include_once('models/Database.php');
class ContactModel extends Database
{
    public function getRequireClient()
    {
        $chuoiSQL = 'SELECT * FROM `lien_he`';
        $this->setQuery($chuoiSQL);
        return $this->loadAllRow();
    }   
} // ./BinhLuanModel
?>