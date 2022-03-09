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
// auth
$route['login']["post"] = 'auth/login';

// admin
$route['admin']["get"] = 'admin_dashboard/index';

// admin sobre mi
$route['admin/sobre_mi/habilidad']["get"] = 'admin_sobre_mi/habilidad';
$route['admin/sobre_mi/informacion_personal']["get"] = 'admin_sobre_mi/informacion_personal';
$route['admin/sobre_mi/redes_sociales']["get"] = 'admin_sobre_mi/redes_sociales';
$route['admin/sobre_mi/resumen']["get"] = 'admin_sobre_mi/resumen';

$route['admin/sobre_mi/habilidad_create']["post"] = 'admin_sobre_mi/habilidad_create';
$route['admin/sobre_mi/habilidad_delete']["post"] = 'admin_sobre_mi/habilidad_delete';
$route['admin/sobre_mi/informacion_personal_create']["post"] = 'admin_sobre_mi/informacion_personal_create';
$route['admin/sobre_mi/red_social_create']["post"] = 'admin_sobre_mi/red_social_create';
$route['admin/sobre_mi/red_social_delete']["post"] = 'admin_sobre_mi/red_social_delete';
$route['admin/sobre_mi/resumen_create']["post"] = 'admin_sobre_mi/resumen_create';
$route['admin/sobre_mi/resumen_delete']["post"] = 'admin_sobre_mi/resumen_delete';
$route['admin/sobre_mi/resumen_activate']["post"] = 'admin_sobre_mi/resumen_activate';

// proyecto
$route['admin/proyecto']["get"] = 'admin_proyecto/index';
$route['admin/proyecto/crear']["get"] = 'admin_proyecto/crear';
$route['admin/proyecto/ver/(.+)']["get"] = 'admin_proyecto/view/$1';
$route['admin/proyecto/categoria/(.+)']["get"] = 'admin_proyecto/filter_x_categoria/$1';
$route['admin/proyecto/update/(.+)']["get"] = 'admin_proyecto/update/$1';

$route['admin/proyecto/create']["post"] = 'admin_proyecto/proyecto_create';
$route['admin/proyecto/delete']["post"] = 'admin_proyecto/delete';

// resumen laboral
$route['admin/resumen_laboral']["get"] = 'Admin_resumen_laboral/index';

// contacto
$route['admin/contacto']["get"] = 'Admin_contacto/index';

$route['admin/resumen_laboral/crear']["post"] = 'Admin_resumen_laboral/crear';
$route['admin/resumen_laboral/delete']["post"] = 'Admin_resumen_laboral/delete';

// Trabajos
$route['admin/trabajos']["get"] = 'Admin_trabajos/index';
$route['admin/trabajos/crear']["get"] = 'Admin_trabajos/create';
$route['admin/trabajos/detalle/(.+)']["get"] = 'Admin_trabajos/view_details/$1';
$route['admin/trabajos/form_update/(.+)']["get"] = 'Admin_trabajos/view_form_update/$1';
$route['admin/trabajos/reporte_trabajos_dia']["get"] = 'Admin_trabajos/reporte_trabajos_dia';
$route['admin/trabajos/pagina/(.+)']["get"] = 'Admin_trabajos/find_pagina/$1';
$route['admin/trabajos/consulta']["get"] = 'Admin_trabajos/consulta_trabajos';
$route['admin/trabajos/api']["get"] = 'Admin_trabajos/ajax_trabajos_all';
$route['admin/trabajos_sin_envio/api']["get"] = 'Admin_trabajos/ajax_trabajos_sin_enviar';

$route['admin/trabajos/delete/(.+)']["post"] = 'Admin_trabajos/delete/$1';
$route['admin/trabajos/pagina/create']["post"] = 'Admin_trabajos/save_pagina';
$route['admin/trabajos/enviado/update']["post"] = 'Admin_trabajos/aptualizar_enviado';
$route['admin/trabajos/enviado/sql_inject_trabajos']["post"] = 'Admin_trabajos/sql_inject_trabajos';


$route['admin/trabajos/save']["post"] = 'Admin_trabajos/save';


$route['default_controller'] = 'portafolio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
