<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;


$route['forgot-password'] = 'auth/app/forgot_password';
$route['authentication/:any'] = 'auth/authentication';
$route['dashboard/:any'] = 'dashboard';
$route['settings/:any'] = 'settings';
$route['report/:any'] = 'report';
$route['transaction/:any'] = 'transaction';
$route['report/search_report/:any'] = 'report/search_report';
$route['report/report/:any'] = 'report/report';
$route['report/reportHistory/:any'] = 'report/reportHistory';
$route['login/:any'] = 'auth/login';
$route['credit-card-application/:any'] = 'CreditCardApplication/index';
$route['credit-card-application/insurance/:any'] = 'CreditCardApplication/insurance';
$route['insurance/:any'] = 'CreditCardApplication/index';
$route['customize_credit_card/:any'] = 'CustomizeCreditCard/index';
$route['offers/:any/:any'] = 'CustomizeCreditCard/nextStep';
$route[''] = '';
$route[''] = '';
$route[''] = '';
$route[''] = '';
