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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users'] = 'auth/users';
$route['groups'] = 'auth/groups';
$route['users/create_user'] = 'auth/create_user';
$route['(:any)/create_user'] = 'auth/create_user';
//group
$route['groups/create_group'] = 'auth/create_group';
$route['(:any)/create_group'] = 'auth/create_group';
$route['groups/edit_group'] = 'auth/edit_group';
$route['(:any)/edit_group'] = 'auth/edit_group';
//service center
$route['(:any)/create_servicecenter'] = 'servicecenters/create_servicecenter';
$route['(:any)/edit_servicecenter'] = 'servicecenters/edit_servicecenter';


$route['users/profile/(:num)'] = 'auth/profile/$1';
$route['profile/(:num)'] = 'auth/profile/$1';
$route['login'] = 'auth/login';
$route['login/(:any)'] = 'auth/login/$1';
$route['(:any)/login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['logout/(:any)'] = 'auth/logout/$1';
$route['register'] = 'auth/register';
$route['forgot_password'] = 'auth/forgot_password';


