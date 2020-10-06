<?php
class MainPage {
    public function getMainCosmetic($page_first_result, $results_per_page) {
			$db = DB::connect();
			$query = "
            SELECT * FROM `cosmetics`
            LEFT JOIN `images` ON `cosmetic_id` = `image_cosmetic_id`
            WHERE `cosmetic_is_deleted` = 0
            LIMIT $results_per_page
            OFFSET $page_first_result
            ";
        //ORDER BY RAND()
            //LIMIT 6;
			$result = $db->query($query);
			$cosmetics = $result->fetchAll();
			return $cosmetics;
		}

    public function getNumRows() {
			$db = DB::connect();
			$query = (new Select('cosmetics'))
						->where('WHERE `cosmetic_is_deleted` = 0')
						->build();
			$result = $db->query($query);
			$number_of_result = $result->rowCount();
			return $number_of_result;
    }
}
