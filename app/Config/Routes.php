<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



$routes->get('integrantes/index','IntegranteController::index');
$routes->get('integrantes/create','IntegranteController::create');
$routes->post('integrantes/store','IntegranteController::store');
$routes->get('integrantes/edit/(:num)', 'IntegranteController::edit/$1');
$routes->post('integrantes/update/(:num)', 'IntegranteController::update/$1');
$routes->get('integrantes/delete/(:num)', 'IntegranteController::delete/$1');

$routes->get('integrantes/sql','IntegranteController::sql');
