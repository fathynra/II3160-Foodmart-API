<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/products', 'Products::index');
$routes->get('/products/(:num)', 'Products::show/$1');
$routes->get('/categories', 'Categories::index');