<?php

	class CategoriesController {

		public function index() {
			
			$title = 'Каталог';
			$categoryModel = new Category();
			$categories = $categoryModel->getAll();
			include_once('./views/categories/index.php');
			return;
		}
        public function view($parameters = []) {
			$title = 'Каталог';
			$id = $parameters[0];
            if(!$id){
                echo 'некорректный id';
                exit();
            } else {
                print_r($id);//для отладки
                $categoryModel = new Category();
			    $category = $categoryModel->getCosmeticByCategoryId($id);
			    include_once('./views/categories/view.php');
			 
//                echo 'Вызван action view с параметром id = $id';
            }
			return;
		}

	}
