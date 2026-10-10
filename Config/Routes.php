<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/blog', 'Blog::index');
$routes->get('/userinfo', 'UserInfoController::index');
$routes->get('/userinfoAPI', 'UserInfoAPI::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('/foodmartAPI/(:any)/(:any)', 'FoodmartAPI::index/$1/$2');

