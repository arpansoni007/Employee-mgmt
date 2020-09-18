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

Route::middleware('auth')->group(function(){
     Route::get('/home','HomeController@index');
     
     /* ------------------------------ Search Employee ------------------------------ */
     Route::get('/search-page','EmployeeController@search')->name('search-employee');
     Route::get('/search-filter/{query}/{type?}','EmployeeController@searchFilter')->name('search-filter');
     
     /* ----------------------------- User Routes ---------------------------- */
     
     /* ------------------------------ User List ------------------------------ */
     Route::get('/list-users','UserController@index')->name('list-users')->middleware('check.admin');

     /* ------------------------------ User Details ------------------------------ */
     Route::get('/user-details/{id}','UserController@getDetails')->name('user-details')->middleware('check.admin');

     /* ----------------------------- Employee Routes ---------------------------- */

     /* ------------------------------ Employee List ------------------------------ */
     Route::get('/list-employees','EmployeeController@index')->name('list-employees')->middleware('check.admin');
     
     /* ------------------------------ Employee Details ------------------------------ */
     Route::get('/employee-details/{id}','EmployeeController@getDetails')->name('employee-details')->middleware('check.admin');
     

     /* ------------------------------ Block User ------------------------------ */
     Route::get('/block/{type}/{id}','AdminController@block')->name('block')->middleware('check.admin');
});