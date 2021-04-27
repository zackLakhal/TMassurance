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

Route::get('/', function () {
     return redirect('/home');
});

Auth::routes();

Route::prefix('/role')->group(function () {
     Route::get('/', function () {
          return view('system.role');
      })->middleware('auth');
     Route::get('/index', 'RoleController@index');
     Route::post('/{edit}/{id}', 'RoleController@edit');
     Route::post('/store', 'RoleController@store');
     
 });

 Route::prefix('/group')->group(function () {
     Route::get('/', function () {
          return view('system.group');
      })->middleware('auth');
     Route::get('/index', 'GroupController@index');
     Route::post('/{edit}/{id}', 'GroupController@edit');
     Route::post('/store', 'GroupController@store');
     
 });

 Route::prefix('/statut')->group(function () {
    Route::get('/', function () {
         return view('system.statut');
     })->middleware('auth');
    Route::get('/index', 'StatutController@index');
    Route::post('/{edit}/{id}', 'StatutController@edit');
    Route::post('/store', 'StatutController@store');
    
});

Route::prefix('/compagnie')->group(function () {
    Route::get('/', function () {
         return view('tools.compagnie');
     })->middleware('auth');
    Route::get('/index', 'CompagnieController@index');
    Route::post('/{edit}/{id}', 'CompagnieController@edit');

    Route::prefix('{id_c}/products')->group(function () {
        Route::get('/', function () {
             return view('tools.product');
         })->middleware('auth');
         Route::post('/index', 'CompagnieController@index_product');
        
    });
    
});

Route::get('/home', 'HomeController@index')->name('home');


