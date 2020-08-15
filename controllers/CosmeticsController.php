<?php

	class CosmeticsController {

		public function index() {
			//echo 'Вызван action index в CosmeticsController';
			$title = 'Главная';
			$cosmeticModel = new Cosmetic();
			$cosmetics = $cosmeticModel->getRandom();
			include_once('./views/cosmetics/index.php');
			return;
		}

		public function add() {//добить полный список параметров для добавления!!!
			$title = 'Добавить косметику';
            if (isset ($_POST['cosmetic_name'])) {
                    $helper = new Helper();
                    $cosmetic_name = $helper->escape($_POST['cosmetic_name']);
//                    $cosmetic_type = $helper->escape($_POST['cosmetic_type']);
//                    $cosmetic_category = $helper->escape($_POST['cosmetic_category']);
                    $cosmetic_brand = $helper->escape($_POST['cosmetic_brand']);
                    $cosmetic_price = $helper->escape($_POST['cosmetic_price']);
                    $cosmetic_volume = $helper->escape($_POST['cosmetic_volume']);
//                    $cosmetic_country = $helper->escape($_POST['cosmetic_country']);
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
//                            'cosmetic_type' => $cosmetic_type,
//                            'cosmetic_category' => $cosmetic_category,
                            'cosmetic_brand' => $cosmetic_brand,
                          'cosmetic_price' => $cosmetic_price,
                            'cosmetic_volume' => $cosmetic_volume,
//                            'cosmetic_country' => $cosmetic_country,
                            'cosmetic_description' => $cosmetic_description
                        );
                        $cosmeticModel->addCosmetics($cosmeticArray);
			            header('Location: ' . SITE_ROOT . 'cosmetics/list');
			            return;
                    }

                }

            $brandModel = new Brand();
            $brands = $brandModel->getAll();
            include_once('./views/cosmetics/add.php');
			return;
		}

		public function view($parameters = []) {
			$title = 'Косметика';
			$id = $parameters[0];
            if(!$id){
                echo 'некорректный id';
                exit();
            } else {
                print_r($id);//для отладки
                $cosmeticModel = new Cosmetic();
			    $cosmetic = $cosmeticModel->getCosmeticById($id);
			    include_once('./views/cosmetics/view.php');
			 
//                echo 'Вызван action view с параметром id = $id';
            }
			return;
		}

		public function edit($parameters = []) {
			$title = 'Косметика';
			$id = $parameters[0];
            if(!$id){
                echo 'некорректный id';
                exit();
            } else {
                print_r($id);//для отладки
                if (isset ($_POST['cosmetic_name'])) {
                    $helper = new Helper();
                    $cosmetic_name = $helper->escape($_POST['cosmetic_name']);
                    $cosmetic_price = $helper->escape($_POST['cosmetic_price']);
                    $cosmetic_volume = $helper->escape($_POST['cosmetic_volume']);
                    $cosmetic_brand = $_POST['cosmetic_brand'];
                    
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
                          'cosmetic_price' => $cosmetic_price,
                            'cosmetic_volume' => $cosmetic_volume,
                            'cosmetic_brand' => $cosmetic_brand,
                            'cosmetic_id' => $id
                        );
                        $cosmeticModel->updateCosmetic($cosmetic);
                        header('Location: ' . SITE_ROOT . 'cosmetics/list');
                    }
                    
                }
                $cosmeticModel = new Cosmetic();
			    $cosmetic = $cosmeticModel->getCosmeticById($id);
                $brandModel = new Brand();
                $brands = $brandModel->getAll();
                if(empty($cosmetic)){
                     echo 'нет такого id косметики';
                    exit();
                }
			    include_once('./views/cosmetics/edit.php');
			 
//                echo 'Вызван action view с параметром id = $id';
              
                
            }
			return;
		}

		public function delete($parameters = []) {
			$id = $parameters[0];
			if (!$id) {
				return;
			}
			$cosmeticModel = new Cosmetic();
			$cosmeticModel->deleteCosmeticById($id);
			header('Location: ' . SITE_ROOT . 'cosmetics/list');
		}


	}
