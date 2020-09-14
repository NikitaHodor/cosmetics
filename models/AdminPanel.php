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
        public function getImages() {
			$db = DB::connect();
			$query = (new Select('images'))
						->build();
			$result = $db->query($query);
			$images = $result->fetchAll();
			return $images;
		}
    }
