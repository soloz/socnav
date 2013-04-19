<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";

$route['login'] = "/users/login";
$route['testmap'] = "/main/testmap";
$route['logout'] = "/users/logout";
$route['signup'] = "/users/signup";
$route['validatelogin'] = "/users/validateLogin";
$route['registeruser'] = "/users/registerUser";
$route['pictureupload'] = "/users/pictureupload";
$route['admin'] = "/main/admin";


$route['nearbyusers'] = "/socnav/nearbyusers"; //<-- added by Nick
$route['updateuserlocation'] = "/socnav/updateuserlocation"; //<-- added by Nick
$route['storeplaces'] = "/socnav/storeplaces"; //<-- added by Lekan
$route['postcomment'] = "/socnav/postcomment"; //<-- added by Lekan
$route['rateplace'] = "/socnav/rateplace"; //<-- added by Lekan
$route['loadcomments'] = "/socnav/loadcomments"; //<-- added by Lekan
$route['loadrating'] = "/socnav/loadrating"; //<-- added by Lekan
$route['placepictureupload'] = "/socnav/placepictureupload"; //<-- added by Lekan

//Todo: April 06, 2013
$route['profile'] = "/users/displayProfile";
$route['updateprofile'] = "/users/updateProfile";

//Todo: April 07, 2013
$route['search'] = "/socnav/search";
$route['searchresults'] = "/socnav/searchresults";
$route['maps'] = "/maps";

$route['locationprofile'] = "/socnav/locationprofile";


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
