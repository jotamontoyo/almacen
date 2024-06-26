<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('admin', static function ($routes)
{
    $routes->get('/productos', 'Admin\Productos::index');
});

$routes->get('/',       'Home::index');

$routes->get('/productos',                      'Productos::index'); //, ['filter' => 'apiauth']);
$routes->get('/productos/new',                  'Productos::new');
$routes->post('/productos',                     'Productos::create');
$routes->get('/productos/(:num)',               'Productos::show/$1');
$routes->get('/productos/(:num)/edit',          'Productos::edit/$1');
$routes->put('/productos/(:num)',               'Productos::update/$1');
$routes->get('/productos/(:alpha)/(:num)',      'Productos::cat/$1/$2');
$routes->delete('/productos/(:num)',            'Productos::delete/$1');

$routes->get('invalid',  'Productos::invalidRequest');

$routes->get('/almacen/new',                    'Almacen::new');
$routes->get('/almacen',                        'Almacen::index');
$routes->post('/almacen',                       'Almacen::create');
$routes->get('/almacen/(:num)',                 'Almacen::show/$1'); 
$routes->get('/almacen/(:num)/edit',            'Almacen::edit/$1'); 
$routes->put('/almacen/(:num)',                 'Almacen::update/$1');
$routes->delete('/almacen/(:num)',              'Almacen::delete/$1');


$routes->get('upload',          'Galeria::index');
$routes->post('upload',         'Galeria::subir');

service('auth')->routes($routes);

//$routes->get('logout', 'LoginController::logoutAction');







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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
