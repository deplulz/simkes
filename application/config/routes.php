<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'login';
$route['404_override'] = 'error/error_handling';
$route['translate_uri_dashes'] = FALSE;

$route['verification'] = 'login/auth';
$route['logout'] = 'login/logout';
$route['dashboard'] = 'home';

// | -------------------------------------------------------------------------
// | PATIENT SECTION
// | -------------------------------------------------------------------------
$route['patient'] = 'patients/patients';
$route['patient/add'] = 'patients/patients/add';
$route['patient/post'] = 'patients/patients/save';
$route['patient/remove/(:any)'] = 'patients/patients/delete/$1';
$route['patient/put/(:any)'] = 'patients/patients/edit/$1';

// | -------------------------------------------------------------------------
// | MEDICINE SECTION
// | -------------------------------------------------------------------------
$route['medicine'] = 'medicines/medicines';
$route['medicine/add'] = 'medicines/medicines/add';
$route['medicine/post'] = 'medicines/medicines/save';
$route['medicine/remove/(:any)'] = 'medicines/medicines/delete/$1';
$route['medicine/put/(:any)'] = 'medicines/medicines/edit/$1';

// | -------------------------------------------------------------------------
// | USER SECTION
// | -------------------------------------------------------------------------
$route['user'] = 'users/users';
$route['user/add'] = 'users/users/add';
$route['user/post'] = 'users/users/save';
$route['user/remove/(:any)'] = 'users/users/delete/$1';
$route['user/put/(:any)'] = 'users/users/edit/$1';

// | -------------------------------------------------------------------------
// | RESERVATION SECTION
// | -------------------------------------------------------------------------
$route['reservation'] = 'reservations/reservations';
$route['reservation/add'] = 'reservations/reservations/add';
$route['reservation/post'] = 'reservations/reservations/save';
$route['reservation/remove/(:any)'] = 'reservations/reservations/delete/$1';
$route['reservation/put/(:any)'] = 'reservations/reservations/edit/$1';


// | -------------------------------------------------------------------------
// | EXAMINATION SECTION
// | -------------------------------------------------------------------------
$route['examination'] = 'examinations/examinations';
$route['examination/add'] = 'examinations/examinations/add';
$route['examination/post'] = 'examinations/examinations/save';
$route['examination/remove/(:any)'] = 'examinations/examinations/delete/$1';
$route['examination/put/(:any)'] = 'examinations/examinations/edit/$1';

// | -------------------------------------------------------------------------
// | RECIPE SECTION
// | -------------------------------------------------------------------------
$route['recipe'] = 'recipes/recipes';
$route['recipe/post'] = 'recipes/recipes/save';
$route['recipe/put/(:any)'] = 'recipes/recipes/edit/$1';

# Disable Controller access without routing
$route['(.*)'] = "error/error_handling";
// | -------------------------------------------------------------------------