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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jadwal-sholat', 'JadwalSholatController@index')->name('jadwal-sholat');
// Route::get('/ijtima', 'JadwalSholatController@ijtima')->name('ijtima');
Route::get('/hilal', 'JadwalSholatController@hilal')->name('hilal');
Route::resource('ijtima', 'IjtimaController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('role', 'RoleController')->middleware('auth');
