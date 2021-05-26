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
     Route::get('/active_index', 'RoleController@active_index');
     Route::post('/{edit}/{id}', 'RoleController@edit');
     Route::post('/store', 'RoleController@store');
     
 });

 Route::prefix('/group')->group(function () {
     Route::get('/', function () {
          return view('system.group');
      })->middleware('auth');
     Route::get('/index', 'GroupController@index');
     Route::get('/active_index', 'GroupController@active_index');
     Route::post('/{edit}/{id}', 'GroupController@edit');
     Route::post('/store', 'GroupController@store');
     
 });

 Route::prefix('/user')->group(function () {
    Route::get('/', function () {
        return view('system.user');
    })->middleware('auth');
    Route::get('/index', 'UserController@index');
    Route::post('/delete/{id}', 'UserController@edit');
    Route::post('/restore/{id}', 'UserController@edit');
    Route::post('/edit/{id}', 'UserController@edit');
    Route::post('/detail/{id}', 'UserController@detail');
    Route::post('/store', 'UserController@store');
});

Route::prefix('/prospect')->group(function () {
    Route::get('/', function () {
        return view('business.prospect');
    })->middleware('auth');
    Route::get('/index', 'ProspectController@index');
    Route::post('/delete/{id}', 'ProspectController@edit');
    Route::post('/restore/{id}', 'ProspectController@edit');
    Route::post('/edit/{id}', 'ProspectController@edit');
    Route::post('/detail/{id}', 'ProspectController@detail');
    Route::get('/projet/{id}', function () {
        return view('business.projet_detail');
    })->middleware('auth');
    Route::post('/confirmer/{id}', 'ProspectController@confirmer');
    Route::post('/store', 'ProspectController@store');
});

Route::prefix('/projet')->group(function () {
    Route::get('/', function () {
        return view('business.projet');
    })->middleware('auth');
    Route::get('/index', 'ProjetController@index');
    Route::post('/delete/{id}', 'ProjetController@edit');
    Route::post('/restore/{id}', 'ProjetController@edit');
    Route::post('/edit/{id}', 'ProjetController@edit');
    Route::post('/detail', 'ProjetController@detail');
    
});
Route::prefix('/assure')->group(function () {
    Route::post('/store', 'ProjetController@store_assure');
    Route::post('/delete/{id}', 'ProjetController@edit_assure');
    Route::post('/restore/{id}', 'ProjetController@edit_assure');
    Route::post('/edit/{id}', 'ProjetController@edit_assure');
    
});


 Route::prefix('/statut')->group(function () {
    Route::get('/', function () {
         return view('system.statut');
     })->middleware('auth');
    Route::get('/index', 'StatutController@index');
    Route::post('/{edit}/{id}', 'StatutController@edit');
    Route::post('/store', 'StatutController@store');
    
});

Route::prefix('/tach')->group(function () {
    Route::post('/index', 'TachController@index');
    Route::post('/{edit}/{id}', 'TachController@edit');
    Route::post('/store', 'TachController@store');
    
});

Route::prefix('/document')->group(function () {
    Route::post('/index', 'DocumentController@index');
    Route::post('/store', 'DocumentController@store');
    
});

Route::prefix('/historique')->group(function () {
    Route::post('/index', 'ProjetController@histo_idex');
    
});

Route::prefix('/note')->group(function () {
    Route::post('/index', 'NoteController@index');
    Route::post('/{edit}/{id}', 'NoteController@edit');
    Route::post('/store', 'NoteController@store');
});

Route::prefix('/rappel')->group(function () {
    Route::post('/index', 'RappelController@index');
    Route::post('/{edit}/{id}', 'RappelController@edit');
    Route::post('/store', 'RappelController@store');
    
});

Route::prefix('/provenance')->group(function () {
    Route::get('/', function () {
         return view('tools.provenance');
     })->middleware('auth');
    Route::get('/index', 'ProvenanceController@index');
    Route::post('/delete/{id}', 'ProvenanceController@edit');
    Route::post('/restore/{id}', 'ProvenanceController@edit');

    
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


