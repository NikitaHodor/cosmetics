<?php
class MainPageController {
public function index() {
			$title = 'Главная';
			$mainPageModel = new MainPage();
			$cosmetics = $mainPageModel->getRandomCosmetic();
			include_once('./views/main/index.php');
			return;
		}
}
