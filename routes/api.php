<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'V1\LoginAPIController@login');
        Route::post('register', 'V1\LoginAPIController@register');
        Route::post('logout', 'V1\LoginAPIController@logout', ['middleware' => ['auth.jwt']]);
        Route::get('refresh', 'V1\LoginAPIController@refresh', ['middleware' => ['auth.jwt']]);
        Route::get('user', 'V1\LoginAPIController@me', ['middleware' => ['auth.jwt']]);

    });
    Route::group(['middleware' => ['auth.jwt']], function () {
        Route::apiResource('categorias', 'V1\Categoria\CategoriaAPIController');
        Route::apiResource('productos', 'V1\Producto\ProductoAPIController');
        Route::apiResource('empleados', 'V1\Empleado\EmpleadoAPIController');
        Route::apiResource('tipo_documentos', 'V1\TipoDocumento\TipoDocumentoAPIController');
    });
});
