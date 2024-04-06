<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
*/

$routes->get('/', 'StudentController::index');
$routes->match(['get', 'post'], 'StudentController/importCsvToDb', 'StudentController::importCsvToDb');