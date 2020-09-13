<?php

	class Service 
	{

		public function getAll() { 
			$db = DB::connect();
			$query = (new Select('services'))
                        ->joins([['LEFT', 'service_images', 'service_id', 'image_service_id']])
                        ->where("WHERE `service_is_deleted` = 0")
						->build(); 
			$result = $db->query($query); 
			$services = $result->fetchAll();
			return $services;
		}
        public function addService($serviceInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `services`
					SET `service_name` = '$serviceInfo[service_name]'
			";
			$result = $db->query($query);
            return;
		}
        public function editService($serviceEditInfo) {
            $db = DB::connect();
			$query = "
				UPDATE `services`
					SET `service_name` = '$serviceEditInfo[service_name]'
                    WHERE `service_id` = '$serviceEditInfo[service_id]'
			";
			$result = $db->query($query);
            return;
        }
        public function deleteService($id) {
            $db = DB::connect();
			$query = "
				UPDATE `services`
					SET `service_is_deleted` = 1
					WHERE `service_id` = $id;
			";
			$db->query($query);
			return;
        }
	}
