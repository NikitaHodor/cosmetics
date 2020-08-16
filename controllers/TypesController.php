<?php

	class TypesController
	{

		public function index() {

			$title = 'Типы';
			$typeModel = new Type();
			types = $typeModel->getAll();
			include_once('./views/types/index.php');
			return;
		}

		public function add() {
			echo 'Вызван action add в TypesController';
			return;
		}



	}
