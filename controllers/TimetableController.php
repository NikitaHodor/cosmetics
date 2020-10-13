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

            $serviceModel = new Service();
            $service = $serviceModel->getById($serviceId);
            $specID = $service['service_specialist_id'];

            $timetableModel = new Timetable();

            if(isset($_GET)){
                $table = $timetableModel->getTimetable($specID);
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
                  $userId = $_POST['user_id'];
                  $status = 'запись';
                  $Info = array(
                    'service_item_id' => $serviceItemId,
                    'location' => $location,
                    'date_start' => $dateStart,
                      'date_end' => $dateEnd,
                      'specialist_id' => $service['service_specialist_id'],
                      'user_id' => $userId,
                      'status' => $status
                    );

			 $timetableAddModel->addTimetable($Info);
                header('Location: ' . SITE_ROOT . 'timetable/add/'  .  $serviceId . '/' . $serviceItemId);
                return;
              }
            }
        }
