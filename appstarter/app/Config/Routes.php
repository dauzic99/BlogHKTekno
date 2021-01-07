<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::prosesLogin');
$routes->post('/logout', 'Auth::logout');

$routes->get('admin/user/edit-profile', 'Auth::profile', ['filter' => 'auth']);
$routes->post('admin/user/edit-profile', 'Auth::editProfile', ['filter' => 'auth']);
$routes->post('admin/user/edit-password', 'Auth::editPassword', ['filter' => 'auth']);

$routes->get('admin/contact', 'Contact::edit', ['filter' => 'auth']);
$routes->post('admin/contact/edit-contact', 'Contact::editContact', ['filter' => 'auth']);
$routes->post('admin/contact/edit-socmed', 'Contact::editSocmed', ['filter' => 'auth']);


$routes->get('/admin/pegawai', 'Pegawai::index', ['filter' => 'auth']);
$routes->get('/admin/pegawai/create', 'Pegawai::create', ['filter' => 'auth']);
$routes->post('/admin/pegawai/save', 'Pegawai::save', ['filter' => 'auth']);
$routes->get('/admin/pegawai/edit/(:segment)', 'Pegawai::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/pegawai/update/(:segment)', 'Pegawai::update/$1', ['filter' => 'auth']);
$routes->post('/admin/pegawai/delete', 'Pegawai::delete', ['filter' => 'auth']);



$routes->get('/admin', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/admin/menu', 'Jenis_Menu::index', ['filter' => 'auth']);
$routes->post('/admin/menu/delete', 'Jenis_Menu::delete', ['filter' => 'auth']);
$routes->get('/admin/menu/create', 'Jenis_Menu::create', ['filter' => 'auth']);
$routes->get('/admin/menu/edit/(:segment)', 'Jenis_Menu::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/menu/update/(:segment)', 'Jenis_Menu::update/$1', ['filter' => 'auth']);
$routes->post('/admin/menu/save', 'Jenis_Menu::save', ['filter' => 'auth']);


$routes->get('/admin/menu/(:segment)', 'Menu::index/$1', ['filter' => 'auth']);
$routes->get('/admin/menu/(:segment)/create', 'Menu::create/$1', ['filter' => 'auth']);
$routes->post('/admin/menu/(:segment)/save', 'Menu::save', ['filter' => 'auth']);
$routes->post('/admin/menu/(:segment)/delete', 'Menu::delete', ['filter' => 'auth']);
$routes->get('/admin/menu/(:segment)/edit/(:segment)', 'Menu::edit/$1/$2', ['filter' => 'auth']);
$routes->post('/admin/menu/(:segment)/update/(:segment)', 'Menu::update/$1/$2', ['filter' => 'auth']);

//secret menu
$routes->get('/admin/secret-menu', 'Secret_Jenis::index', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/delete', 'Secret_Jenis::delete', ['filter' => 'auth']);
$routes->get('/admin/secret-menu/create', 'Secret_Jenis::create', ['filter' => 'auth']);
$routes->get('/admin/secret-menu/edit/(:segment)', 'Secret_Jenis::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/update/(:segment)', 'Secret_Jenis::update/$1', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/save', 'Secret_Jenis::save', ['filter' => 'auth']);

$routes->get('/admin/secret-menu/(:segment)', 'Secret::index/$1', ['filter' => 'auth']);
$routes->get('/admin/secret-menu/(:segment)/create', 'Secret::create/$1', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/(:segment)/save', 'Secret::save', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/(:segment)/delete', 'Secret::delete', ['filter' => 'auth']);
$routes->get('/admin/secret-menu/(:segment)/edit/(:segment)', 'Secret::edit/$1/$2', ['filter' => 'auth']);
$routes->post('/admin/secret-menu/(:segment)/update/(:segment)', 'Secret::update/$1/$2', ['filter' => 'auth']);

$routes->get('/admin/meja', 'Meja::index', ['filter' => 'auth']);
$routes->post('/admin/meja/delete', 'Meja::delete', ['filter' => 'auth']);
$routes->get('/admin/meja/create', 'Meja::create', ['filter' => 'auth']);
$routes->post('/admin/meja/save', 'Meja::save', ['filter' => 'auth']);
$routes->get('/admin/meja/edit/(:segment)', 'Meja::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/meja/update/(:segment)', 'Meja::update/$1', ['filter' => 'auth']);
$routes->post('/admin/meja/getQR', 'Meja::getQR', ['filter' => 'auth']);


$routes->get('/admin/daerah', 'Daerah::index', ['filter' => 'auth']);
$routes->post('/admin/daerah/delete', 'Daerah::delete', ['filter' => 'auth']);
$routes->get('/admin/daerah/create', 'Daerah::create', ['filter' => 'auth']);
$routes->post('/admin/daerah/save', 'Daerah::save', ['filter' => 'auth']);
$routes->get('/admin/daerah/edit/(:segment)', 'Daerah::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/daerah/update/(:segment)', 'Daerah::update/$1', ['filter' => 'auth']);





$routes->get('/', 'Front::index');
$routes->get('/menu', 'Front::menu');
$routes->get('/contact-us', 'Front::contact');
$routes->get('/get-menu', 'Order::getMenu');
$routes->get('/get-daerah', 'Order::getDaerah');
$routes->post('/add-cart', 'Order::addCart');
$routes->post('/add-cart-secret', 'Order::addCartSecret');
$routes->post('/delete-cart', 'Order::deleteCart');
$routes->post('/delete-cart-secret', 'Order::deleteCartSecret');
$routes->post('/order', 'Order::pesan');

$routes->post('/order-secret', 'Order::pesanSecret');
$routes->get('/secret/(:segment)', 'Front::secret/$1');

$routes->get('/cekSession', 'Front::cek');





/**
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
