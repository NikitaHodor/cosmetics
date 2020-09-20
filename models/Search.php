<?php

    class Search
    {
        public function getAll($search) {
            $db = DB::connect();
			$query = (new Select('cosmetics'))
                        ->joins([['LEFT', 'brands', 'cosmetic_brand_id', 'brand_id']])
                        ->joins([['LEFT', 'images', 'cosmetic_id', 'image_cosmetic_id']])
						->where("WHERE `cosmetic_name` LIKE '%$search%' AND `cosmetic_is_deleted` = 0")//пока колхозный вариант
						->build();
			$result = $db->query($query);
			$searchResults = $result->fetchAll();
			return $searchResults;
        }
        public function searchCosmeticById($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
                        ->joins([['LEFT', 'images', 'cosmetic_id', 'image_cosmetic_id']])
						->where("WHERE `cosmetic_id` = $id")
						->build();
			$result = $db->query($query);
			$cosmetic = $result->fetch();
			return $cosmetic;
		}
    }
