<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



 $routes->get('generate-token', 'TokenController::generateToken');
 $routes->get('fetch-users/(:num)', 'UserController::fetchUsers/$1');
 $routes->get('calculate-stats', 'StatsController::calculateStats');
 