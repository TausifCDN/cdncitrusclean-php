<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::index');
$routes->get('/terms-conditions', 'Home::termsConditions');
$routes->get('/return-policy', 'Home::returnPolicy');
$routes->get('/delivery-policy', 'Home::deliveryPolicy');
$routes->get('/privacy-policy', 'Home::privacyPolicy');

$routes->get('/admin/categories', 'Category::index');
$routes->get('/admin/categories/add', 'Category::addCategory');
$routes->get('/admin/categories/edit', 'Category::editCategory');
$routes->post('/admin/categories/create', 'Category::createCategory');
$routes->post('/admin/categories/update', 'Category::updateCategory');
$routes->get('/admin/categories/delete', 'Category::category_delete');

$routes->get('/admin/faqs', 'Faqs::index');
$routes->get('/admin/faqs/add', 'Faqs::addFaq');
$routes->get('/admin/faqs/edit', 'Faqs::editFaq');
$routes->post('/admin/faqs/create', 'Faqs::createFaq');
$routes->post('/admin/faqs/update', 'Faqs::updateFaq');
$routes->get('/admin/faqs/delete', 'Faqs::faq_delete');

$routes->get('/admin/users', 'User::allUsers');
$routes->get('/admin/orders', 'Orders::index');

$routes->get('/admin/products', 'Products::adminAllProducts');
$routes->get('/admin/products/add', 'Products::addProduct');
$routes->get('/admin/products/edit', 'Products::editProduct');
$routes->post('/admin/products/create', 'Products::createProduct');
$routes->post('/admin/products/update', 'Products::updateProduct');
$routes->get('/admin/products/delete', 'Products::product_delete');

// ca

$routes->get('/admin/careers', 'Careers::Careerss');
$routes->get('/admin/careers/edit', 'Careers::editjobs');
// $routes->get('/admin/products/edit', 'Products::editProduct');
$routes->post('/admin/careers/update', 'Careers::updatejobs');
// $routes->post('/admin/products/update', 'Products::updateProduct');
// $routes->get('/admin/products/delete', 'Products::product_delete');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
