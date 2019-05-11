<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#DEFAULT STRUCTURE
$route['default_controller'] = 'account/dashboard';
$route['404_override'] = 'account/error404';
$route['translate_uri_dashes'] = FALSE;

#ACCOUNT AREA
$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['dashboard'] = 'account/dashboard';
$route['profile'] = 'account/profile';
$route['document'] = 'account/document';
$route['download/(:any)'] = 'account/download/$1';
$route['detail/(:any)'] = 'account/detail/$1';

#ADMIN AREA
$route['webConf'] = 'admin/webConf';
$route['account'] = 'admin/account';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';
$route['detailAdmin/(:any)'] = 'admin/detailAdmin/$1';

#TEMPLATE
