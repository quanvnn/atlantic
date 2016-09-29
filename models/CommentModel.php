<?php
include_once('models/Database.php');
class CommentModel extends Database
{
    public function addComment($title, $content, $idClient, $idProduct)
    {
        $sql = 'INSERT INTO binh_luan(`tieu_de`, `noi_dung`, `khach_hang_id`, `sach_id`, `date`) VALUES (?,?,?,?,now())';
        $this->setQuery($sql);
        return $this->execute(array($title, $content, $idClient, $idProduct));
    }
    public function getComment($idProduct)
    {
        $sql = 'SELECT `binh_luan`.`tieu_de`,`binh_luan`.`noi_dung`,`binh_luan`.`date`, `khach_hang`.`ten_khach_hang`, `khach_hang`.`avatar`
          FROM `binh_luan` 
          INNER JOIN  `khach_hang` ON `binh_luan`.`khach_hang_id`=`khach_hang`.`ma_khach_hang` 
          Where `binh_luan`.`sach_id` =?';
        $this->setQuery($sql);
        return $this->loadAllRow(array($idProduct));
    }
    public function getCommentAdmin()
    {
        $sql = "SELECT `binh_luan`.`id`, `binh_luan`.`tieu_de`, `binh_luan`.`noi_dung`, `binh_luan`.`date`, `khach_hang`.`ten_khach_hang`, `san_pham`.`ten_san_pham`
            FROM `binh_luan`
            INNER JOIN `khach_hang` ON `binh_luan`.`khach_hang_id` = `khach_hang`.`ma_khach_hang`
            INNER JOIN `san_pham` ON `binh_luan`.`sach_id` = `san_pham`.`ma_san_pham`";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    public function deleteComment($idComment)
    {
        $this->setQuery('DELETE FROM binh_luan WHERE id=?');
        return $this->execute(array($idComment));
    }
} // ./BinhLuanModel
?>