<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/inicio'] = 'Front/index';

/* Route Users */
$route['admin/usuarios']['get'] = 'User/index';
$route['admin/usuarios/create']['get'] = 'User/create';
$route['admin/usuarios/store']['post'] = 'User/store';
$route['admin/usuarios/(:num)/edit']['get'] = 'User/edit/$1';
$route['admin/usuarios/(:num)/update']['post'] = 'User/update/$1';
$route['admin/usuarios/(:num)/delete']['get'] = 'User/delete/$1';

/* Route Clients */
$route['admin/clientes']['get'] = 'Client/index';
$route['admin/clientes/create']['get'] = 'Client/create';
$route['admin/clientes/store']['post'] = 'Client/store';
$route['admin/clientes/(:num)/edit']['get'] = 'Client/edit/$1';
$route['admin/clientes/(:num)/update']['post'] = 'Client/update/$1';
$route['admin/clientes/(:num)/delete']['get'] = 'Client/delete/$1';

/* Route Events */
$route['admin/eventos']['get'] = 'Event/index';
$route['admin/eventos/create']['get'] = 'Event/create';
$route['admin/eventos/store']['post'] = 'Event/store';
$route['admin/eventos/(:num)/edit']['get'] = 'Event/edit/$1';
$route['admin/eventos/(:num)/update']['post'] = 'Event/update/$1';
$route['admin/eventos/(:num)/delete']['get'] = 'Event/delete/$1';

/* Route Tickets */
$route['admin/entradas']['get'] = 'Ticket/index';
$route['admin/entradas/create']['get'] = 'Ticket/create';
$route['admin/entradas/store']['post'] = 'Ticket/store';
$route['admin/entradas/(:num)/edit']['get'] = 'Ticket/edit/$1';
$route['admin/entradas/(:num)/update']['post'] = 'Ticket/update/$1';
$route['admin/entradas/(:num)/delete']['get'] = 'Ticket/delete/$1';


/* Route Login */
$route['admin']['get'] = 'Login/index';
$route['admin/login']['get'] = 'Login/index';
$route['admin/login']['post'] = 'Login/login';
$route['admin/logout']['get'] = 'Login/logout';

$route['testbyid/(:num)']['get'] = 'Rest/testById_get/$1';