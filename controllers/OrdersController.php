<?php

	class OrdersController
	{

		public function add() {
			$cartString = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : ""; 
			if ($cartString !== "") {
				$cart = json_decode($cartString, true);
				
			} else {
				header('Location: ' . SITE_ROOT . 'cosmetics/list');
			}

		}
	}