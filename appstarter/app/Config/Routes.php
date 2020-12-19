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
$routes->get('/admin', 'Dashboard::index');

$routes->get('/admin/menu', 'Jenis_Menu::index');
$routes->post('/admin/menu/delete', 'Jenis_Menu::delete');
$routes->get('/admin/menu/create', 'Jenis_Menu::create');
$routes->get('/admin/menu/edit/(:segment)', 'Jenis_Menu::edit/$1');
$routes->post('/admin/menu/update/(:segment)', 'Jenis_Menu::update/$1');
$routes->post('/admin/menu/save', 'Jenis_Menu::save');


$routes->get('/admin/menu/(:segment)', 'Menu::index/$1');
$routes->get('/admin/menu/(:segment)/create', 'Menu::create/$1');
$routes->post('/admin/menu/(:segment)/save', 'Menu::save');
$routes->post('/admin/menu/(:segment)/delete', 'Menu::delete');
$routes->get('/admin/menu/(:segment)/edit/(:segment)', 'Menu::edit/$1/$2');
$routes->post('/admin/menu/(:segment)/update/(:segment)', 'Menu::update/$1/$2');


$routes->get('/admin/daerah', 'Daerah::index');
$routes->post('/admin/daerah/delete', 'Daerah::delete');
$routes->get('/admin/daerah/create', 'Daerah::create');
$routes->post('/admin/daerah/save', 'Daerah::save');
$routes->get('/admin/daerah/edit/(:segment)', 'Daerah::edit/$1');
$routes->post('/admin/daerah/update/(:segment)', 'Daerah::update/$1');





$routes->get('/', 'Front::index');
$routes->get('/menu', 'Front::menu');
$routes->get('/get-menu', 'Order::getMenu');
$routes->get('/get-daerah', 'Order::getDaerah');
$routes->post('/add-cart', 'Order::addCart');
$routes->post('/delete-cart', 'Order::deleteCart');
$routes->post('/order', 'Order::pesan');



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
