<?php

	class Validation 
	{
        public function checkEmptyness($smth) {
			if(empty($smth)){
                return false;
            } else{
                return true;
            }
		}

		public function checkLength($str, $length = 2) {
			return strlen($str) >= $length; 
		}

		public function checkIfRegExp($str, $reg) {
			return preg_match(); 
		}

		public function checkNumber($number, $maxNumber, $minNumber) {
			return ($minNumber <= $number) && ($number <= $maxNumber); 
		}

        public function checkImage($filesArr){
  // Check if image file is a actual image or fake image
                return getimagesize($filesArr["tmp_name"]);
}
        public function checkImageExist($imgUrl){
  // Check if file already exists
                return file_exists($imgUrl);
	}

        public function checkImageSize($filesArr) {
            // Check file size
                if ($filesArr["size"] > 500000) {
                return false;
                } else {
                    return true;
                }
        }

        public function checkImageType($imageFileType) {
                            // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                return false;
                } else {
                    return true;
                }
        }
    }
