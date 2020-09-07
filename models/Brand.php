<?php

	class Brand 
	{

		public function getAll() {
			$db = DB::connect();
			$query = "SELECT * FROM `brands` WHERE `brand_is_deleted` = 0";  
			$result = $db->query($query); 
			$brands = $result->fetchAll();
			return $brands;
		}

        public function getCosmeticByBrandId($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
						->where("WHERE `cosmetic_brand_id` = $id AND `cosmetic_is_deleted` = 0")
						->build();
			$result = $db->query($query);
			$brandCosm = $result->fetchAll();
			return $brandCosm;
		}
        public function addBrand($brandInfo) {
            $db = DB::connect();
			$query = "
				INSERT INTO `brands`
					SET `brand_name` = '$brandInfo[brand_name]'
			";
			$result = $db->query($query);
            return;
        }
        public function editBrand($brandEditInfo) {
            $db = DB::connect();
			$query = "
				UPDATE `brands`
					SET `brand_name` = '$brandEditInfo[brand_name]'
                    WHERE `brand_id` = '$brandEditInfo[brand_id]'
			";
			$result = $db->query($query);
            return;
        }
        public function deleteBrand($id) {
            $db = DB::connect();
			$query = "
				UPDATE `brands`
					SET `brand_is_deleted` = 1
					WHERE `brand_id` = $id;
			";
			$db->query($query);
			return;
        }
	}
