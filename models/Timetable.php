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
                UPDATE `timetable`
					SET `timetable_status` = '$Info[status]'
                  WHERE `timetable_service_items_id` = '$Info[service_item_id]'
                    AND `timetable_location` = '$Info[location]'
                    AND `timetable_start_date` = '$Info[date_start]'
                    AND `timetable_end_date` = '$Info[date_end]'
                    AND `timetable_specialist_id` = '$Info[specialist_id]'
			";
			$result = $db->query($query);
            return;
		}
    }
