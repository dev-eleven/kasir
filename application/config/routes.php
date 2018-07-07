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
|	$route['translate_uri_dashes'] = FAL4SE;
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

//Kasir
$route['kasir'] = 'kasircontroller/index';

//Dashboard
$route['dashboard'] = 'indexcontroller/index';

//Users
$route['users'] = 'usercontroller/index';
$route['users/add'] = 'usercontroller/add';
$route['users/update/(:any)'] = 'usercontroller/update/$1';
$route['users/view/(:any)'] = 'usercontroller/view/$1';

//Products
$route['products'] = 'productcontroller/index';
$route['products/add'] = 'productcontroller/add';
$route['products/update/(:any)'] = 'productcontroller/update/$1';
$route['products/view/(:any)'] = 'productcontroller/view/$1';

//Suppliers
$route['suppliers'] = 'suppliercontroller/index';
$route['suppliers/add'] = 'suppliercontroller/add';
$route['suppliers/update/(:any)'] = 'suppliercontroller/update/$1';
$route['suppliers/view/(:any)'] = 'suppliercontroller/view/$1';

//Menus
$route['menus'] = 'menucontroller/index';
$route['menus/add'] = 'menucontroller/add';
$route['menus/update/(:any)'] = 'menucontroller/update/$1';
$route['menus/view/(:any)'] = 'menucontroller/view/$1';

//inventories in
$route['product_in'] = 'inventoriecontroller/product_in';
$route['product_in/add'] = 'inventoriecontroller/product_in_add';
$route['product_in/update/(:any)'] = 'inventoriecontroller/product_in_update/$1';

//inventories out
$route['product_out'] = 'inventoriecontroller/product_out';
$route['product_out/add'] = 'inventoriecontroller/product_out_add';
$route['product_out/update/(:any)'] = 'inventoriecontroller/product_out_update/$1';


//Default
$route['default_controller'] = 'sessioncontroller/login';
$route['logout'] = 'sessioncontroller/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
