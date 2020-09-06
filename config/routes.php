<?php

	$routes = array(
		"CosmeticsController" => array(
			"cosmetics/list" => "index",
			"cosmetics/view/([0-9]+)" => "view/$1"
		),
		"CosmeticsProxyController" => array(
			"cosmetics/add" => "add",
			"cosmetics/edit/([0-9]+)" => "edit/$1",
			"cosmetics/delete/([0-9]+)" => "delete/$1"
		),
        "CategoriesController" => array(
			"categories/list" => "index",
			"categories/view/([0-9]+)" => "view/$1"
		),
		"BrandsController" => array(
			"brands/list" => "index",
            "brands/view/([0-9]+)" => "view/$1",
			"brands/add" => "add"
		),
        "ServicesController" => array(
			"services/list" => "index",
			"services/view/([0-9]+)" => "view/$1"
		),
        "TypesController" => array(
			"types/list" => "index",
			"types/add" => "add"
		),
        "CountriesController" => array(
			"countries/list" => "index",
			"countries/add" => "add"
		),
		"UsersController" => array(
			"register" => "reg",
			"auth" => "auth",
            "logout" => "out"
		),
        "AdminPanelController" => array(
            "admin/users/([0-9]*)" => "usersList/$1",
            "admin/cosmetics/([0-9]*)" => "cosmeticsList/$1",
            "admin/categories/([0-9]*)" => "categoriesList/$1",
            "admin/brands/([0-9]*)" => "brandsList/$1",
            "admin/services/([0-9]*)" => "servicesList/$1"

		),
		"CartsController" => array(
			"cart" => "index"
		),
		"OrdersController" => array(
			"orders/add" => "add"
		),
        "FAQsController" => array(
			"faq" => "index"
		),
        "ContactsController" => array(
			"contact" => "index"
		),
        "AboutController" => array(
			"about" => "index"
		),
        "SearchController" => array(
			"search" => "view" //работа над поиском
		),
        "ErrorsController" => array(
			"error" => "index"
		)
	);
