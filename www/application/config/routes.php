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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['account'] = 'account/lunit/index';
$route['account/login'] = 'account/lunit/login/';
$route['account/logout'] = 'account/lunit/logout/';
$route['go/(:any)'] = 'click/go/$1';
$route['pages/(:num)'] = 'pages/index/$1';
$route['admin/(:any)/(:num)'] = 'admin/$1/index/$2';
$route['account/(:any)/(:num)'] = 'account/$1/index/$2';
$route['users/(:any)/pages'] = 'pages/index/0/user_id/$1';
$route['users/(:any)/pages/(:any)'] = 'pages/index/$2/user_id/$1';
$route['categories/(:any)/pages'] = 'pages/index/0/category_id/$1';
$route['categories/(:any)/pages/(:any)'] = 'pages/index/$2/category_id/$1';
$route['search/pages'] = 'pages/index/0/search';
$route['search/pages/(:any)'] = 'pages/index/$1/search';


//$route['pages/search(:any)'] = 'pages/search/$2';
//$route['page_(:num).html'] = '/goods/show/$1';
