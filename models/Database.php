<?php
class Database
{
    protected $pdo='';
    protected $sql='';
    protected $stateMent='';

    public function Database()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost; dbname=atlantic','root','lequan');
            $this->pdo->query('set names utf8');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function setQuery($sql)
    {
        $this->sql = $sql;
    }
    //Thực hiện truy vấn hành động: insert, update, delete
    public function execute($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent;
    }
    //Truy xuất liệt kê danh sách
    public function loadAllRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetchAll(PDO::FETCH_ASSOC);
    }
    //Truy xuất 1 mẫu tin
    public function loadRow($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetch(PDO::FETCH_ASSOC);
    }
    //Function count the record on the table
    public function loadRecord($option=array()) 
    {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    public function CountAll($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option=array());
        return $this->stateMent->rowCount();
    }
    public function loadNum($option=array())
    {
        $this->stateMent=$this->pdo->prepare($this->sql);
        $this->stateMent->execute($option);
        return $this->stateMent->fetch(PDO::FETCH_NUM);
    }
}
?>