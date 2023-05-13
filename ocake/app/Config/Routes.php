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
$routes->setDefaultController('User');
// $routes->setDefaultController('Personal');
$routes->setDefaultMethod('home');
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


//*************************** ADMIN CONTROLLER ROUTING ***************************//

$routes->get('/admin', 'Admin::signin');
$routes->get('admin/logout', 'Admin::logout');
$routes->post('/login_account', 'Admin::login');
$routes->get('admin/default_admin', 'Admin::restore_default_admin');
$routes->get('/forgotpassword', 'Admin::forgotpassword');

// $routes->get('/verify_email', 'User::verify_email');
// $routes->post('/verify', 'User::verify');
$routes->post('sendAdminResetCode', 'Admin::sendAdminResetCode');
$routes->get('admin/otp', 'Admin::otp');
$routes->post('admin/verifyResetCode', 'Admin::verifyResetCode');
$routes->get('admin/resetPassword', 'Admin::resetPassword');
$routes->post('admin/updatePass', 'Admin::updatePass');
$routes->get('admin/passwordResetSuccessful', 'Admin::passwordResetSuccessful');
// $routes->get('admin/forgotpassword', 'Admin::forgotpassword');

$routes->get('admin/dashboard', 'Admin::dashboard1');

$routes->post('admin/addproduct', 'Admin::addproduct');
$routes->get('/admin/productlist', 'Admin::productlist');
$routes->post('/admin/productlist', 'Admin::productlist');
$routes->get('/admin/productlist/delete_prod/(:any)', 'Admin::delete_product/$1/$2');
$routes->post('/admin/productlist/update_prod/(:any)', 'Admin::update_product/$1/$2');

$routes->post('admin/addcategory', 'Admin::addcategory');
$routes->get('admin/categorylist', 'Admin::categorylist');
$routes->post('admin/categorylist', 'Admin::categorylist');
$routes->get('/admin/categorylist/delete_cat/(:any)', 'Admin::delete_category/$1/$2');
$routes->post('/admin/categorylist/update_cat/(:any)', 'Admin::update_category/$1/$2');

$routes->post('admin/addflavor', 'Admin::addflavor');
$routes->get('admin/flavorlist', 'Admin::flavorlist');
$routes->post('admin/flavorlist', 'Admin::flavorlist');
$routes->get('/admin/flavorlist/delete_flavor/(:any)', 'Admin::delete_flavor/$1/$2');
$routes->post('/admin/flavorlist/update_flavor/(:any)', 'Admin::update_flavor/$1/$2');

$routes->post('admin/add_addons', 'Admin::add_add_ons');
$routes->get('admin/addonslist', 'Admin::addonslist');
$routes->post('admin/addonslist', 'Admin::addonslist');
$routes->get('/admin/addonslist/delete_addons/(:any)', 'Admin::delete_addons/$1/$2');
$routes->post('/admin/addonslist/update_addons/(:any)', 'Admin::update_addons/$1/$2');

$routes->get('admin/saleslist', 'Admin::saleslist');
$routes->get('/admin/saleslist/delete_sales/(:any)', 'Admin::delete_flavor/$1/$2');
$routes->post('/admin/saleslist/update_sales/(:any)', 'Admin::update_sales/$1/$2');

$routes->get('admin/visualization', 'Admin::visualization');
$routes->get('chart-apex', 'Admin::apex');
$routes->get('chart-morris', 'Admin::morris');
$routes->get('chart-peity', 'Admin::peity');
$routes->get('chart-flot', 'Admin::flot');

// NEWLY INVENTED ROUTE SIMPLIFY BY CALLING THE MOTHER PATH OR ROUTE NAME
$routes->group('admin', static function ($routes) {
    $routes->get('pos', 'PosController::index');
    $routes->post('purchase', 'PosController::store');
});

$routes->group('customers', static function ($routes) {
    $routes->get('index', 'CustomersController::getAllData');
    $routes->post('save', 'CustomersController::store');
    $routes->post('purchase', 'PosController::store');
});



//**************************** USER CONTROLLER ROUTING ***************************//
# landing page #
$routes->get('/', 'User::home');   
$routes->get('/landing_page', 'User::landingpage');                 
$routes->get('/logout', 'User::logout');
$routes->get('/signin', 'User::signin');
$routes->post('/save', 'User::save');
$routes->post('/login', 'User::login');
$routes->get('/verify_email', 'User::verify_email');
$routes->post('/verify', 'User::verify');
$routes->post('/sendResetCode', 'User::sendResetCode');
$routes->get('/otp', 'User::otp');
$routes->post('/verifyResetCode', 'User::verifyResetCode');
$routes->get('/resetPassword', 'User::resetPassword');
$routes->post('/updatePass', 'User::updatePass');
$routes->get('/passwordResetSuccessful', 'User::passwordResetSuccessful');
# pages #
$routes->get('/home', 'User::home');
$routes->get('/profile', 'User::user_profile');
$routes->post('/profile', 'User::user_profile');
$routes->post('/user/update_profile/(:any)', 'User::profile_update/$1/$2');
$routes->get('/userforgotpassword', 'User::userforgotpassword');
$routes->get('/about', 'User::about');
$routes->get('/contact', 'User::contact');
$routes->get('/customization', 'User::customization');
$routes->get('/cart', 'User::cart');
$routes->get('/orderdetails', 'User::orderdetails');
$routes->get('/to_rate', 'User::toRateOrder');
$routes->get('/to_received', 'User::toReceivedOrder');
$routes->get('/completedorder', 'User::completedOrder');
$routes->get('/cancelledorder', 'User::cancelledOrder');
$routes->post('/orderdetails', 'User::orderdetails');
$routes->get('/orders', 'User::userOrders');
$routes->post('/cancel_order/(:any)', 'User::cancel_order/$1/$2');
$routes->post('/order_received/(:any)', 'User::order_received/$1/$2');
$routes->match(['get','post'], "/addrate", "User::add_rate");
$routes->get('/checkout', 'User::checkout');
$routes->get('/productlist', 'User::productlist');
$routes->get('/productgrid', 'User::productgrid');
$routes->get('/faq', 'User::faq');
$routes->get('/popular', 'User::popular');
$routes->post('/productdetails', 'User::productdetails');
# category #
$routes->get('/birthday', 'User::getBDay');
$routes->get('/christening', 'User::getChristening');
$routes->get('/christmas', 'User::getChristmas');
$routes->get('/halloween', 'User::getHalloween');
$routes->get('/valentine', 'User::getValentine');
$routes->get('/graduation', 'User::getGrad');
$routes->get('/newyear', 'User::getNewYear');
$routes->get('/wedding', 'User::getWedding');
# customization #
$routes->post('/save_design', 'User::saveFinalDesign');
$routes->get('/custom_design', 'User::getCustomDesign');
# cart #
$routes->post('/add_cart', 'User::add_cart');
$routes->get('cart/delete_cart/(:any)', 'User::CartData_delete/$1/$2');
$routes->post('/placeorder','User::placeorder');
$routes->post('/update_order', 'User::update_order');
// $routes->get('/photo', 'User::photo');
// $routes->post('/addphoto','User::addphoto');



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