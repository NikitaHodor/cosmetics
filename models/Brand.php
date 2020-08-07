<?php

	class Brand 
	{

		public function getAll() {
			$db = DB::connect();
			$query = "SELECT * FROM `brands` WHERE `brand_is_deleted` = 0";  
			$result = $db->query($query); 
			$brands = $result->fetchAll();
			return $brands;
		}


	}