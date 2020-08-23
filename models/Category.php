<?php

	class Category 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('categories'))
						->build(); 
			$result = $db->query($query); 
			$categories = $result->fetchAll();
			return $categories;
		}
        public function getCosmeticByCategoryId($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
						->where("WHERE `cosmetic_category_id` = $id AND `cosmetic_is_deleted` = 0")
						->build(); 
			$result = $db->query($query);
			$categoryCosm = $result->fetchAll();
			return $categoryCosm;
		}
	}
