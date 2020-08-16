<?php

	class CountriesController
	{

		public function index() {

			$title = 'Страны';
			$countryModel = new Country();
			$countries = $countryModel->getAll();
			include_once('./views/countries/index.php');
			return;
		}

		public function add() {
			echo 'Вызван action add в CountriesController';
			return;
		}



	}
