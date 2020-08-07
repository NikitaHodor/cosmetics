<?php

	class Service 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('services'))
						->build(); 
			$result = $db->query($query); 
			$services = $result->fetchAll();
			return $services;
		}

	}