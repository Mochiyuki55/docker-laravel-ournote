<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\NotesController@index');

// Route::get('/notes', 'App\Http\Controllers\NotesController@index');

Route::get('/notes/mynote', 'App\Http\Controllers\NotesController@mynote')->middleware('auth');
Route::post('/notes/mynote', 'App\Http\Controllers\NotesController@search');

Route::get('/notes/mynote/add', 'App\Http\Controllers\NotesController@add')->middleware('auth');
Route::post('/notes/mynote/add', 'App\Http\Controllers\NotesController@create');

Route::get('/notes/mynote/edit', 'App\Http\Controllers\NotesController@edit')->middleware('auth');
Route::post('/notes/mynote/edit', 'App\Http\Controllers\NotesController@update');

Route::get('/notes/mynote/delete', 'App\Http\Controllers\NotesController@delete')->middleware('auth');
Route::post('/notes/mynote/delete', 'App\Http\Controllers\NotesController@remove');

Route::get('/signout', 'App\Http\Controllers\NotesController@signout')->middleware('auth');
Route::post('/signout', 'App\Http\Controllers\NotesController@deleteUser');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// メール送信
Route::get('/mail', 'App\Http\Controllers\MailSendController@index');
