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
$app->group(['namespace' => '\App\Http\Controllers\V1','prefix'=>'auth'], function () use ($app) {
    $app->post('/login', 'AuthenticationController@login');
    $app->post('/refresh', 'AuthenticationController@refreshToken');
    $app->post('/logout', 'AuthenticationController@logout');
});

//RUTAS PROTEGIDAS SIN PREFIJO
$app->group(['namespace' => '\App\Http\Controllers\V1','middleware' => ['jwt.auth'] ], function () use ($app) {

    //GET DATA
    $app->get('/data','DataController@getData');

    $app->get('/items','DataController@getItems');

});

