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
//    route since we don't have to scan directories. 
$routes->get('/', 'Home::index');
$routes->resource('user_master');
$routes->get('show','Home::show');
$routes->get('getdata','Home::getdata');
$routes->get('signadmin', 'Home::signadmin');
$routes->get('sign-up', 'Home::signup');
$routes->post('checkuser', 'Home::checkuser');
$routes->get('viewdashboard', 'Home::viewdashboard');
$routes->get('view_admin_profile', 'Home::view_admin_profile');
$routes->get('addofficer', 'Home::addofficer');
$routes->post('store_officer', 'Home::store_officer');
$routes->post('store_employee', 'Home::store_employee');
$routes->get('view_profile','Home::view_profile');
$routes->get('updateProfile','Home::updateProfile');
$routes->post('update_profile_store','Home::update_profile_store');
$routes->get('viewempdashboard', 'Home::viewempdashboard');
$routes->get('viewofficer', 'Home::viewofficer');
$routes->get('getemp', 'Home::getemp');
$routes->get('getallempdata', 'Home::getallempdata');
$routes->get('getallapi', 'Home::getallapi');
$routes->get('update_emp/(:num)', 'Home::update_emp/$1');
$routes->post('update_employee', 'Home::update_employee');
$routes->post('delete_employee', 'Home::delete_employee');
$routes->post('stspdate', 'Home::stspdate');
$routes->get('viewcomplaint', 'Home::viewcomplaint');
$routes->post('store_complaint', 'Home::store_complaint');
$routes->get('Feedback', 'Home::Feedback');
$routes->get('complaint_report','Home::complaint_report');
$routes->get('officer_report', 'Home::officer_report');
$routes->get('complaint', 'Home::complaint');
$routes->get('frtpwd', 'Home::frtpwd');
$routes->post('forgot_pwd', 'Home::forgot_pwd');
$routes->get('signOut', 'Home::signOut');
$routes->get('AdminsignOut', 'Home::AdminsignOut');
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
?>