<?php

	class Cosmetic 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('cosmetics'))
						->joins([['LEFT', 'brands', 'cosmetic_brand_id', 'brand_id']])
						->where('WHERE `cosmetic_is_deleted` = 0')
						->build(); 
			$result = $db->query($query); 
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}

		public function getCosmeticById($id) {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
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
                            `cosmetic_price` = $cosmetic[cosmetic_price],
                            `cosmetic_volume` = $cosmetic[cosmetic_volume],
                            `cosmetic_brand_id` = $cosmetic[cosmetic_brand]
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
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}
	}