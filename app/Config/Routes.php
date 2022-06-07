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
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('/');
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
$routes->get('', 'HomeController::index');
$routes->get('/post/(:segment)', 'HomeController::detail/$1');
$routes->get('/login', 'ValidController::index');
$routes->get('/regist', 'ValidController::regist');
$routes->post('/daftaruser', 'ValidController::daftaruser');
$routes->post('/loginuser', 'ValidController::loginuser');
$routes->get('/logout', 'ValidController::logout');
$routes->get('/post', 'PostController::index');
$routes->get('/tambahpost', 'PostController::tambah');
$routes->post('/prosespost', 'PostController::prosespost');
$routes->post('/editpost', 'PostController::editpost');
$routes->get('/edit/(:segment)', 'PostController::edit/$1');
$routes->get('/hapus/(:segment)', 'PostController::hapus/$1');
$routes->get('/users', 'AdminController::index');
$routes->get('/update/(:segment)', 'AdminController::update/$1');
$routes->get('/delete/(:segment)', 'AdminController::delete/$1');
$routes->post('/updateuser', 'AdminController::updateuser');


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