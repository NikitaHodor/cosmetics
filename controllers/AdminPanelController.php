<?php

    class AdminPanelController
    {
        public function users() {//read
            $title = 'Список пользователей';
            $usersModel = new AdminPanel();
			$users = $usersModel->getUsers();

            include_once('./views/admin/users/index.php');
    }
        public function usersAdd() {
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
                 header('Location: ' . SITE_ROOT . 'admin/users');
                return;
            }
        }
        public function usersEdit($parameters = []) {
            $id = $parameters[0];
            if (isset($_POST['edit-submit'])) {//edit
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
                 header('Location: ' . SITE_ROOT . 'admin/users');
                return;
            }
        }
        public function usersDelete($parameters = []) {
            $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $userDeleteModel = new AdminPanel();
			     $userDeleteModel->deleteUser($id);
                 header('Location: ' . SITE_ROOT . 'admin/users');
                return;
            }
        }

        public function cosmetics() {
            $title = 'Список товаров';
            $cosmeticsModel = new Cosmetic();
			$cosmetics = $cosmeticsModel->getAll();

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
        public function cosmeticsAdd() {
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
			            header('Location: ' . SITE_ROOT . 'admin/cosmetics');
			            return;
                    }
            }
        }
        public function cosmeticsEdit($parameters = []) {
            $id = $parameters[0];
             if (isset($_POST['edit-submit'])) {//edit
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
                        header('Location: ' . SITE_ROOT . 'admin/cosmetics');
                        return;
                    }
            }
        }
        public function cosmeticsAddImg($parameters = []) {
            $id = $parameters[0];
            if (isset($_POST['image_add_submit'])) {//IMAGE
            $target_dir = 'assets/img/cosmetics/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
//                if($validation->checkImageExist($delUrl)){
//                        unlink($delUrl);
//                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],FILE_ROOT . $target_dir . $new_file_name)){
                $image_cosmetic_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_cosmetic_id' => $image_cosmetic_id
                    );
                 $cosmeticImageModel = new AdminPanel();
			     $cosmeticImage = $cosmeticImageModel->addCosmeticImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/cosmetics');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function cosmeticsEditImg($parameters = []) {
            $id = $parameters[0];
            if (isset($_POST['image_edit_submit'])) {//IMAGE
            $target_dir = 'assets/img/cosmetics/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }

                $delUrlModel = new AdminPanel();
			    $delUrl = $delUrlModel->getImagesUrlById($id);

                if(file_exists('C:/xampp/htdocs' . $delUrl[0]['image_url'])){//delete old file(TODO:make it clean, not shit-code)
                        unlink('C:/xampp/htdocs' . $delUrl[0]['image_url']);
//                    $errors[] = $delUrl[0]['image_url'];
                    }

                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],FILE_ROOT . $target_dir . $new_file_name)){
                $image_cosmetic_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_cosmetic_id' => $image_cosmetic_id
                    );

                 $cosmeticImageModel = new AdminPanel();
			     $cosmeticImage = $cosmeticImageModel->editCosmeticImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/cosmetics');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function cosmeticsDelete($parameters = []) {
            $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $cosmeticDeleteModel = new Cosmetic();
			     $cosmeticDeleteModel->deleteCosmeticById($id);
                 header('Location: ' . SITE_ROOT . 'admin/cosmetics');
                return;
            }
        }

        public function categories() {//read
            $title = 'Категории каталога';
            $categoriesModel = new Category();
			$categories = $categoriesModel->getAll();

            include_once('./views/admin/categories/index.php');
}
        public function categoriesAdd(){
            if (isset($_POST['add_submit'])) {//add
                $category_name = $_POST['category_name'];
                $categoryInfo = array(
                    'category_name' => $category_name
                    );
               $categoryModel = new Category();
			     $category = $categoryModel->addCategory($categoryInfo);
                 header('Location: ' . SITE_ROOT . 'admin/categories');
                return;
            }
        }
        public function categoriesEdit($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['edit-submit'])) {//edit
                $category_edit_name = $_POST['edit_name'];
                $category_edit_id = $id;
                $categoryEditInfo = array(
                    'category_name' => $category_edit_name,
                         'category_id' => $category_edit_id
                    );
                 $categoryEditModel = new Category();
			     $categoryEditModel->editCategory($categoryEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/categories');
                return;
            }
        }
        public function categoriesAddImg($parameters = []){
            $id = $parameters[0];
            if (isset($_POST['image_add_submit'])) {//IMAGE
            $target_dir = 'assets/img/categories/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB

                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $image_category_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_category_id' => $image_category_id
                    );
                 $categoryImageModel = new AdminPanel();
			     $categoryImage = $categoryImageModel->addCategoryImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/categories');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function categoriesEditImg($parameters = []){
            $id = $parameters[0];
            if (isset($_POST['image_edit_submit'])) {//IMAGE
            $target_dir = 'assets/img/categories/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                $delUrlModel = new AdminPanel();
			    $delUrl = $delUrlModel->getCategoryImagesUrlById($id);

                if(file_exists('C:/xampp/htdocs' . $delUrl[0]['image_url'])){//delete old file(TODO:make it clean, not shit-code)
                        unlink('C:/xampp/htdocs' . $delUrl[0]['image_url']);
//                    $errors[] = $delUrl[0]['image_url'];
                    }

                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],FILE_ROOT . $target_dir . $new_file_name)){
                $image_category_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_category_id' => $image_category_id
                    );
                 $categoryImageModel = new AdminPanel();
			     $categoryImage = $categoryImageModel->editCategoryImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/categories');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function categoriesDelete($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $categoryDeleteModel = new Category();
			     $categoryDeleteModel->deleteCategory($id);
                 header('Location: ' . SITE_ROOT . 'admin/categories');
                return;
            }
        }

        public function brands() {//read
            $title = 'Список брендов';

            $brandsModel = new Brand();
			$brands = $brandsModel->getAll();

            include_once('./views/admin/brands/index.php');
}
        public function brandsAdd(){
            if (isset($_POST['add_submit'])) {//add
                $brand_name = $_POST['brand_name'];
                $brandInfo = array(
                    'brand_name' => $brand_name
                    );
               $brandModel = new Brand();
			     $brand = $brandModel->addBrand($brandInfo);
                 header('Location: ' . SITE_ROOT . 'admin/brands');
                return;
            }
        }
        public function brandsEdit($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['edit-submit'])) {//edit
                $brand_edit_name = $_POST['edit_name'];
                $brand_edit_id = $id;
                $brandEditInfo = array(
                    'brand_name' => $brand_edit_name,
                         'brand_id' => $brand_edit_id
                    );
                 $brandEditModel = new Brand();
			     $brandEditModel->editBrand($brandEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/brands');
                return;
            }
        }
        public function brandsAddImg($parameters = []){
            $id = $parameters[0];
            if (isset($_POST['image_add_submit'])) {//IMAGE
            $target_dir = 'assets/img/brands/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB

                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $image_brand_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_brand_id' => $image_brand_id
                    );
                 $brandImageModel = new AdminPanel();
			     $brandImage = $brandImageModel->addBrandImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/brands');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function brandsEditImg($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['image_edit_submit'])) {//IMAGE
            $target_dir = 'assets/img/brands/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                $delUrlModel = new AdminPanel();
			    $delUrl = $delUrlModel->getBrandImagesUrlById($id);

                if(file_exists('C:/xampp/htdocs' . $delUrl[0]['image_url'])){//delete old file(TODO:make it clean, not shit-code)
                        unlink('C:/xampp/htdocs' . $delUrl[0]['image_url']);
//                    $errors[] = $delUrl[0]['image_url'];
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],FILE_ROOT . $target_dir . $new_file_name)){
                $image_brand_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_brand_id' => $image_brand_id
                    );
                 $brandImageModel = new AdminPanel();
			     $brandImage = $brandImageModel->editBrandImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/brands');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function brandsDelete($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $brandDeleteModel = new Brand();
			     $brandDeleteModel->deleteBrand($id);
                 header('Location: ' . SITE_ROOT . 'admin/brands');
                return;
            }
        }

        public function services() {//read
            $title = 'Категории салона';
            $servicesModel = new Service();
			$services = $servicesModel->getAll();

            include_once('./views/admin/services/index.php');
}
        public function servicesAdd(){
            if (isset($_POST['add_submit'])) {//add
                $service_name = $_POST['service_name'];
                $serviceInfo = array(
                    'service_name' => $service_name
                    );
               $serviceModel = new Service();
			     $service = $serviceModel->addService($serviceInfo);
                 header('Location: ' . SITE_ROOT . 'admin/services');
                return;
            }
        }
        public function servicesEdit($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['edit-submit'])) {//edit
                $service_edit_name = $_POST['edit_name'];
                $service_edit_id = $id;
                $serviceEditInfo = array(
                    'service_name' => $service_edit_name,
                         'service_id' => $service_edit_id
                    );
                 $serviceEditModel = new Service();
			     $serviceEditModel->editService($serviceEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/services');
                return;
            }
        }
        public function servicesAddImg($parameters = []){
            $id = $parameters[0];
            if (isset($_POST['image_add_submit'])) {//IMAGE
            $target_dir = 'assets/img/services/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB

                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $image_service_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_service_id' => $image_service_id
                    );
                 $serviceImageModel = new AdminPanel();
			     $serviceImage = $serviceImageModel->addServiceImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/services');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function servicesEditImg($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['image_edit_submit'])) {//IMAGE
            $target_dir = 'assets/img/services/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                $delUrlModel = new AdminPanel();
			    $delUrl = $delUrlModel->getServiceImagesUrlById($id);

                if(file_exists('C:/xampp/htdocs' . $delUrl[0]['image_url'])){//delete old file(TODO:make it clean, not shit-code)
                        unlink('C:/xampp/htdocs' . $delUrl[0]['image_url']);
//                    $errors[] = $delUrl[0]['image_url'];
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $image_service_id = $id;
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'image_service_id' => $image_service_id
                    );
                $serviceImageModel = new AdminPanel();
			     $serviceImage = $serviceImageModel->editServiceImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/services');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function servicesDelete($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $serviceDeleteModel = new Service();
			     $serviceDeleteModel->deleteService($id);
                 header('Location: ' . SITE_ROOT . 'admin/services');
                return;
            }
        }

        public function serviceItems() {//read
            $title = 'Услуги';
            $serviceItemsModel = new AdminPanel();
			$serviceItems = $serviceItemsModel->getServiceItems();

            $serviceModel = new Service();
            $services = $serviceModel->getAll();
            include_once('./views/admin/serviceItems/index.php');
}
        public function serviceItemsAdd(){
            if (isset($_POST['add_submit'])) {//add
                $serviceItem_name = $_POST['name'];
                $serviceItem_service = $_POST['service'];
                $serviceItem_price = $_POST['price'];
                $serviceItem_description = $_POST['description'];
                $Info = array(
                    'name' => $serviceItem_name,
                    'service' => $serviceItem_service,
                    'price' => $serviceItem_price,
                    'description' => $serviceItem_description,
                    );
                $serviceItemModel = new AdminPanel();
			     $serviceitem = $serviceItemModel->addServiceItem($Info);

                 header('Location: ' . SITE_ROOT . 'admin/serviceItems');
                return;
            }
        }
        public function serviceItemsEdit($parameters = []) {
            $id = $parameters[0];
             if (isset($_POST['edit-submit'])) {//edit
                $edit_name = $_POST['edit_name'];
                 $edit_service = $_POST['edit_service'];
                 $edit_price = $_POST['edit_price'];
                 $edit_description = $_POST['edit_description'];
                $Info = array(
                    'name' => $edit_name,
                    'service' => $edit_service,
                    'price' => $edit_price,
                    'description' => $edit_description,
                         'id' => $id
                    );
                 $serviceItemEditModel = new AdminPanel();
			     $serviceItemEditModel->editServiceItem($Info);
                 header('Location: ' . SITE_ROOT . 'admin/serviceItems');
                return;
            }
        }
        public function serviceItemsAddImg($parameters = []) {
            $id = $parameters[0];
            if (isset($_POST['image_add_submit'])) {//IMAGE
            $target_dir = 'assets/img/serviceItems/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB

                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'id' => $id
                    );
                 $serviceItemImageModel = new AdminPanel();
			     $serviceItemImage = $serviceItemImageModel->addServiceItemImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/serviceItems');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function serviceItemsEditImg($parameters = []){
            $id = $parameters[0];
             if (isset($_POST['image_edit_submit'])) {//IMAGE
            $target_dir = 'assets/img/serviceItems/';
            $filesArr = $_FILES["upload_image"];
            $upload_file_name =  basename($filesArr["name"]);// upload name
            $imageFileType = strtolower(pathinfo($upload_file_name,PATHINFO_EXTENSION));
            $new_file_name = time() . ".{$imageFileType}";
            $imgUrl = ROOT . $target_dir . $new_file_name;// url for DB
//$delUrl = 'C:/xampp/htdocs'.$imgUrl;
                $validation = new Validation();
                    $errors = array();
                if(!$validation->checkImage($filesArr)){
                        $errors[] = 'Файл не является изображением!';
                    }
                if(!$validation->checkImageSize($filesArr)){
                        $errors[] = 'Файл слишком большой!';
                    }
                if(!$validation->checkImageType($imageFileType)){
                        $errors[] = 'Допустимые разрешения: jpg, jpeg, png, gif';
                    }
                $delUrlModel = new AdminPanel();
			    $delUrl = $delUrlModel->getServiceItemImagesUrlById($id);

                if(file_exists('C:/xampp/htdocs' . $delUrl[0]['image_url'])){//delete old file(TODO:make it clean, not shit-code)
                        unlink('C:/xampp/htdocs' . $delUrl[0]['image_url']);
//                    $errors[] = $delUrl[0]['image_url'];
                    }
                // Check  error
                if (empty($errors) && move_uploaded_file($filesArr["tmp_name"],$target_dir . $new_file_name)){
                $imageInfo = array(
                        'image_url' => $imgUrl,
                         'id' => $id
                    );
                $serviceItemImageModel = new AdminPanel();
			     $serviceItemImage = $serviceItemImageModel->editServiceItemImage($imageInfo);
                    header('Location: ' . SITE_ROOT . 'admin/serviceItems');
                    return;
                } else {
                    $errors[] = 'Произошла ошибка при загрузке файла!';
                }
            }
        }
        public function serviceItemsDelete($parameters = []) {
             $id = $parameters[0];
             if (isset($_POST['delete_submit'])) {//delete
                 $serviceItemDeleteModel = new AdminPanel();
			     $serviceItemDeleteModel->deleteServiceItem($id);
                 header('Location: ' . SITE_ROOT . 'admin/serviceItems');
                return;
            }
         }

        public function images() {//read img from folder
            $title = 'Изображения';

            $dirname = FILE_ROOT . "assets/img";
            $len = strlen(FILE_ROOT);
            $fileRootItems = glob($dirname.'/*');
            $images = array();

            foreach($fileRootItems as $fileRootItem) {//переписать под рекурсию!
                if(is_file($fileRootItem)){
                    $siteRootImages = substr_replace($fileRootItem, SITE_ROOT, 0, $len);
                    $images[] = $siteRootImages;
//                    echo $fileRootItem;
                }
//                elseif(!is_file($fileRootItem)) {
////                    echo $fileRootItem;
//                    $fileRootItems2 = glob($fileRootItem.'/*');
////                    print_r($fileRootItems2);
//                    foreach($fileRootItems2 as $fileRootItem2){
//                        $siteRootImages2 = substr_replace($fileRootItem2, SITE_ROOT, 0, $len);
//                    $images[] = $siteRootImages2;
//                    }
//                  }
            }
            include_once('./views/admin/images/index.php');
        }

        public function orders() {
            $title = 'Заказы';

            $ordersModel = new AdminPanel();
			$orders = $ordersModel->getOrders();

            include_once('./views/admin/orders/index.php');
        }

        public function timetable() {
             $title = 'Записи';

            $serviceModel = new AdminPanel();
			$services = $serviceModel->getServ();

            include_once('./views/admin/timetable/index.php');
        }

        public function timetableAdd() {
            if (isset($_POST['add_submit'])) {//add
                $spec = $_POST['spec'];
                $day = $_POST['day'];
                $sTime = $_POST['start-time'];
                $eTime = $_POST['end-time'];
                $Info = array(
                    'specialist_id' => $spec,
                        'location' => $day,
                        'start_time' => $sTime,
                    'end_time' => $eTime
                    );
                print_r($Info);
//              $timetableModel = new AdminPanel();
//			$timetable = $timetableModel->addTimetable($Info);
//             header('Location: ' . SITE_ROOT . 'admin/timetable');
                return;

            }


        }
    }
