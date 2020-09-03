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

        public function view($parameters = []) {
			$title = 'Бренды';
			$id = $parameters[0];
            if(!$id){
                echo 'некорректный id';
                exit();
            } else {
                print_r($id);//для отладки
                $brandModel = new Brand();
			    $brandCosm = $brandModel->getCosmeticByBrandId($id);
			    include_once('./views/brands/view.php');

//                echo 'Вызван action view с параметром id = $id';
            }
			return;
		}

	}
