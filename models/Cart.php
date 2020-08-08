<?php

	class Cart
	{

		public function addNewOrder($cart, $orderInfo) {
            $orderUserId = $_COOKIE['user_id'];//добавил user_id из кукис в orders
			$db = DB::connect();
			$query = "
				INSERT INTO `orders`
					SET `order_info` = '$orderInfo',
                    `order_user_id` = '$orderUserId';
			";
			$result = $db->query($query);
			$orderId = $db->lastInsertId();
			// $this->fullAuthorizedUser($userId);

			$cartsInfo = ""; 
			foreach ($cart as $cosmetic_id => $cosmetic_count) {
				$cartsInfo .= "($cosmetic_id, $orderId, $cosmetic_count), ";
			}
			$cartsInfo = rtrim($cartsInfo, ', ');
			$query = "
				INSERT INTO `carts` (cart_cosmetic_id, cart_order_id, cart_count)
					VALUES $cartsInfo;
			";
			$db->query($query);
			return;
		}
	}
