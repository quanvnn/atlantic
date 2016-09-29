<?php
class HelperController
{
	private $dataErr = array(
							'ten_san_pham'=>'', 
							'ten_san_pham_url'=>'',
							'mo_ta'=>'',
							'gia_bia'=>'',
							'gia_ban'=>'',
							'hinh'=>'',
							'ten_loai'=>'',
							'ten_loai_san_pham_url'=>'',
							'ten_chu_de'=>'',
							'ten_chu_de_url'=>'',
							);
	public function checkData($data)
	{
		$kq = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_san_pham'] == '') {
			$this->dataErr['ten_san_pham'] = $message;
			$kq = false;
		}
		if ($data['ten_san_pham_url'] == '') {
			$this->dataErr['ten_san_pham_url'] = $message;
			$kq = false;
		}
		if ($data['mo_ta']=='') {
			$this->dataErr['mo_ta'] = $message;
			$kq = false;
		}
		if ($data['gia_bia'] == '') {
			$this->dataErr['gia_bia'] = $message;
			$kq = false;
		}
		if ($data['gia_ban'] == '') {
			$this->dataErr['gia_ban'] = $message;
			$kq = false;
		}
		if ($data['hinh']['error'] !== 0) {
			$this->dataErr['hinh'] = $message;
			$kq = false;
		}
		return $kq;
	}
	public function getDataErr()
	{
		return $this->dataErr;
	}
	public function checkimage($img)
	{
		//$img = $_FILES['hinh'];
        $arrType = explode('.', $img['name']);
        $type = end($arrType);
        //var_dump($type); exit();
        $imgUploadOk = 1;
        if ($type != 'jpg' && $type != 'jpeg' && $type != 'gif' && $type != 'png') {
            $imgUploadOk = 0;
        }
        if ($img['type'] != 'image/jpeg' && $img['type'] != 'image/jpg' && $img['type'] != 'image/png' && $img['type'] != 'image/gif') {
            $imgUploadOk = 0;
        }
        if ($img['size'] > 2000000) {
            $imgUploadOk = 0;
        }
        return $imgUploadOk;
	}
	public function checkDataLoaiSanPham($data)
	{
		$kq = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_loai'] == '') {
			$this->dataErr['ten_loai'] = $message;
			$kq = false;
		}
		if ($data['ten_loai_san_pham_url'] == '') {
			$this->dataErr['ten_loai_san_pham_url'] = $message;
			$kq = false;
		}
		return $kq;
	}
	public function checkDataChuDe($data)
	{
		//var_dump($data);exit();
		$kq = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_chu_de'] == '') {
			$this->dataErr['ten_chu_de'] = $message;
			$kq = false;
		}
		if ($data['ten_chu_de_url'] == '')
		{
			$this->dataErr['ten_chu_de_url'] = $message;
			$kq = false;
		}
		if($data['mo_ta'] == '') {
			$this->dataErr['mo_ta'] = $message;
			$kq = false;
		}
		if ($data['hinh']['error'] !== 0) {
			$this->dataErr['hinh'] = $message;
			$kq = false;
		}
		return $kq;
	}
}
?>