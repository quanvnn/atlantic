<?php
include_once('models/Database.php');
class ChuDeModel extends Database
{
    public function DanhSachChuDe()
    {
        $this->setQuery('SELECT * FROM chu_de');
        return $this->loadAllRow();
    }
    public function ChuDeId($id)
    {
    	$this->setQuery('SELECT * FROM chu_de WHERE ma_chu_de =?');
    	return $this->loadRow(array($id));
    }
    
} // ./AdminModel
?>