<?php

	class ServicesController {

		public function index() {
			
			$title = 'Салон';
			$serviceModel = new Service();
			$services = $serviceModel->getAll();
			include_once('./views/services/index.php');
			return;
		}

	}