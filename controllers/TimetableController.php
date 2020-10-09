 <?php

    class TimetableController
        {


            public function index($parameters = []) {

            $title = 'Запись на приём';
            $data = [];
            $serviceItemId = $parameters[0];
            $serviceId = $parameters[1];
            $timetableModel = new Timetable();


//                foreach($timetable as $table) {
//                    $timetableArr[] = $table;
//                }
//                $jsonTable = json_encode($timetable, JSON_UNESCAPED_UNICODE);

//ACTION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//            if(isset($_GET)){
                $this->data = $timetableModel->getTimetable($serviceId);
//               header('Content-type: application/json');
                $dataJson = json_encode($this, JSON_UNESCAPED_UNICODE);
                echo $dataJson;
//            }


                include_once('./views/timetable/index.php');
        }

        public function addTimetable($parameters = []) {
                if(isset($_POST['location']) && isset($_POST['date_start'])&& isset($_POST['date_end'])){
                  $serviceItemId = $parameters[0];
                  $serviceId = $parameters[1];


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
