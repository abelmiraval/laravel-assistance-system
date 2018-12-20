<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','MainController@home');//cuando se ingresa la ruta vacia
Auth::routes();

Route::resource('charges','ChargesController');
Route::resource('schedules','SchedulesController');
Route::resource('employees','EmployeesController');

Route::get('attendances/list/{id}','AttendancesController@editList');
Route::get('attendances/list_attendances','AttendancesController@listAttendances');
Route::resource('attendances/arrival_record', 'AttendancesController');

Route::resource('attendances-service','AttendancesServiceController',['only'=>['index','show']]);
Route::resource('attendances-service-soap','AttendancesServiceSoapController',['only'=>['index','show']]);


// ¿Has agregado método Showa tu Controller? Route::Resourcetiene 7 rutas básicas:
// Verb    Path                        Action       Route Name
// GET     /support                    index        support.index
// GET     /support/create             create       support.create
// POST    /support                    store        support.store
// GET     /support/{support}          show         support.show
// GET     /support/{support}/edit     edit         support.edit
// PUT     /support/{support}          update       support.update
// DELETE  /support/{support}          destroy      support.destroy


/*
	GET /charges => index
	POST /charges =>store guardar el producto
	GET /charges/create => Formulario para crear

	GET /charges/:id => Mostrar un producto con id
	GET /charges/:id/edit => Formulario de edicion
	PUT/PATCH /charges/:id => Actualiza el producto
	DELETE /charges/:id => Elimina el producto
*/


Route::get('/home', 'HomeController@index')->name('home');//Cuando nos logeamos y estamos en el menu principal