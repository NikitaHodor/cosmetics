<?php

	class BrandsController 
	{

		public function index() {
			
			$title = 'Бренды';
			$brandModel = new Brand();
			$brands = $brandModel->getAll();
			include_once('./views/brands/index.php');
			return;
		}

		public function add() {
			echo 'Вызван action add в BrandsController';
			return;
		}



	}