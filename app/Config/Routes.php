<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('/buku/tambah', 'Buku::tambah');
$routes->get('/buku/ubah/(:any)', 'Buku::ubah/$1');
$routes->post('/buku/update/(:any)', 'Buku::update/$1');
$routes->post('/buku/simpan', 'Buku::simpan');
$routes->delete('/buku/(:num)', 'Buku::hapus/$1');
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/detail/(:any)', 'Buku::detail/$1');