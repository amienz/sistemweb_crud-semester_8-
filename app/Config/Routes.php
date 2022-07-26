<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/user', 'User::index');

$routes->get('/buku', 'Buku::index');
$routes->get('/buku/(:any)', 'Buku::index/$1');
$routes->post('/buku/(:any)', 'Buku::index/$1');

$routes->get('/user/create', 'User::create');
$routes->get('/user/data', 'User::getData');
$routes->get('/user/form', 'User::getForm');
$routes->get('/user/form/(:segment)', 'User::edit/$1');
$routes->get('/user/(:segment)', 'User::detail/$1');
$routes->post('/user/insert', 'User::insert');
$routes->put('/user/(:segment)', 'User::update/$1');
$routes->delete('/user/(:segment)', 'User::hapus/$1');
$routes->get('/masuk', 'Otentikasi::index');
$routes->post('/cek', 'Otentikasi::login');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
