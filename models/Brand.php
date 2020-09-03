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
	}
