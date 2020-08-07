<?php

	class CartsController 
	{

		public function index() {
			$title = 'Корзина';
			$cartString = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : ""; 
            $cart = "";
			if ($cartString !== "") {
				$cart = json_decode($cartString, true);
				if (isset($_POST['user_name'])) {
					$helper = new Helper();
					$user_name = $helper->escape($_POST['user_name']); 
					$user_phone = $helper->escape($_POST['user_phone']); 
					$user_email = $helper->escape($_POST['user_email']);
					// TODO: check validation for user field()
					$orderInfo = "имя: $user_name, телефон: $user_phone, email: $user_email";
					$cartModel = new Cart();
					$cartModel->addNewOrder($cart, $orderInfo); 
					setcookie('cart', '', 1, '/');
					header('Location: ' . SITE_ROOT . 'cosmetics/list');
				}
				
				$cosmeticIdList = array_keys($cart);
				$cosmeticModel = new Cosmetic();
				$cosmeticList = $cosmeticModel->getCosmeticListForOrder($cosmeticIdList);
			}
			echo $cartString;//отладка
			
			include_once('./views/carts/index.php');
		}
	}