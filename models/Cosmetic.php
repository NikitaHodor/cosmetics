<?php

	class Cosmetic 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('cosmetics'))
						->joins([['LEFT', 'brands', 'cosmetic_brand_id', 'brand_id']])
                        ->joins([['LEFT', 'images', 'cosmetic_id', 'image_cosmetic_id']])
						->where('WHERE `cosmetic_is_deleted` = 0')
						->build(); 
			$result = $db->query($query); 
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}
        public function addCosmetics($cosmeticArray) {
			$db = DB::connect();
			$query = "
					INSERT INTO `cosmetics`
					SET `cosmetic_name` = '$cosmeticArray[cosmetic_name]',
                    `cosmetic_type_id` = '$cosmeticArray[cosmetic_type]',
                    `cosmetic_category_id` = '$cosmeticArray[cosmetic_category]',
					`cosmetic_brand_id` = '$cosmeticArray[cosmetic_brand]',
					`cosmetic_price` = '$cosmeticArray[cosmetic_price]',
					`cosmetic_volume` = '$cosmeticArray[cosmetic_volume]',
                    `cosmetic_country_id` = '$cosmeticArray[cosmetic_country]',
					`cosmetic_description` = '$cosmeticArray[cosmetic_description]';
				";

			$db->query($query);
			return;
		}

        public function getRandom() {
			$db = DB::connect();
			$query = "
            SELECT * FROM `cosmetics`
            WHERE `cosmetic_is_deleted` = 0
            ORDER BY RAND()
            LIMIT 3;
            ";
			$result = $db->query($query);
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}

		public function getCosmeticById($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
                ->joins([['LEFT', 'images', 'cosmetic_id', 'image_cosmetic_id']])
						->where("WHERE `cosmetic_id` = $id")
						->build(); 
			$result = $db->query($query);
			$cosmetic = $result->fetch();
			return $cosmetic;
		}

		public function updateCosmetic($cosmetic) {
			$db = DB::connect(); 
			$query = "UPDATE `cosmetics`
                        SET `cosmetic_name` = '$cosmetic[cosmetic_name]',
                    `cosmetic_type_id` = '$cosmetic[cosmetic_type]',
                    `cosmetic_category_id` = '$cosmetic[cosmetic_category]',
					`cosmetic_brand_id` = '$cosmetic[cosmetic_brand]',
					`cosmetic_price` = '$cosmetic[cosmetic_price]',
					`cosmetic_volume` = '$cosmetic[cosmetic_volume]',
                    `cosmetic_country_id` = '$cosmetic[cosmetic_country]',
					`cosmetic_description` = '$cosmetic[cosmetic_description]'
                        WHERE `cosmetic_id` = $cosmetic[cosmetic_id]
            "; 
			$db->query($query);
			return;
		}

		public function deleteCosmeticById($id) {
			$db = DB::connect();
			$query = "
				UPDATE `cosmetics`
					SET `cosmetic_is_deleted` = 1 
					WHERE `cosmetic_id` = $id;
			";
			$db->query($query);
			return;
		}

		public function getCosmeticListForOrder($idList = []) {
			$db = DB::connect();
			$ids = implode(', ', $idList);
			$query = (new Select('cosmetics'))
						->where("WHERE `cosmetic_id` IN ($ids)")
						->build();

			$result = $db->query($query); 
			$cosmeticList = $result->fetchAll();
			return $cosmeticList;
		}
	}
