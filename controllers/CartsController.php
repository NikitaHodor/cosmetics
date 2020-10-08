<?php

	class CartsController 
	{

		public function index() {
			$title = 'Корзина';
			$cartString = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : ""; 
            $cart = "";
			if ($cartString !== "" && $cartString !== "{}") {// добавил проверку куки на "{}"
				$cart = json_decode($cartString, true);
				if (isset($_POST['submit'])) {

					$helper = new Helper();
					$user_name = $helper->escape($_POST['user_name']); 
					$user_phone = $helper->escape($_POST['user_phone']); 
					$user_email = $helper->escape($_POST['user_email']);

                    $validation = new Validation();
                    $errors = array();

					if(!$validation->checkEmptyness($user_name)){
                        $errors[] = "Поле имени не заполнено!";
                    }
                    if(!$validation->checkEmptyness($user_phone)){
                        $errors[] = "Поле телефона не заполнено!";
                    }
                    if(!$validation->checkEmptyness($user_email)){
                        $errors[] = "Поле почты не заполнено!";
                    }
                    if(empty($errors)){
                    $orderInfo = "имя: $user_name, телефон: $user_phone, email: $user_email";
					$cartModel = new Cart();
					$cartModel->addNewOrder($cart, $orderInfo); 
					setcookie('cart', '', 1, '/');
					header('Location: ' . SITE_ROOT . 'home');
                    }
				}
				$cosmeticIdList = array_keys($cart);
				$cosmeticModel = new Cosmetic();
				$cosmeticList = $cosmeticModel->getCosmeticListForOrder($cosmeticIdList);
			}
//			print_r($errors);//отладка
			
			include_once('./views/carts/index.php');
		}
	}
