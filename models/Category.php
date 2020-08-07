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
						->where("WHERE `cosmetic_category_id` = $id")
						->build(); 
			$result = $db->query($query);
			$category = $result->fetch();
			return $category;
		}
	}