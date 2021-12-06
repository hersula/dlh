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
// route since we don't have to scan directories...
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'admin/Dashboard::index');
$routes->get('/user/dashboard', 'user/Dashboard::index');

// Registration
$routes->get('register', 'RegisterControllers::index', ['as' => 'register']);
$routes->post('register', 'RegisterControllers::attemptRegister');
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// Validasi Pendaftaran
$routes->get('admin/validasi-pendaftaran', 'admin/ValidasiPendaftaranControllers::index', ['as' => 'validasi-pendaftaran']);
$routes->post('admin/get-detail-validasi-pendaftaran', 'admin/ValidasiPendaftaranControllers::get_registration_detail', ['as' => 'get-detail-validasi-pendaftaran']);
$routes->post('admin/get-validasi-pendaftaran', 'admin/ValidasiPendaftaranControllers::registration_findAll', ['as' => 'get-validasi-pendaftaran']);
$routes->post('admin/edit-validasi-pendaftaran', 'admin/ValidasiPendaftaranControllers::edit_registration', ['as' => 'edit-validasi-pendaftaran']);
$routes->post('admin/verive-pendaftaran', 'admin/ValidasiPendaftaranControllers::validateRegister', ['as' => 'verive-pendaftaran']);

// Site WWTP
$routes->get('admin/titik_penaatan', 'admin/SiteWwtpControllers::index');
$routes->get('admin/titik_penaatan2', 'admin/SiteWwtpControllers::index2');
$routes->post('admin/get_titik_penaatan', 'admin/SiteWwtpControllers::get_titik_penaatan');
$routes->post('admin/get_all_titik_penaatan', 'admin/SiteWwtpControllers::get_all_titik_penaatan');
$routes->post('admin/add_titik_penaatan', 'admin/SiteWwtpControllers::add_titik_penaatan');
$routes->post('admin/edit_titik_penaatan', 'admin/SiteWwtpControllers::edit_titik_penaatan');
$routes->get('admin/session-register-wwtp', 'admin/SiteWwtpControllers::get_session_register_wwtp');
$routes->get('admin/destroy-session', 'admin/SiteWwtpControllers::destroy_session_register_wwtp');
$routes->post('admin/add_surat', 'admin/SiteWwtpControllers::add_surat');
$routes->get('admin/get_surat', 'admin/SiteWwtpControllers::get_surat');
$routes->post('admin/add_new_userSite', 'admin/SiteWwtpControllers::add_new_userSite');


$routes->get('admin/validasi-pendaftaran-wwtp', 'admin/ValidasiPendaftaranControllers::vwwtp_index');
$routes->post('admin/get-validasi-wwtp', 'admin/ValidasiPendaftaranControllers::get_validasi_wwtp');
$routes->get('admin/confrim-wwtp/(:any)', 'admin\ValidasiPendaftaranControllers::validateRegisterWWTP/$1');

//DATA HARIAN
$routes->get('/data-harian', 'Data_harian::index');
$routes->get('/get_data_harian', 'Data_harian::get_data_harian');
$routes->post('/get_parameter_harian', 'Data_harian::get_parameter_harian');
$routes->post('/add_data_harian', 'Data_harian::add_data_harian');
$routes->post('/edit_data_harian', 'Data_harian::edit_data_harian');
$routes->post('/get_datatable_data_harian', 'Data_harian::get_datatable_data_harian');
$routes->get('/export_data_harian/(:any)', 'Data_harian::export_data_harian');

// DATA INLET
$routes->get('/analisa-inlet', 'Analisa_inlet::index');
$routes->post('/add_data_inlet', 'Analisa_inlet::insert_inlet'); 
$routes->post('/edit_data_inlet', 'Analisa_inlet::update_inlet'); 
$routes->post('/get_datatable_data_inlet', 'Analisa_inlet::get_datatable_data_inlet');
$routes->get('/export_data_inlet/(:any)', 'Analisa_inlet::export_data_inlet');

