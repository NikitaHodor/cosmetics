<?php

	class ContactsController
	{

		public function index() {

			$title = 'Контакты';

			include_once('./views/contacts/index.php');
			return;
		}

	}
