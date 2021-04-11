<?php

namespace Config;

use CodeIgniter\Router\Router;

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
$routes->setDefaultController('Auth/auth');
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
// route since we don't have to scan directories.
/**Routes Auth */
$routes->get('/login', 'Auth/Auth::auth');
$routes->get('/register', 'Auth/Auth::register');
$routes->get('/forgot', 'Auth/Auth::forgot');
$routes->get('/reset', 'Auth/Auth::reset');
/** Routes Admin */
$routes->get('/dashboard_admin', 'Admin/Dashboard_admin::dashboard_admin', ['filter' => 'role:admin,super_admin']);
// $routes->get('/dashboard_admin/dashboard_admin', 'Admin/Dashboard_admin::dashboard_admin', ['filter' => 'role:admin,super_admin']);
$routes->get('/userlist', 'Admin/Ui_admin::userlist', ['filter' => 'role:super_admin']);
$routes->get('/kelas', 'Admin/Ui_admin::kelas', ['filter' => 'role:super_admin ,Admin ']);
$routes->get('/walikelas', 'Admin/Ui_admin::walikelas', ['filter' => 'role:super_admin,Admin']);
$routes->get('/siswa', 'Admin/Ui_admin::siswa', ['filter' => 'role:super_admin,Admin']);
$routes->get('/spp', 'Admin/Ui_admin::dataspp', ['filter' => 'role:super_admin,Admin']);
$routes->get('/transaksi', 'Admin/Ui_admin::Transaksi', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpankelas', 'Admin/Ui_admin::simpankelas', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpanspp', 'Admin/Ui_admin::Simpanspp', ['filter' => 'role:super_admin,Admin']);
$routes->post('/hapuskelas', 'Admin/Ui_admin::hapuskelas', ['filter' => 'role:super_admin,Admin']);
$routes->post('/updatekelas', 'Admin/Ui_admin::Updatekelas', ['filter' => 'role:super_admin,Admin']);
$routes->post('/updatespp', 'Admin/Ui_admin::Updatespp', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpansiswa', 'Admin/Ui_admin::Simpansiswa', ['filter' => 'role:super_admin,Admin']);
$routes->post('/hapussiswa', 'Admin/Ui_admin::Hapussiswa', ['filter' => 'role:super_admin,Admin']);
$routes->post('/updatesiswa', 'Admin/Ui_admin::Updatesiswa', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpantransaksi', 'Admin/Ui_admin::Simpantransaksi', ['filter' => 'role:super_admin,Admin']);
$routes->post('/updatetf', 'Admin/Ui_admin::Updatetf', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpanwali', 'Admin/Ui_admin::Simpanwali', ['filter' => 'role:super_admin,Admin']);
$routes->post('/updatewali', 'Admin/Ui_admin::Updatewali', ['filter' => 'role:super_admin,Admin']);
$routes->post('/hapuswali', 'Admin/Ui_admin::Hapuswali', ['filter' => 'role:super_admin,Admin']);
$routes->get('/laporanadmin', 'Admin/Ui_admin::Laporanadmin', ['filter' => 'role:super_admin,Admin']);
$routes->get('/printpdf', 'Admin/Ui_admin::htmlToPDF', ['filter' => 'role:super_admin,Admin']);
$routes->get('/invoice_admin', 'Admin/Ui_admin::invoice_admin', ['filter' => 'role:super_admin,Admin']);
$routes->post('/simpanuser', 'Admin/Ui_admin::simpanuser', ['filter' => 'role:super_admin']);
/**AJAX */
// $routes->get('/Getidkelas', 'Admin/Ui_admin::Getidkelas', ['filter' => 'role:super_admin,Admin']);
// $routes->get('/detail/(:num)', '/Admin/Ui_admin::detail/($1)');
/**Routes Users */
$routes->get('/dashboard', 'Users/Dashboard::dashboard');
$routes->get('/pembayaran', 'users/Ui::bayar_spp');
$routes->post('/bayarspp', 'users/Ui::bayarspp');
$routes->get('/invoice', 'users/Ui::invoice_spp');
$routes->get('/history_spp', 'users/Ui::history_spp');
$routes->post('/kaitkan', 'users/Ui::kaitkan');
$routes->post('/contact', 'Users/Ui::contact');
// $routes->post('/dashboard', 'Users/Dashboard::dashboard');
$routes->get('/profile', 'Users/Ui::profile');




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
