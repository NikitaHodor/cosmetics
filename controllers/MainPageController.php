<?php
class MainPageController {
public function index() {
			$title = 'Главная';

    $mainPageModel = new MainPage();
    $number_of_result = $mainPageModel->getNumRows();

    if (!isset ($_POST['page']) ) {
                $page = 1;
            } else {
                $page = $_POST['page'];
            };

            $results_per_page = 6;
            $page_first_result = ($page-1) * $results_per_page;
            $number_of_page = ceil($number_of_result / $results_per_page);

     $cosmetics = $mainPageModel->getMainCosmetic($page_first_result, $results_per_page);

//         print_r($cosmetics);

//            $pageItems = 6;
//            $pagesArr = array_chunk($cosmetics, $pageItems);

//    echo("<pre>");
//    print_r($cosmetics);
//    echo("</pre>");

			include_once('./views/main/index.php');
			return;

		}
}
