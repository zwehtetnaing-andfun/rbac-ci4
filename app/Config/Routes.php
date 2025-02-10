<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/no-access', 'AccessController::index');
$routes->get('/posts', 'PostController::index');
$routes->get('/posts/create', 'PostController::create',['filter' => 'create_access']);
$routes->post('/posts/store', 'PostController::store');
$routes->get('/posts/edit/(:num)', 'PostController::edit/$1',['filter' => 'edit_access']);
$routes->post('/posts/store', 'PostController::update');
$routes->get('/posts/delete/(:num)', 'PostController::delete/$1',['filter' => 'delete_access']);