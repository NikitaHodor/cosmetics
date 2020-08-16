<?php

	class Type
	{

		public function getAll() {
			$db = DB::connect();
			$query = "SELECT * FROM `types` WHERE `type_is_deleted` = 0";
			$result = $db->query($query);
			$types = $result->fetchAll();
			return $types;
		}


	}
