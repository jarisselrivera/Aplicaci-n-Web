<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], '/registrar', 'Usuarios::registrar', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/login', 'Usuarios::login', ['filter' => 'noauth']);
$routes->get('/', 'Home::index');
$routes->get('/usuarios', 'Usuarios::index', ['filter' => 'auth']);
$routes->get('/usuarios/crear', 'Usuarios::crear', ['filter' => 'auth']);
$routes->get('/usuarios/editar/(:num)', 'Usuarios::editar/$1', ['filter' => 'auth']);
$routes->get('/usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1', ['filter' => 'auth']);
$routes->match(['post', 'get'], 'usuarios/almacenar', 'Usuarios::almacenar', ['filter' => 'auth']);
$routes->match(['post', 'get'], 'usuarios/actualizar', 'Usuarios::actualizar', ['filter' => 'auth']);
$routes->get('/dropdown', 'Dropdown::index', ['filter' => 'auth']);
$routes->get('/dropdown/getEstados', 'Dropdown::getEstados', ['filter' => 'auth']);
$routes->get('/dropdown/getCiudades', 'Dropdown::getCiudades', ['filter' => 'auth']);
$routes->get('/estudiantes', 'Estudiante::index', ['filter' => 'auth']);
$routes->get('/estudiante/agregarEstudiante', 'Estudiante::agregarEstudiante', ['filter' => 'auth']);
$routes->post('/estudiante/salvarEstudiante', 'Estudiante::salvarEstudiante', ['filter' => 'auth']);
$routes->get('/estudiante/editarEstudiante/(:num)', 'Estudiante::editarEstudiante/$1', ['filter' => 'auth']);
$routes->post('/estudiante/actualizarEstudiante', 'Estudiante::actualizarEstudiante', ['filter' => 'auth']);
$routes->get('/estudiante/eliminarEstudiante/(:num)', 'Estudiante::eliminarEstudiante/$1', ['filter' => 'auth']);
$routes->get('/catedraticos', 'Catedraticos::index', ['filter' => 'auth']);
$routes->get('/catedraticos/crear', 'Catedraticos::crear', ['filter' => 'auth']);
$routes->get('/catedraticos/editar/(:num)', 'Catedraticos::editar/$1', ['filter' => 'auth']);
$routes->get('/catedraticos/eliminar/(:num)', 'Catedraticos::eliminar/$1', ['filter' => 'auth']);
$routes->post('/catedraticos/salvarCatedratico', 'Catedraticos::salvarCatedratico', ['filter' => 'auth']);
$routes->match(['post', 'get'], 'catedraticos/actualizar', 'Catedraticos::actualizar', ['filter' => 'auth']);
$routes->get('/asignaturas', 'Asignaturas::index', ['filter' => 'auth']);
$routes->get('/asignaturas/crear', 'Asignaturas::crear', ['filter' => 'auth']);
$routes->post('/asignaturas/salvarAsignaturas', 'Asignaturas::salvarAsignaturas', ['filter' => 'auth']);
$routes->get('/asignaturas/editar/(:num)', 'Asignaturas::editar/$1', ['filter' => 'auth']);
$routes->get('/asignaturas/eliminar/(:num)', 'Asignaturas::eliminar/$1', ['filter' => 'auth']);
$routes->get('/secciones', 'Secciones::index', ['filter' => 'auth']);
$routes->get('/secciones/crear', 'Secciones::crear', ['filter' => 'auth']);
$routes->post('/secciones/salvarSecciones', 'Secciones::salvarSecciones', ['filter' => 'auth']);
$routes->get('/secciones/editar/(:num)', 'Secciones::editar/$1', ['filter' => 'auth']);
$routes->get('/secciones/eliminar/(:num)', 'Secciones::eliminar/$1', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth'], ['filter' => 'auth']);
$routes->get('/perfil', 'Usuarios::perfil', ['filter' => 'auth'], ['filter' => 'auth']);
$routes->get('/logout', 'Usuarios::logout');
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
