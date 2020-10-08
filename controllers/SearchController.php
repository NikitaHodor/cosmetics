<?php
//Насколько такие костыли сойдут по принципу реализации?(позже прикручу проверку и расширю список запросов к БД)???
    class SearchController
    {
        public function index() {

			$title = 'Поиск';

            $helper = new Helper();
            $search = $helper->escape($_POST["inputQ"]);

//            $search = $_POST["inputQ"];
                $searchModel = new Search();
			    $searchResults = $searchModel->getAll($search);
//                echo $search;
            include_once('./views/search/index.php');
			return;
		}
        public function view($parameters = []) {
                $title = 'Поиск';
                $id = $parameters[0];
                $searchModel = new Search();
			    $cosmetic = $searchModel->searchCosmeticById($id);

            include_once('./views/search/view.php');

			return;
		}
}
