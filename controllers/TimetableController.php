 <?php

    class TimetableController
        {


            public function index($parameters = []) {

            $title = 'Запись на приём';


                include_once('./views/timetable/index.php');
        }
        public function tableData($parameters = []) {
//            $serviceItemId = $parameters[1];
            $serviceId = $parameters[0];
            $timetableModel = new Timetable();


//                foreach($timetable as $table) {
//                    $timetableArr[] = $table;
//                }
//                $jsonTable = json_encode($timetable, JSON_UNESCAPED_UNICODE);

//ACTION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            if(isset($_GET)){
                $table = $timetableModel->getTimetable($serviceId);
                $dataJson = json_encode($table, JSON_UNESCAPED_UNICODE);
                echo $dataJson;
                header('Content-type: application/json');
                exit();
            }
        }

        public function addTimetable($parameters = []) {
                if(isset($_POST['location']) && isset($_POST['date_start'])&& isset($_POST['date_end'])){
                  $serviceItemId = $parameters[1];
                  $serviceId = $parameters[0];


                  $serviceModel = new Service();
			      $service = $serviceModel->getById($serviceId);

                  $timetableAddModel = new Timetable();
                  $location = $_POST['location'];
                  $dateStart = $_POST['date_start'];
                  $dateEnd = $_POST['date_end'];
                  $Info = array(
                    'service_item_id' => $serviceItemId,
                    'location' => $location,
                    'date_start' => $dateStart,
                      'date_end' => $dateEnd,
                      'specialist_id' => $service['service_specialist_id']
                    );

			 $timetableAddModel->addTimetable($Info);
                header('Location: ' . SITE_ROOT . 'timetable/add/' . $serviceItemId . '/' . $serviceId);
                return;
              }
            }
        }