// DATA OUTLET
$routes->get('/analisa-outlet', 'Analisa_outlet::index');
$routes->post('/add_data_outlet', 'Analisa_outlet::insert_outlet'); 
$routes->post('/edit_data_outlet', 'Analisa_outlet::update_outlet'); 
$routes->post('/get_datatable_data_outlet', 'Analisa_outlet::get_datatable_data_outlet');
$routes->get('/export_data_outlet/(:any)', 'Analisa_outlet::export_data_outlet');

// DATA OUTFALL
$routes->get('/analisa-outfall', 'Analisa_outfall::index');
$routes->post('/add_data_outfall', 'Analisa_outfall::insert_outfall'); 
$routes->post('/edit_data_outfall', 'Analisa_outfall::update_outfall'); 
$routes->post('/get_datatable_data_outfall', 'Analisa_outfall::get_datatable_data_outfall');
$routes->get('/export_data_outfall/(:any)', 'Analisa_outfall::export_data_outfall');

// DATA UPSTREAM
$routes->get('/analisa-upstream', 'Analisa_upstream::index');
$routes->post('/add_data_upstream', 'Analisa_upstream::insert_upstream'); 
$routes->post('/edit_data_upstream', 'Analisa_upstream::update_upstream'); 
$routes->post('/get_datatable_data_upstream', 'Analisa_upstream::get_datatable_data_upstream');
$routes->get('/export_data_upstream/(:any)', 'Analisa_upstream::export_data_upstream');

// DATA DOWNSTREAM
$routes->get('/analisa-downstream', 'Analisa_downstream::index');
$routes->post('/add_data_downstream', 'Analisa_downstream::insert_downstream'); 
$routes->post('/edit_data_downstream', 'Analisa_downstream::update_downstream'); 
$routes->post('/get_datatable_data_downstream', 'Analisa_downstream::get_datatable_data_downstream');
$routes->get('/export_data_downstream/(:any)', 'Analisa_downstream::export_data_downstream');


// DATA USER
$routes->get('/data-user', 'Data_user::index');
$routes->post('/get_datatable_data_user', 'Data_user::get_datatable_data_user');
$routes->post('/get_detailcompany', 'Data_user::get_detailcompany');
$routes->post('/get_site_wwtp_user', 'Data_user::get_site_wwtp_user');

// TEMPLATE MOCKUP ROUTES
$routes->get('/pelaporan-peringatan', 'Earlywarning_laporanharian::index');
$routes->get('/bml-peringatan', 'Earlywarning_bml::index');
$routes->get('/data-industri', 'Data_industri::index');
$routes->get('/validasi-laporan', 'Validasi_datalaporan::index');
$routes->get('/pengajuan-pelaporan', 'Pengajuan_pelaporan::index');
// END TEMPLATE MOCK UP ROUTES

// ERROR
$routes->get('/pagenotfoud', 'Error::pagenotfoud');

// $routes->group('admin',[
//     'filter'    => 'role:development',
//     'namespace' => $routes->getDefaultNamespace().'Admin'
// ],function($routes){
//     $routes->get('/dashboard',function(){
//         return redirect()->to('/dashboard');
//     });
//     $routes->get('dashboard','Dashboard::index');
// });


// $routes->get('/data-harian', 'Data_harian::index');
// $routes->get('/analisa-inlet', 'Analisa_inlet::index');
// $routes->get('/analisa-outlet', 'Analisa_outlet::index');
// $routes->get('/analisa-outfall', 'Analisa_outfall::index');
// $routes->get('/analisa-upstream', 'Analisa_upstream::index');
// $routes->get('/analisa-downstream', 'Analisa_downstream::index');
// $routes->get('/pelaporan-peringatan', 'Earlywarning_laporanharian::index');
// $routes->get('/bml-peringatan', 'Earlywarning_bml::index');
// $routes->get('/data-user', 'Data_user::index');
// $routes->get('/data-industri', 'Data_industri::index');
// $routes->get('/validasi-pendaftaran', 'Validasi_pendaftaran::index');
// $routes->get('/validasi-laporan', 'Validasi_datalaporan::index');
// $routes->get('/pengajuan-pelaporan', 'Pengajuan_pelaporan::index');

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
