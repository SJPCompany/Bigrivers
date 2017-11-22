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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['errors/index'] = 'Errors/index';
$route['translate_uri_dashes'] = FALSE;
/* Routes */
$route['user/doLogin'] = 'home/doLogin';

/* User routes */
$route['backend/user/logout'] = 'user/logout';
$route['backend/user/index'] = 'user/index';
$route['backend/user/checkUrl'] = 'user/checkUrl';
$route['backend/user/profile'] = 'user/profile';
$route['backend/user/viewUsers'] = 'user/viewUsers';
$route['backend/user/createUser'] = 'user/createUser';
$route['backend/user/checkUserData'] = 'user/checkUserData';
$route['backend/user/editUser/(:any)'] = 'user/editUser/$1';
$route['backend/user/checkEditUserData'] = 'user/checkEditUserData';
$route['backend/user/do_upload'] = 'user/do_upload';
$route['backend/user/delete/(:any)'] = 'user/delete/$1';
$route['backend/user/deleteUser'] = 'user/deleteUser';
/* Error route */
$route['backend/error'] = 'Backend/error';
/* Image route */
$route['backend/image/checkImage/([^/]*)/([^/]*)/(.*)'] = 'Image/checkImage/image.png/$2/$3';
$route['backend/image/checkImage/(.+)/([^/]*)/([^/]*)/([^/]*)/(.*)'] = 'Image/checkImage/Subfolder/image.png/$2/$3';
$route['backend/image'] = 'Image/index';
$route['backend/uploadimage'] = 'Image/uploadimage';
/* News route */
$route['(:any)'] = 'page/view/$1';
$route['newsview/(:any)'] = 'news/view/$1';
$route['page/news'] = 'news/newslist';
$route['backend/newscreate'] = 'news/newscreate';
$route['backend/newsbeheer'] = 'news/newsbeheer';
/* Widgets route */
$route['backend/widget/index'] = 'widget/index';
$route['backend/widget/createWidget'] = 'widget/createWidget';
$route['backend/widget/deleteWidget'] = 'widget/deleteWidget';
$route['backend/widget/deleteWidgetselect'] = 'widget/deleteWidgetselect';
$route['backend/widget/deleteWidget/(:any)'] = 'widget/deleteWidget/$1';
$route['backend/widget/editWidgetselect'] = 'widget/editWidgetselect';
$route['backend/widget/editWidget/(:any)'] = 'widget/editWidget/$1';
/* Artist route */
$route['backend/artist/createartist'] = 'artist/createartist';
$route['backend/artist/beheerartist'] = 'artist/beheerartist';
$route['backend/artist/editartist'] = 'artist/artisteditdata';
/*podia routes*/
$route['backend/podia/createpodia'] = 'podia/podiacreatepage';
$route['backend/podia/beheerpodia'] = 'podia/podiabeheerpage';
$route['backend/podia/editpodia'] = 'podia/podiaeditpage';








