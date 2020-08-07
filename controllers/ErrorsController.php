<?php

	class ErrorsController {

		public function index() {
			
			$title = 'error';
			include_once('./views/errors/index.php');
			return;
		}

	}