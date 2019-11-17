<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



//RUTAS CON PREFIJO AUTH
$router->group(['namespace' => '\App\Http\Controllers\V1','prefix'=>'auth'], function () use ($router) {
    $router->post('/login', 'AuthenticationController@login');
    $router->post('/refresh', 'AuthenticationController@refreshToken');
    $router->post('/logout', 'AuthenticationController@logout');
});

//RUTAS PROTEGIDAS SIN PREFIJO
$router->group(['namespace' => '\App\Http\Controllers\V1','middleware' => ['jwt.auth'] ], function () use ($router) {

    //GET DATA
    $router->get('/data','DataController@getData');

    $router->get('/items','DataController@getItems');

});

