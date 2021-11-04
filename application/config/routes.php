<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

//$route['summary/(:num)'] = 'payment/index/$1';

/*
    $route['service-details/(:num)'] = 'service/detail/$1';
$route['personal-info'] = 'personaldata';
*/

$route['404_override'] = 'Error';
$route['translate_uri_dashes'] = FALSE;
