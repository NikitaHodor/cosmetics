<?php

    class Search
    {
        public function getAll($search) {
            $db = DB::connect();
			$query = (new Select('cosmetics'))
						->where("WHERE `cosmetic_name` LIKE '%$search%'")//пока колхозный вариант
						->build();
			$result = $db->query($query);
			$searchResults = $result->fetchAll();
			return $searchResults;
        }
    }
