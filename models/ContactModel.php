<?php
include_once('models/Database.php');
class ContactModel extends Database
{
    public function getRequireClient()
    {
        $sql = 'SELECT * FROM `lien_he`';
        $this->setQuery($sql);
        return $this->loadAllRow();
    }   
} // ./BinhLuanModel
?>