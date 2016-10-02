<?php
class HelperController
{
	private $dataErr = [
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
					];

	/**
	 * Funtion check data product
	 * Data must not be empty
	 * 
	 * @param  array $data
	 * @return bool
	 */
	public function checkData($data)
	{
		$result = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_san_pham'] == '') {
			$this->dataErr['ten_san_pham'] = $message;
			$result = false;
		}
		if ($data['ten_san_pham_url'] == '') {
			$this->dataErr['ten_san_pham_url'] = $message;
			$result = false;
		}
		if ($data['mo_ta'] =='') {
			$this->dataErr['mo_ta'] = $message;
			$result = false;
		}
		if ($data['gia_bia'] == '') {
			$this->dataErr['gia_bia'] = $message;
			$result = false;
		}
		if ($data['gia_ban'] == '') {
			$this->dataErr['gia_ban'] = $message;
			$result = false;
		}
		if ($data['hinh']['error'] !== 0) {
			$this->dataErr['hinh'] = $message;
			$result = false;
		}
		return $result;
	}

	/**
	 * Get data error after check
	 * 
	 * @return array
	 */
	public function getDataErr()
	{
		return $this->dataErr;
	}
	
	/**
	 * Function check file ? image
	 * @param  array $img
	 * @return bool
	 */
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

	/**
	 * Check data categories
	 * Data must not be empty
	 * 
	 * @param  array $data
	 * @return bool
	 */
	public function checkDataCategory($data)
	{
		$result = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_loai'] == '') {
			$this->dataErr['ten_loai'] = $message;
			$result = false;
		}
		if ($data['ten_loai_san_pham_url'] == '') {
			$this->dataErr['ten_loai_san_pham_url'] = $message;
			$result = false;
		}
		return $result;
	}

	/**
	 * Check data subjects
	 * Data must not be empty
	 * 
	 * @param  array $data
	 * @return bool
	 */
	public function checkDataSubject($data)
	{
		//var_dump($data);exit();
		$result = true;
		$message = '<span style="color:#ff0000">*</span>';
		// ta có thể thay đổi câu thông báo lỗi ra trình duyệt bằng cách thay đổi biến $message
		// hàm chỉ mới validate cơ bản các trường ko được để trống, ta nên validate thêm nhiều thứ khác nữa ví dụ strip tags...
		if ($data['ten_chu_de'] == '') {
			$this->dataErr['ten_chu_de'] = $message;
			$result = false;
		}
		if ($data['ten_chu_de_url'] == '')
		{
			$this->dataErr['ten_chu_de_url'] = $message;
			$result = false;
		}
		if($data['mo_ta'] == '') {
			$this->dataErr['mo_ta'] = $message;
			$result = false;
		}
		if ($data['hinh']['error'] !== 0) {
			$this->dataErr['hinh'] = $message;
			$result = false;
		}
		return $result;
	}
}
?>