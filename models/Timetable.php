<?php

    class Timetable
    {


        public function getTimetable($serviceId) {
			$db = DB::connect();
			$query = (new Select('timetable'))
						->joins([['LEFT', 'service_items', 'timetable_service_items_id', 'id'], ['LEFT', 'specialists', 'timetable_specialist_id', 'specialist_id']])
                        ->where("WHERE `services_service_id` = $serviceId")
						->build();
			$result = $db->query($query);
			$timetable = $result->fetchAll();
			return $timetable;
		}
        public function addTimetable($Info) {
            $db = DB::connect();
			$query = "
                INSERT INTO `timetable`
					SET `timetable_service_items_id` = '$Info[service_item_id]',
                        `timetable_location` = '$Info[location]',
                        `timetable_start_date` = '$Info[date_start]',
                        `timetable_end_date` = '$Info[date_end]',
                        `timetable_specialist_id` = '$Info[specialist_id]'
			";
			$result = $db->query($query);
            return;
		}
    }
