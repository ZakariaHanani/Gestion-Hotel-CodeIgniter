<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'AuthController::register');
$routes->post('/store', 'AuthController::store');
$routes->get('/client', 'AjouterClient::index');
$routes->post('/client/store', 'AjouterClient::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/connexion', 'AuthController::verify_login');
$routes->get('/logout', 'AuthController::logout');
