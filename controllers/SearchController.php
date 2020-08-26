<?php
//Насколько такие костыли сойдут по принципу реализации?(позже прикручу проверку и расширю список запросов к БД)???
    class SearchController
    {
        public function view() {

			$title = 'Поиск';

            $search = $_POST["inputQ"];
//                echo $_POST["inputQ"]; //отладка

//            if(empty($search)){
//                echo 'type smth';
//
//            }else{
                $searchModel = new Search();
			    $searchResults = $searchModel->getAll($search);
                echo $search;
//            }
            include_once('./views/search/view.php');

			return;
		}
}
