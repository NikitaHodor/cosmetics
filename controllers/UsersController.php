<?php
	
	class UsersController
	{

		public function reg() {
            $title = 'Регистрация';
            if(!empty($_POST['user_login']) && !empty($_POST['user_password'])) {
                 $helper = new Helper();
                $user_login = $helper->escape($_POST['user_login']);
                $user_password = $helper->escape($_POST['user_password']);
                $user_password_repeat = $helper->escape($_POST['user_password_repeat']);
                $errors = array();
                
                if ($user_password != $user_password_repeat) {
                    $errors[] = 'пароли не совпадают';
                    
                }
                $user = new User();
                if ($user->checkIfLoginExists($user_login)){
                    $errors[] = 'такой логин уже кем-то занят';
                    
                }
                elseif(!isset($_POST['user_password'])){
                    $errors[] = 'вы забыли указать пароль';
                }
                if(empty($errors)){
                    
                    $userInfo = array(
                    'user_login' => $user_login,
                        'user_password' => $user_password
                    );
                    $user->register($userInfo);
                    header('Location: ' . SITE_ROOT . 'cosmetics/list');
                }
            } 
			
			include_once('./views/users/reg.php');
		}

		public function auth() {

			$title = 'Авторизация'; 

			if (isset($_POST['user_login'])) {
				// 
				$helper = new Helper();
				$user_login = $helper->escape($_POST['user_login']); 
				$user_password = $helper->escape($_POST['user_password']); 
				// Check for regexp
				$user = new User();
				$errors = array();

				if (!$user->checkIfLoginAndPasswordExists($user_login, $user_password)) {
					$errors[] = 'Такой связки логин / пароль не существует!';
				}

				if (empty($errors)) {
					$user->auth($user_login);
					header('Location: ' . SITE_ROOT . 'cosmetics/list');
				}


			}

			include_once('./views/users/auth.php');
		}
        
        public function out() {
            $user = new User();
            $user->exitUser();
            header('Location: ' . SITE_ROOT . 'cosmetics/list');
		}
	}
