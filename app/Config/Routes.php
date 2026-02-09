<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('tasks/create', 'Tasks::create'); // Menampilkan form
$routes->post('tasks/store', 'Tasks::store');   // Menyimpan data ke DB
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');    // Menampilkan form edit
$routes->post('tasks/update/(:num)', 'Tasks::update/$1'); // Memproses update data
$routes->get('tasks/complete/(:num)', 'Tasks::complete/$1');