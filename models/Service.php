<?php

	class Service 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('services'))
                        ->where("WHERE `service_is_deleted` = 0")
						->build(); 
			$result = $db->query($query); 
			$services = $result->fetchAll();
			return $services;
		}

	}
