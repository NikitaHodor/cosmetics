<?php

	class Country
	{

		public function getAll() {
			$db = DB::connect();
			$query = "SELECT * FROM `countries` WHERE `country_is_deleted` = 0";
			$result = $db->query($query);
			$countries = $result->fetchAll();
			return $countries;
		}


	}
