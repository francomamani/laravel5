<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['cors']], function() {
	Route::resource('personals', 'PersonalController');
	Route::resource('compra_materials', 'CompraMaterialController');
	Route::resource('personals.compra_materials', 'PersonalCompraMaterialController');

	Route::get('compra_materiales_personal/{personal_id}', 
				'PersonalCompraMaterialController@paginacion');
//});

/*Route::get('personal_por_carnet/{carnet}', 'PersonalController@personalPorCarnet')
	 ->where('carnet', '\d{6,8}(-\d[A-Z][ ]?)?(OR|LP|CB|PT|SC|CH|PD|BN|TJ)?');
Route::get('personal_por_nombres/{nombres}', 'PersonalController@personalPorNombres')
	 ->where('nombres', '[A-Z][a-z]{3}');
Route::get('personal_por_apellidos/{apellidos}', 'PersonalController@personalPorApellidos');
Route::get('personal_por_ids', 'PersonalController@personalPorIds');
Route::get('personal_por_nombres_por_cargo/{nombres}/{cargo?}', 'PersonalController@personalPorNombresPorCargo');*/

/*Route::get('sumar/{a}/{b}', function($a, $b){
	return $a + $b;
});*/

/*Route::get('personals_mostrar_todos', 'PersonalController@mostrarTodos');
Route::get('personals_mostrar_eliminados', 'PersonalController@mostrarEliminados');
Route::get('personals_restaurar/{id}', 'PersonalController@restaurar');
Route::get('personals_compra_materiales/{personal_id}', 'PersonalController@compraMateriales');
*/
