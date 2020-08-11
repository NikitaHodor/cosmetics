<?php
//Надо прикрутить передачу через форму поиска!
    class SearchController
    {
        public function view($parameters = []) {

			$title = 'Поиск';
            $search = $parameters[0];
                //isset($_POST['search']);
            if(empty($search)){
                echo 'введите поисковой запрос';
                exit();
            }else{
                $searchModel = new Search();
			    $searchResults = $searchModel->getAll($search);
			    include_once('./views/search/view.php');
                echo $search;
            }

			return;
		}
}
