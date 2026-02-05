<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // Halaman utama tetap di Home

// Rute untuk http://localhost:8080/coba
$routes->get('coba', 'Coba::index');

// Rute untuk http://localhost:8080/coba/siswa_detail
$routes->get('coba/siswa_detail', 'Coba::siswa_detail');
// Tambahkan rute ini
$routes->get('siswa_detail/(:any)', 'Coba::siswa_detail/$1');
$routes->get('halaman', 'Halaman::index');
// In Routes.php

