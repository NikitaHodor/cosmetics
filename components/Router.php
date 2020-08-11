<?php

	class Router 
	{
		private $routes;

		public function __construct() {
			include_once('./config/routes.php');
			$this->routes = $routes;
		}

		public function run() {
			// 1) Получаем url, который ввел пользователь. 
			// 2) Находим соответствие url пользователя и controller/action; 
			// 3) Вызываем этот action 
			$userUrl = $_SERVER['REQUEST_URI'];
			foreach ($this->routes as $controller => $patterns) {
				foreach ($patterns as $pattern => $parametrizedAction) {
					$pattern = ROOT . $pattern;
					if (preg_match("~$pattern~", $userUrl)) {
						$controllerObj = new $controller; 
						$parametrizedAction = preg_replace("~$pattern~", $parametrizedAction, $userUrl);
						$parameters = explode('/', $parametrizedAction);  
						$action = array_shift($parameters);
						call_user_func(array($controllerObj, $action), $parameters);
						exit();
					}
				}
			}
			// отобразить страницу 404
//			echo '404 - Page not found!'; 
           $modelPage404 = new ErrorsController();
            $page404 = $modelPage404->index();
            return $page404;
			exit();
		}
	}
