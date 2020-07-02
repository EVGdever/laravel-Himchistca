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

/*
 * Стартовая страница
 */
Route::get('/', 'ServiceController@serviceGetAll')->name('home');

/*
 * Подключение роутов авториазации
 */
Auth::routes([
    'reset' => 'false',
    'confirm' => 'false',
    'verify' => 'false'
]);

/*
 * Роуты для услуг. Добавление, получение пользователение, удаление
 */
Route::get('/service/add', 'ServiceController@servicePage')->middleware('auth')->name('service-add');
Route::post('/service/add', 'ServiceController@serviceAdd')->middleware('auth')->name('service-add');
Route::get('/service/{id}/delete}', 'ServiceController@serviceDelete')->middleware('auth')->name('service-delete');
Route::get('/service/{id}/update}', 'ServiceController@serviceUpdate')->middleware('auth')->name('service-update');
Route::post('/service/{id}/update}', 'ServiceController@serviceUpdateSubmit')->middleware('auth')->name('service-update');

/*
 * Роуты для получения услуг и создание квитанции.
 */
Route::get('/ticket/', 'TicketController@ticketPage')->middleware('auth')->name('ticket-page');
Route::get('/ticket/{id}/close', 'TicketController@ticketClose')->middleware('auth')->name('ticket-close');
Route::get('/ticket/record/{id}', 'TicketController@ticketRecord')->middleware('auth')->name('ticket-create');
