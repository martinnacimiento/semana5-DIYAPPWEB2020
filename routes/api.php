<?php
use App\Kernel\Router;
Router::get('/', "HomeController@index");

// PERSONAS //
Router::get('/personas', "PersonaController@index");
Router::get('/personas/nuevo', "PersonaController@create");
Router::post('/personas/store', "PersonaController@store");
Router::get('/personas/editar', "PersonaController@edit");
Router::update('/personas/update', "PersonaController@update");
Router::delete('/personas/delete', "PersonaController@destroy");

// EMPLEADOS //
Router::get('/empleados', "EmpleadoController@index");
Router::get('/empleados/nuevo', "EmpleadoController@create");
Router::post('/empleados/store', "EmpleadoController@store");
Router::get('/empleados/editar', "EmpleadoController@edit");
Router::update('/empleados/update', "EmpleadoController@update");
Router::delete('/empleados/delete', "EmpleadoController@destroy");

// CORREOS //
Router::get('/correos', "CorreoController@index");
Router::get('/correos/nuevo', "CorreoController@create");
Router::post('/correos/store', "CorreoController@store");
Router::get('/correos/editar', "CorreoController@edit");
Router::update('/correos/update', "CorreoController@update");
Router::delete('/correos/delete', "CorreoController@destroy");

// EMPRESAS //
Router::get('/empresas', "EmpresaController@index");
Router::get('/empresas/nuevo', "EmpresaController@create");
Router::post('/empresas/store', "EmpresaController@store");
Router::get('/empresas/editar', "EmpresaController@edit");
Router::update('/empresas/update', "EmpresaController@update");
Router::delete('/empresas/delete', "EmpresaController@destroy");

// PERMISOS //
Router::get('/permisos', "PermisoController@index");
Router::get('/permisos/nuevo', "PermisoController@create");
Router::post('/permisos/store', "PermisoController@store");
Router::get('/permisos/editar', "PermisoController@edit");
Router::update('/permisos/update', "PermisoController@update");
Router::delete('/permisos/delete', "PermisoController@destroy");

// USUARIOS //
Router::get('/usuarios', "UsuarioController@index");
Router::get('/usuarios/nuevo', "UsuarioController@create");
Router::post('/usuarios/store', "UsuarioController@store");
Router::get('/usuarios/editar', "UsuarioController@edit");
Router::update('/usuarios/update', "UsuarioController@update");
Router::delete('/usuarios/delete', "UsuarioController@destroy");