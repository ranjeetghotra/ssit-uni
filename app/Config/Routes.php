<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('', 'Home::index');
$routes->add('gallery', 'Home::page/gallery/Gallery');
$routes->add('press-release', 'Home::page/press/Press Release');
$routes->add('contact-us', 'Home::page/contact/Contact us');
$routes->add('about-us', 'Home::page/about/About us');
$routes->add('vision-mission', 'Home::page/vision/Vision & Mission');
$routes->add('chairman-message', 'Home::page/chairman-message/Chairman Message');
$routes->add('principal-message', 'Home::page/principal-message/Principal Message');

$routes->add('ssit-advantages', 'Home::page/ssit-advantages/SSIT Adventages');
$routes->add('placement-record', 'Home::page/placement-record/Placement Record');
$routes->add('personality-development', 'Home::page/personality-development/Personality Traits to Develop');


$routes->add('auth/admin', 'Manage::login');
$routes->add('auth/admin/submit', 'Manage::login/submit');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
