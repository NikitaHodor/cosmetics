<?php

    class AdminPanel
    {
        public function getUsers() {
			$db = DB::connect();
			$query = "SELECT * FROM `users`";
			$result = $db->query($query);
			$users = $result->fetchAll();
			return $users;
		}
        public function addUser($userInfo) {
			$db = DB::connect();
            $hasheadPassword = md5($userInfo['user_password']);
			$query = "
				INSERT INTO `users`
					SET `user_login` = '$userInfo[user_login]',
						`user_password` = '$hasheadPassword',
                        `user_is_admin` = '$userInfo[user_is_admin]'
			";
			$result = $db->query($query);
            return;
		}
        public function editUser($userEditInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `users`
					SET `user_login` = '$userEditInfo[user_login]',
                        `user_is_admin` = '$userEditInfo[user_is_admin]'
                    WHERE `user_id` = '$userEditInfo[user_id]'
			";
			$result = $db->query($query);
            return;
		}
        public function deleteUser($id) {
			$db = DB::connect();
			$query = "
				DELETE FROM `users`
                    WHERE `user_id` = '$id'
			";
			$result = $db->query($query);
            return;
		}

        public function addCosmeticImage($imageInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `images`
					SET `image_url` = '$imageInfo[image_url]',
						`image_cosmetic_id` = '$imageInfo[image_cosmetic_id]'
			";
			$result = $db->query($query);
            return;
		}
        public function editCosmeticImage($imageInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `images`
					SET `image_url` = '$imageInfo[image_url]'
					WHERE `image_cosmetic_id` = '$imageInfo[image_cosmetic_id]'
			";
			$result = $db->query($query);
            return;
		}

        public function addCategoryImage($imageInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `category_images`
					SET `image_url` = '$imageInfo[image_url]',
						`image_category_id` = '$imageInfo[image_category_id]'
			";
			$result = $db->query($query);
            return;
		}
        public function editCategoryImage($imageInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `category_images`
					SET `image_url` = '$imageInfo[image_url]'
					WHERE `image_category_id` = '$imageInfo[image_category_id]'
			";
			$result = $db->query($query);
            return;
		}

        public function addBrandImage($imageInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `brand_images`
					SET `image_url` = '$imageInfo[image_url]',
						`image_brand_id` = '$imageInfo[image_brand_id]'
			";
			$result = $db->query($query);
            return;
		}
        public function editBrandImage($imageInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `brand_images`
					SET `image_url` = '$imageInfo[image_url]'
					WHERE `image_brand_id` = '$imageInfo[image_brand_id]'
			";
			$result = $db->query($query);
            return;
		}

        public function addServiceImage($imageInfo) {
			$db = DB::connect();
			$query = "
				INSERT INTO `service_images`
					SET `image_url` = '$imageInfo[image_url]',
						`image_service_id` = '$imageInfo[image_service_id]'
			";
			$result = $db->query($query);
            return;
		}
        public function editServiceImage($imageInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `service_images`
					SET `image_url` = '$imageInfo[image_url]'
					WHERE `image_service_id` = '$imageInfo[image_service_id]'
			";
			$result = $db->query($query);
            return;
		}

        public function getImagesUrlById($id) {
			$db = DB::connect();
			$query = (new Select('images'))
                        ->what(['image_url'])
                        ->where("WHERE `image_cosmetic_id` = '$id'")
						->build();
			$result = $db->query($query);
			$url = $result->fetchAll();
			return $url;
		}

        public function getBrandImagesUrlById($id) {
			$db = DB::connect();
			$query = (new Select('brand_images'))
                        ->what(['image_url'])
                        ->where("WHERE `image_brand_id` = '$id'")
						->build();
			$result = $db->query($query);
			$images = $result->fetchAll();
			return $images;
		}

        public function getCategoryImagesUrlById($id) {
			$db = DB::connect();
			$query = (new Select('category_images'))
                        ->what(['image_url'])
                        ->where("WHERE `image_category_id` = '$id'")
						->build();
			$result = $db->query($query);
			$images = $result->fetchAll();
			return $images;
		}

        public function getServiceImagesUrlById($id) {
			$db = DB::connect();
			$query = (new Select('service_images'))
                        ->what(['image_url'])
                        ->where("WHERE `image_service_id` = '$id'")
						->build();
			$result = $db->query($query);
			$images = $result->fetchAll();
			return $images;
		}

        public function getServiceItemImagesUrlById($id) {
			$db = DB::connect();
			$query = (new Select('service_items_images'))
                        ->what(['image_url'])
                        ->where("WHERE `image_service_item_id` = '$id'")
						->build();
			$result = $db->query($query);
			$images = $result->fetchAll();
			return $images;
		}

        public function getServiceItems() {
            $db = DB::connect();
			$query = (new Select('service_items'))
                        ->joins([['LEFT', 'services', 'services_service_id', 'service_id'], ['LEFT', 'service_items_images', 'id', 'image_service_item_id']])
						->where('WHERE `is_deleted` = 0')
						->build();
			$result = $db->query($query);
			$serviceItems = $result->fetchAll();
			return $serviceItems;
        }
        public function addServiceItem($Info) {
			$db = DB::connect();
			$query = "
					INSERT INTO `service_items`
					SET `name` = '$Info[name]',
                    `services_service_id` = '$Info[service]',
                    `price` = '$Info[price]',
					`description` = '$Info[description]';
				";

			$db->query($query);
			return;
		}
        public function editServiceItem($Info) {
            $db = DB::connect();
			$query = "
				UPDATE `service_items`
					SET `name` = '$Info[name]',
                    `services_service_id` = '$Info[service]',
                    `price` = '$Info[price]',
					`description` = '$Info[description]'
                    WHERE `id` = '$Info[id]'
			";
			$result = $db->query($query);
            return;
        }
        public function deleteServiceItem($id) {
            $db = DB::connect();
			$query = "
				UPDATE `service_items`
					SET `is_deleted` = 1
                    WHERE `id` = '$id'
			";
			$result = $db->query($query);
            return;
        }
        public function addServiceItemImage($imageInfo) {
            $db = DB::connect();
			$query = "
				INSERT INTO `service_items_images`
					SET `image_url` = '$imageInfo[image_url]',
						`image_service_item_id` = '$imageInfo[id]'
			";
			$result = $db->query($query);
            return;
        }
        public function editServiceItemImage($imageInfo) {
			$db = DB::connect();
			$query = "
				UPDATE `service_items_images`
					SET `image_url` = '$imageInfo[image_url]'
					WHERE `image_service_item_id` = '$imageInfo[id]'
			";
			$result = $db->query($query);
            return;
		}

        public function getOrders() {
            $db = DB::connect();
			$query = (new Select('carts'))
						->joins([['LEFT', 'orders', 'cart_order_id', 'order_id'], ['LEFT', 'cosmetics', 'cart_cosmetic_id', 'cosmetic_id']])
						->build();
			$result = $db->query($query);
			$orders = $result->fetchAll();
			return $orders;
        }

//         public function getTimetable($specId) {
//             $db = DB::connect();
//			$query = (new Select('timetable'))
//						->joins([['LEFT', 'service_items', 'timetable_service_items_id', 'id'], ['LEFT', 'specialists', 'timetable_specialist_id', 'specialist_id']])
//                        ->where("WHERE `timetable_specialist_id` = $specId")
//						->build();
//			$result = $db->query($query);
//			$timetable = $result->fetchAll();
//			return $timetable;
//		}
        public function getServ() {
             $db = DB::connect();
			$query = (new Select('services'))
                        ->joins([['LEFT', 'specialists', 'service_specialist_id', 'specialist_id']])
						->build();
			$result = $db->query($query);
			$services = $result->fetchAll();
			return $services;
		}
        public function addEmptyTimetable($Info) {
             $db = DB::connect();
			$query = "
                INSERT INTO `timetable`
					SET `timetable_service_items_id` = '$Info[service_item_id]',
                        `timetable_location` = '$Info[location]',
                        `timetable_start_date` = '$Info[date_start]',
                        `timetable_end_date` = '$Info[date_end]',
                        `timetable_specialist_id` = '$Info[specialist_id]'
			";
			$result = $db->query($query);
            return;
		}
    }
