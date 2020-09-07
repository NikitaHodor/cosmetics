<?php

    class AdminPanelController
    {
        public function usersList($parameters = []) {//read
            $title = 'Список пользователей';
            $id = $parameters[0];
            $usersModel = new AdminPanel();
			$users = $usersModel->getUsers();



            if (isset($_POST['add_submit'])) {//add
                $user_login = $_POST['user_login'];
                $user_password = $_POST['user_password'];
                $user_is_admin = $_POST['user_is_admin'];
                $userInfo = array(
                    'user_login' => $user_login,
                        'user_password' => $user_password,
                        'user_is_admin' => $user_is_admin
                    );
               $userModel = new AdminPanel();
			     $user = $userModel->addUser($userInfo);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            } else if (isset($_POST['edit-submit'])) {//edit
                $user_edit_login = $_POST['edit_login'];
                $user_edit_is_admin = $_POST['edit_is_admin'];
                $user_edit_id = $id;
                $userEditInfo = array(
                    'user_login' => $user_edit_login,
                        'user_is_admin' => $user_edit_is_admin,
                         'user_id' => $user_edit_id
                    );
                 $userEditModel = new AdminPanel();
			     $userEdit = $userEditModel->editUser($userEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            } else if (isset($_POST['delete_submit'])) {//delete
                 $userDeleteModel = new AdminPanel();
			     $userDeleteModel->deleteUser($id);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            }
            include_once('./views/admin/users/index.php');
    }

         public function cosmeticsList($parameters = []) {
            $title = 'Список товаров';
            $id = $parameters[0];
            $cosmeticsModel = new Cosmetic();
			$cosmetics = $cosmeticsModel->getAll();



            if (isset($_POST['add_submit'])) {//add
                $helper = new Helper();
                    $cosmetic_name = $helper->escape($_POST['cosmetic_name']);
                    $cosmetic_type = $helper->escape($_POST['cosmetic_type']);
                    $cosmetic_category = $helper->escape($_POST['cosmetic_category']);
                    $cosmetic_brand = $helper->escape($_POST['cosmetic_brand']);
                    $cosmetic_price = $helper->escape($_POST['cosmetic_price']);
                    $cosmetic_volume = $helper->escape($_POST['cosmetic_volume']);
                    $cosmetic_country = $helper->escape($_POST['cosmetic_country']);
                    $cosmetic_description = $helper->escape($_POST['cosmetic_description']);

               $validation = new Validation();
                    $errors = array();
                    if(!$validation->checklength($cosmetic_name)){
                        $errors[] = 'кол-во символов не должно быть меньше 2';
                    }
                     if(!$validation->checkNumber($cosmetic_price, 99999, 50)){
                        $errors[] = 'цена не должна превышать 99999 или быть меньше 100';
                    }
                    if(empty($errors)){
                        $cosmeticModel = new Cosmetic();
                        $cosmeticArray = array(
                        'cosmetic_name' => $cosmetic_name,
                            'cosmetic_type' => $cosmetic_type,
                            'cosmetic_category' => $cosmetic_category,
                            'cosmetic_brand' => $cosmetic_brand,
                          'cosmetic_price' => $cosmetic_price,
                            'cosmetic_volume' => $cosmetic_volume,
                            'cosmetic_country' => $cosmetic_country,
                            'cosmetic_description' => $cosmetic_description
                        );
                        $cosmeticModel->addCosmetics($cosmeticArray);
			            header('Location: ' . SITE_ROOT . 'admin/cosmetics/');
			            return;
                    }
            } else if (isset($_POST['edit-submit'])) {//edit
                $helper = new Helper();
                    $cosmetic_name = $helper->escape($_POST['edit_cosmetic_name']);
                    $cosmetic_type = $helper->escape($_POST['edit_cosmetic_type']);
                    $cosmetic_category = $helper->escape($_POST['edit_cosmetic_category']);
                    $cosmetic_brand = $helper->escape($_POST['edit_cosmetic_brand']);
                    $cosmetic_price = $helper->escape($_POST['edit_cosmetic_price']);
                    $cosmetic_volume = $helper->escape($_POST['edit_cosmetic_volume']);
                    $cosmetic_country = $helper->escape($_POST['edit_cosmetic_country']);
                    $cosmetic_description = $helper->escape($_POST['edit_cosmetic_description']);

                    $validation = new Validation();
                    $errors = array();
                    if(!$validation->checklength($cosmetic_name)){
                        $errors[] = 'кол-во символов не должно быть меньше 2';
                    }
                     if(!$validation->checkNumber($cosmetic_price, 99999, 50)){
                        $errors[] = 'цена не должна превышать 99999 или быть меньше 100';
                    }
                    if(empty($errors)){
                        $cosmeticModel = new Cosmetic();
                        $cosmetic = array(
                        'cosmetic_name' => $cosmetic_name,
                            'cosmetic_type' => $cosmetic_type,
                            'cosmetic_category' => $cosmetic_category,
                            'cosmetic_brand' => $cosmetic_brand,
                          'cosmetic_price' => $cosmetic_price,
                            'cosmetic_volume' => $cosmetic_volume,
                            'cosmetic_country' => $cosmetic_country,
                            'cosmetic_description' => $cosmetic_description,
                            'cosmetic_id' => $id
                        );
                        $cosmeticModel->updateCosmetic($cosmetic);
                        header('Location: ' . SITE_ROOT . 'admin/cosmetics/');
                        return;
                    }
            } else if (isset($_POST['delete_submit'])) {//delete
                 $cosmeticDeleteModel = new Cosmetic();
			     $cosmeticDeleteModel->deleteCosmeticById($id);
                 header('Location: ' . SITE_ROOT . 'admin/cosmetics/');
                return;
            }
             $brandModel = new Brand();
            $brands = $brandModel->getAll();
            $typeModel = new Type();
            $types = $typeModel->getAll();
            $categoryModel = new Category();
            $categories = $categoryModel->getAll();
            $countryModel = new Country();
            $countries = $countryModel->getAll();
            include_once('./views/admin/cosmetics/index.php');
    }

        public function categoriesList($parameters = []) {//read
            $title = 'Категории каталога';
            $id = $parameters[0];
            $categoriesModel = new Category();
			$categories = $categoriesModel->getAll();

            if (isset($_POST['add_submit'])) {//add
                $category_name = $_POST['category_name'];
                $categoryInfo = array(
                    'category_name' => $category_name
                    );
               $categoryModel = new Category();
			     $category = $categoryModel->addCategory($categoryInfo);
                 header('Location: ' . SITE_ROOT . 'admin/categories/');
                return;
            } else if (isset($_POST['edit-submit'])) {//edit
                $category_edit_name = $_POST['edit_name'];
                $category_edit_id = $id;
                $categoryEditInfo = array(
                    'category_name' => $category_edit_name,
                         'category_id' => $category_edit_id
                    );
                 $categoryEditModel = new Category();
			     $categoryEditModel->editCategory($categoryEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/categories/');
                return;
            } else if (isset($_POST['delete_submit'])) {//delete
                 $categoryDeleteModel = new Category();
			     $categoryDeleteModel->deleteCategory($id);
                 header('Location: ' . SITE_ROOT . 'admin/categories/');
                return;
            }

            include_once('./views/admin/categories/index.php');
}
        public function brandsList($parameters = []) {//read
            $title = 'Список брендов';
            $id = $parameters[0];
            $brandsModel = new Brand();
			$brands = $brandsModel->getAll();

            if (isset($_POST['add_submit'])) {//add
                $brand_name = $_POST['brand_name'];
                $brandInfo = array(
                    'brand_name' => $brand_name
                    );
               $brandModel = new Brand();
			     $brand = $brandModel->addBrand($brandInfo);
                 header('Location: ' . SITE_ROOT . 'admin/brands/');
                return;
            } else if (isset($_POST['edit-submit'])) {//edit
                $brand_edit_name = $_POST['edit_name'];
                $brand_edit_id = $id;
                $brandEditInfo = array(
                    'brand_name' => $brand_edit_name,
                         'brand_id' => $brand_edit_id
                    );
                 $brandEditModel = new Brand();
			     $brandEditModel->editBrand($brandEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/brands/');
                return;
            } else if (isset($_POST['delete_submit'])) {//delete
                 $brandDeleteModel = new Brand();
			     $brandDeleteModel->deleteBrand($id);
                 header('Location: ' . SITE_ROOT . 'admin/brands/');
                return;
            }

            include_once('./views/admin/brands/index.php');
}
        public function servicesList($parameters = []) {//read
            $title = 'Услуги салона';
            $id = $parameters[0];
            $servicesModel = new Service();
			$services = $servicesModel->getAll();

            if (isset($_POST['add_submit'])) {//add
                $service_name = $_POST['service_name'];
                $serviceInfo = array(
                    'service_name' => $service_name
                    );
               $serviceModel = new Service();
			     $service = $serviceModel->addService($serviceInfo);
                 header('Location: ' . SITE_ROOT . 'admin/services/');
                return;
            } else if (isset($_POST['edit-submit'])) {//edit
                $service_edit_name = $_POST['edit_name'];
                $service_edit_id = $id;
                $serviceEditInfo = array(
                    'service_name' => $service_edit_name,
                         'service_id' => $service_edit_id
                    );
                 $serviceEditModel = new Service();
			     $serviceEditModel->editService($serviceEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/services/');
                return;
            } else if (isset($_POST['delete_submit'])) {//delete
                 $serviceDeleteModel = new Service();
			     $serviceDeleteModel->deleteService($id);
                 header('Location: ' . SITE_ROOT . 'admin/services/');
                return;
            }

            include_once('./views/admin/services/index.php');
}
    }
