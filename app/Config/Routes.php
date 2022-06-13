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

// untuk mengarahkan ke halaman postingan untuk semua user jika sudah berhasil masuk 
$routes->get('', 'HomeController::index');

// untuk mengarahkan user jika ingin melihat detail postingan
$routes->get('/post/(:segment)', 'HomeController::detail/$1');

// untuk mengarahkan user ke halaman login jika ingin masuk
$routes->get('/login', 'ValidController::index');

// untuk mengarahkan user ke halaman regist jika ingin mendaftar
$routes->get('/regist', 'ValidController::regist');

// untuk memproses registrasi user
$routes->post('/daftaruser', 'ValidController::daftaruser');

// untuk memproses login user
$routes->post('/loginuser', 'ValidController::loginuser');

// untuk memproses logout user
$routes->get('/logout', 'ValidController::logout');

// untuk mengarahkan ke halaman postingan berisi postingan yang dibuat oleh user
$routes->get('/post', 'PostController::index');

// untuk mengarahkan ke halaman tambah postingan
$routes->get('/tambahpost', 'PostController::tambah');

// untuk memproses postingan yang di tambahkan
$routes->post('/prosespost', 'PostController::prosespost');

// untuk mengarahkan ke halaman edit postingan
$routes->get('/edit/(:segment)', 'PostController::edit/$1');

// untuk memproses edit postingan
$routes->post('/editpost', 'PostController::editpost');

// untuk mengarahkan/memproses ke halaman delete postingan
$routes->get('/hapus/(:segment)', 'PostController::hapus/$1');

// untuk mengarahkan ke halaman admin berisikan daftar user
$routes->get('/users', 'AdminController::index');

// untuk mengarahkan ke halaman update user
$routes->get('/update/(:segment)', 'AdminController::update/$1');

// untuk memproses update user
$routes->post('/updateuser', 'AdminController::updateuser');

// untuk memproses update user
$routes->get('/delete/(:segment)', 'AdminController::delete/$1');


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