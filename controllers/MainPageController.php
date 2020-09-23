<?php
class MainPageController {
public function index() {
			$title = 'Главная';
			$mainPageModel = new MainPage();
			$cosmetics = $mainPageModel->getRandomCosmetic();
//         print_r($cosmetics);
//            $rowLen = 3;
//            $rowArr = array_chunk($cosmetics, $rowLen);
//    echo("<pre>");
//    print_r($rowArr);
//    echo("</pre>");
			include_once('./views/main/index.php');
			return;

		}
}
