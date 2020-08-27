<?php

	class CosmeticsProxyController
	{
		private $controller; 

		public function __construct() {
			$this->controller = new CosmeticsController();
		}

		public function add() {
			if (User::checkIfAdminAuthorized()) {
				$this->controller->add();
			} else {
				echo "У вас нет прав";
				return;
			}
		}

		public function edit($parameters = []) {
			if (User::checkIfAdminAuthorized()) {
				$this->controller->edit($parameters);
			} else {
				echo "У вас нет прав";
				return;
			}
		}

		public function delete($parameters = []) {
			if (User::checkIfAdminAuthorized()) {
				$this->controller->delete($parameters);
			} else {
				echo "У вас нет прав";
				return;
			}
		}

	}
