<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Auth 
$routes->get('/', 'Auth::login');
$routes->get('/registrasi', 'Auth::registrasi');
$routes->get('/logout', 'Auth::logout');

$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->post('/auth/addUser', 'Auth::addUser');

// Dashboard
$routes->get('/dashboard', 'Home::dashboard', ['filter' => 'authfilter']);

// Kategori
$routes->get('/kategori', 'Kategori::index', ['filter' => 'authfilter']);
$routes->get('/kategori/hapus/(:num)', 'Kategori::hapus/$1', ['filter' => 'authfilter']);

$routes->post('/kategori/tambah', 'Kategori::tambah', ['filter' => 'authfilter']);
$routes->post('/kategori/edit/(:num)', 'Kategori::ubah/$1', ['filter' => 'authfilter']);

// Departemen
$routes->get('/departemen', 'Dep::index', ['filter' => 'authfilter']);
$routes->get('/departemen/hapus/(:num)', 'Dep::hapus/$1', ['filter' => 'authfilter']);

$routes->post('/departemen/tambah', 'Dep::tambah', ['filter' => 'authfilter']);
$routes->post('/departemen/edit/(:num)', 'Dep::ubah/$1', ['filter' => 'authfilter']);

// User
$routes->get('/user', 'User::user', ['filter' => 'authfilter']);
$routes->get('/user/add', 'User::add', ['filter' => 'authfilter']);
$routes->get('/user/edit/(:any)', 'User::edit/$1', ['filter' => 'authfilter']);
$routes->get('/user/hapus/(:num)', 'User::hapus/$1', ['filter' => 'authfilter']);

$routes->post('/user/tambah', 'User::tambah', ['filter' => 'authfilter']);
$routes->post('/user/update/(:any)', 'User::update/$1', ['filter' => 'authfilter']);

// Arsip
$routes->get('/arsip', 'Arsip::index', ['filter' => 'authfilter']);
$routes->get('/arsip/add', 'Arsip::add', ['filter' => 'authfilter']);
$routes->get('/arsip/edit/(:any)', 'Arsip::edit/$1', ['filter' => 'authfilter']);
$routes->get('/arsip/hapus/(:num)', 'Arsip::hapus/$1', ['filter' => 'authfilter']);
$routes->get('/arsip/viewpdf/(:num)', 'Arsip::viewpdf/$1', ['filter' => 'authfilter']);

$routes->post('/arsip/tambah', 'Arsip::tambah', ['filter' => 'authfilter']);
$routes->post('/arsip/update/(:any)', 'Arsip::update/$1', ['filter' => 'authfilter']);
