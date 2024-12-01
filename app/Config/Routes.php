
<?php
use App\Controllers\Admin\ChambreController;
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/register', 'AuthController::register');
$routes->post('/store', 'AuthController::store');
$routes->get('/client', 'AjouterClient::index');
$routes->post('/client/store', 'AjouterClient::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/connexion', 'AuthController::verify_login');
$routes->get('/logout', 'AuthController::logout');
$routes->post('chambres/reserver/(:num)', 'Client\ChambreController::reserver/$1');
$routes->get('/client/profile', 'Client\ClientController::profile');
$routes->post('updateProfile', 'Client\ClientController::updateProfile');
$routes->get('deleteAccount', 'Client\ClientController::deleteAccount');
$routes->post('payment/createCheckoutSession','Client\PaymentController::createCheckoutSession');
$routes->get('payment/success', 'Client\PaymentController::success');
$routes->get('payment/cancel', 'Client\PaymentController::cancel');
$routes->get('/', 'Client\ChambreController::index');
$routes->get('client/MesReservation','Client\ClientController::mesReservations');
$routes->set404Override(
    function () use ($routes) {
        return view('Client/errors/error_404');
    }
);

$routes->group('admin', function($routes) {
    //Main Routes
    $routes->get('/','Admin\AdminController::dashboard');
    $routes->get('dashboard', 'Admin\AdminController::dashboard');

    //Profil
    $routes->get('profile','Admin\AdminController::profile');



    // Routes pour les réservations
    $routes->get('reservations', 'Admin\ReservationController::index');
    $routes->get('reservations/create', 'Admin\ReservationController::create');
    $routes->post('reservations/store', 'Admin\ReservationController::store');
    $routes->get('reservations/delete/(:num)', 'Admin\ReservationController::delete/$1');
    $routes->get('reservations/edit/(:num)', 'Admin\ReservationController::edit/$1');
    $routes->post('reservations/update/(:num)', 'Admin\ReservationController::update/$1');

     // Routes pour les paiements
    $routes->get('paiements', 'Admin\PaiementController::index');
    $routes->get('paiements/add', 'Admin\PaiementController::add');
    $routes->post('paiements/add', 'Admin\PaiementController::add');
    $routes->get('paiements/generateFinancialReport', 'Admin\PaiementController::generateFinancialReport');


    // Routes pour les clients
    $routes->get('clients', 'Admin\ClientController::index');
    $routes->get('clients/create', 'Admin\ClientController::create');
    $routes->post('clients/store', 'Admin\ClientController::store');
    $routes->get('clients/delete/(:num)', 'Admin\ClientController::delete/$1');
    $routes->get('clients/edit/(:num)', 'Admin\ClientController::edit/$1');
    $routes->post('clients/update/(:num)', 'Admin\ClientController::update/$1');
    $routes->get('clients/show/(:num)', 'Admin\ClientController::show/$1');












    // Routes pour les chambres
    $routes->get('chambres', 'Admin\ChambreController::index');
    $routes->get('chambres/index', 'Admin\ChambreController::index');
    $routes->get('chambres/create', 'Admin\ChambreController::create');
    $routes->post('chambres/store', 'Admin\ChambreController::store');
    $routes->get('chambres/edit/(:num)', 'Admin\ChambreController::edit/$1');
    $routes->post('chambres/update/(:num)', 'Admin\ChambreController::update/$1');
    $routes->get('chambres/delete/(:num)', 'Admin\ChambreController::delete/$1');

    // Routes pour les rapports
    $routes->get('rapport', 'Admin\RapportController::index');
});
