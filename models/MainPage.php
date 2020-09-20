<?php
class MainPage {
    public function getRandomCosmetic() {
			$db = DB::connect();
			$query = "
            SELECT * FROM `cosmetics`
            LEFT JOIN `images` ON `cosmetic_id` = `image_cosmetic_id`
            WHERE `cosmetic_is_deleted` = 0
            ORDER BY RAND()
            LIMIT 6;
            ";
			$result = $db->query($query);
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}
}
