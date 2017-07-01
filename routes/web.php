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

$app->get('/', function () use ($app) {
    /**return $app->version();**/
    return view('index', ['Cliente.Nombre' => 'CotizacionController@index']);

});

$app->post('Api/sendEmail', 'sendMessage@newMessage');

$app->get('Api/Cotizaciones', 'CotizacionController@index');

$app->get('Api/Cotizaciones/{id}', 'CotizacionController@getcotizacion');

$app->get('Api/Detalles_cotizacion/{id}', 'DetallesController@getdetalles');