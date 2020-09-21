<?php

	$routes = array(
        "MainPageController" => array(
            "home" => "index"
        ),
		"CosmeticsController" => array(
//			"cosmetics/list" => "index",
			"cosmetics/view/([0-9]+)" => "view/$1"
		),
//		"CosmeticsProxyController" => array(
//			"cosmetics/add" => "add",
//			"cosmetics/edit/([0-9]+)" => "edit/$1",
//			"cosmetics/delete/([0-9]+)" => "delete/$1"
//		),
        "CategoriesController" => array(
			"categories/list" => "index",
			"categories/view/([0-9]+)" => "view/$1"
		),
		"BrandsController" => array(
			"brands/list" => "index",
            "brands/view/([0-9]+)" => "view/$1",
//			"brands/add" => "add"
		),
        "ServicesController" => array(
			"services/list" => "index",
			"services/view/([0-9]+)" => "view/$1"
		),
        "TypesController" => array(
			"types/list" => "index",
//			"types/add" => "add"
		),
        "CountriesController" => array(
			"countries/list" => "index",
//			"countries/add" => "add"
		),
		"UsersController" => array(
			"register" => "reg",
			"auth" => "auth",
            "logout" => "out"
		),
        "AdminPanelController" => array(
            "admin/users" => "users",
            "admin/usersAdd" => "usersAdd",
            "admin/usersEdit/([0-9]+)" => "usersEdit/$1",
            "admin/usersDelete/([0-9]+)" => "usersDelete/$1",

            "admin/cosmetics" => "cosmetics",
            "admin/cosmeticsAdd" => "cosmeticsAdd",
            "admin/cosmeticsEdit/([0-9]+)" => "cosmeticsEdit/$1",
            "admin/cosmeticsAddImg/([0-9]+)" => "cosmeticsAddImg/$1",
            "admin/cosmeticsEditImg/([0-9]+)" => "cosmeticsEditImg/$1",
            "admin/cosmeticsDelete/([0-9]+)" => "cosmeticsDelete/$1",

            "admin/categories" => "categories",
            "admin/categoriesAdd" => "categoriesAdd",
            "admin/categoriesEdit/([0-9]+)" => "categoriesEdit/$1",
            "admin/categoriesAddImg/([0-9]+)" => "categoriesAddImg/$1",
            "admin/categoriesEditImg/([0-9]+)" => "categoriesEditImg/$1",
            "admin/categoriesDelete/([0-9]+)" => "categoriesDelete/$1",

            "admin/brands" => "brands",
            "admin/brandsAdd" => "brandsAdd",
            "admin/brandsEdit/([0-9]+)" => "brandsEdit/$1",
            "admin/brandsAddImg/([0-9]+)" => "brandsAddImg/$1",
            "admin/brandsEditImg/([0-9]+)" => "brandsEditImg/$1",
            "admin/brandsDelete/([0-9]+)" => "brandsDelete/$1",

            "admin/services" => "services",
            "admin/servicesAdd" => "servicesAdd",
            "admin/servicesEdit/([0-9]+)" => "servicesEdit/$1",
            "admin/servicesAddImg/([0-9]+)" => "servicesAddImg/$1",
            "admin/servicesEditImg/([0-9]+)" => "servicesEditImg/$1",
            "admin/servicesDelete/([0-9]+)" => "servicesDelete/$1",

             "admin/images" => "images"//to do image crud&storage
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
			"search/list" => "index", //TODO: validation & filters
//            "search/view/([0-9]+)" => "view/$1"
		),
        "ErrorsController" => array(
			"error" => "index"
		)
	);
