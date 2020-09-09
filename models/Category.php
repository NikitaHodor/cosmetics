<?php

	class Category 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('categories'))
                        ->where("WHERE `category_is_deleted` = 0")
						->build(); 
			$result = $db->query($query); 
			$categories = $result->fetchAll();
			return $categories;
		}
        public function getCosmeticByCategoryId($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
                        ->joins([['LEFT', 'images', 'cosmetic_id', 'image_cosmetic_id']])
						->where("WHERE `cosmetic_category_id` = $id AND `cosmetic_is_deleted` = 0")
						->build(); 
			$result = $db->query($query);
			$categoryCosm = $result->fetchAll();
			return $categoryCosm;
		}
        public function addCategory($categoryInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `categories`
					SET `category_name` = '$categoryInfo[category_name]'
			";
			$result = $db->query($query);
            return;
		}
        public function editCategory($categoryEditInfo) {
            $db = DB::connect();
			$query = "
				UPDATE `categories`
					SET `category_name` = '$categoryEditInfo[category_name]'
                    WHERE `category_id` = '$categoryEditInfo[category_id]'
			";
			$result = $db->query($query);
            return;
        }
        public function deleteCategory($id) {
            $db = DB::connect();
			$query = "
				UPDATE `categories`
					SET `category_is_deleted` = 1
					WHERE `category_id` = $id;
			";
			$db->query($query);
			return;
        }
	}
