<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

$route['default_controller'] = 'Auth/login';

// AUTH
$route[md5('validate_username')] = 'Auth/validate';
$route[md5('prelogin')] = 'Auth/do_login';
$route['logout'] = 'Auth/logout';

// Dashboard admin
$route[md5('admin')] = 'Admin';
$route['master_divisi'] = 'Admin/index_divisi';
$route['master_kajian'] = 'Admin/index_kajian';
$route['master_department'] = 'Admin/index_department';

// CRUD PIC
$route['master_pic'] = 'Admin/index_pic';
$route['add/pic'] = 'Admin/add_pic';
$route['proses_add_pic'] = 'Admin/proses_add_pic';
$route['delete_pic'] = 'Admin/delete_pic';

// CRUD DIVIS
$route['add/divisi'] = 'Admin/add_divisi';
$route['prosess'] = 'Admin/proses'; #proses add divisi dan add departement

// CRUD DEPARTMENT
$route['add/department'] = 'Admin/add_department';

// Dashboard Users
$route[md5('users')] = 'Users/dashboard';
$route['request_arsip_table'] = 'Users/call_serverside_arsip';
$route['add/arsip'] = 'Users/add_arsip';
$route[md5('proses_simpan')] = 'Users/proses_simpan';
$route['delete/arsip/(:any)'] = 'Users/delete_arsip/$1';
$route['detail/(:any)'] = 'Users/detail_arsip/$1';
$route[md5('proses_update')] = 'Users/proses_update';

// END ROUTE USERS

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
