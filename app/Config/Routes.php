<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Home::index');


$routes->get('admin','Admin\DashboardController::index', ['as'=>'dashboard.index']);

$routes->get('admin/users', 'Admin\UserController::index', ['as'=>'users.index']);
$routes->post('admin/create-user', 'Admin\UserController::create' ,['as'=>'users.create']);
$routes->post('admin/update-user', 'Admin\UserController::update', ['as'=>'users.update']);
$routes->post('admin/delete-user', 'Admin\UserController::delete', ['as'=>'users.delete']);

$routes->get('admin/categories', 'Admin\CategoryController::index', ['as'=>'categories.index']);
$routes->get('admin/fetch-categories', 'Admin\CategoryController::fetch', ['as'=>'categories.fetch']);
$routes->post('admin/create-category', 'Admin\CategoryController::create' ,['as'=>'categories.create']);
$routes->post('admin/update-category', 'Admin\CategoryController::update', ['as'=>'categories.update']);
$routes->post('admin/delete-category', 'Admin\CategoryController::delete', ['as'=>'categories.delete']);

$routes->get('admin/articles', 'Admin\ArticleController::index', ['as'=>'articles.index']);
$routes->post('admin/create-article', 'Admin\ArticleController::create' ,['as'=>'articles.create']);
$routes->post('admin/update-article', 'Admin\ArticleController::update', ['as'=>'articles.update']);
$routes->post('admin/delete-article', 'Admin\ArticleController::delete', ['as'=>'articles.delete']);


$routes->get('checkconnect', function(){
	$database = \Config\Database::connect();

	if ($database->connect()) {
		echo "Kết nối cơ sở dữ liệu thành công!";
	} else {
		echo "Kết nối cơ sở dữ liệu thất bại!";
	}
});


