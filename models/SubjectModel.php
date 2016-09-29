<?php
include_once('models/Database.php');
class SubjectModel extends Database
{
    public function getSubject()
    {
        $this->setQuery('SELECT * FROM chu_de');
        return $this->loadAllRow();
    }
    public function getSubjectID($idSubject)
    {
    	$this->setQuery('SELECT * FROM chu_de WHERE ma_chu_de =?');
    	return $this->loadRow(array($idSubject));
    }
    
} // ./AdminModel
?>