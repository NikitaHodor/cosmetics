<?php

	class ServicesController {

		public function index() {
			
			$title = 'Салон';
			$serviceModel = new Service();
			$services = $serviceModel->getAll();
			include_once('./views/services/index.php');
			return;
		}

        	public function view($parameters = []) {
			$title = 'Салон';
			$id = $parameters[0];
            if(!$id){
                echo 'некорректный id';
                exit();
            } else {
                print_r($id);//для отладки
                $serviceModel = new Service();
			    $service_items = $serviceModel->getServiceItemsById($id);
			    include_once('./views/services/view.php');
            }
			return;
		}

	}
