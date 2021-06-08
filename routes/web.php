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

use App\Fournisseur;

Route::get('/', function () {
     return redirect('/home');
});
Route::get('/comparateur', function () {
    return view('comparateur');
});

Auth::routes();

Route::prefix('/role')->group(function () {
     Route::get('/', function () {
          return view('system.role');
      })->middleware('auth');
     Route::get('/index', 'RoleController@index');
     Route::get('/active_index', 'RoleController@active_index');
     Route::post('/{edit}/{id}', 'RoleController@edit');

 });

 Route::prefix('/group')->group(function () {
     Route::get('/', function () {
          return view('system.group');
      })->middleware('auth');

     Route::get('/index', 'GroupController@index');
     Route::get('/active_index', 'GroupController@active_index');
     Route::post('/{edit}/{id}', 'GroupController@edit');
     Route::post('/store', 'GroupController@store');

     Route::prefix('{id_g}/detailGR')->group(function () {
        Route::get('/', function () {
            if (auth()->user()->role_id == 4) {
                return view('system.myGroup');
            } else {
                return view('system.detailGroup');
            }
            
             return view('system.detailGroup');
         })->middleware('auth');
         Route::post('/index', 'GroupController@index_users');
         Route::post('/list_sup', 'GroupController@list_sup');
         Route::post('/list_user', 'GroupController@list_user');
         Route::post('/attach_sup', 'GroupController@attach_sup');
         Route::post('/attach_user', 'GroupController@attach_user');
         Route::post('/detach_user', 'GroupController@detach_user');
         Route::post('/attach_user', 'GroupController@attach_user');

         Route::post('/delete/{id_p}', 'GroupController@edit_users');
         Route::post('/restore/{id_p}', 'GroupController@edit_users');
         
        
    });
     
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
    Route::post('/list_commercial', 'ProspectController@list_commercial');
    Route::post('/affecter/{id}', 'ProspectController@edit');
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

Route::prefix('/contrat')->group(function () {
    Route::post('/detail', 'ContratController@index');
    Route::post('/edit/{id}', 'ContratController@edit');
    
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
    Route::post('/{edit}/{id}', 'DocumentController@edit');
    
});

Route::prefix('/historique')->group(function () {
    Route::post('/index', 'ProjetController@histo_index');
    
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

Route::prefix('/fournisseur')->group(function () {
    Route::get('/', function () {
         return view('tools.fournisseur');
     })->middleware('auth');
    Route::get('/index', 'ProvenanceController@index');
    Route::post('/store', 'ProvenanceController@store');
    Route::post('/delete/{id}', 'ProvenanceController@edit');
    Route::post('/restore/{id}', 'ProvenanceController@edit');
    Route::post('/edit/{id}', 'ProvenanceController@edit');

    Route::prefix('{id_f}/provenance')->group(function () {
        Route::get('/', function ($id_f) {
             return view('tools.provenance',['fournisseur' => Fournisseur::withTrashed()->where('id',$id_f)->first()]);
         })->middleware('auth');
        Route::get('/index', 'ProvenanceController@prov_index');
        Route::post('/store', 'ProvenanceController@prov_store');
        Route::post('/delete/{id}', 'ProvenanceController@prov_edit');
        Route::post('/restore/{id}', 'ProvenanceController@prov_edit');
        Route::post('/edit/{id}', 'ProvenanceController@prov_edit');
    
    
        
    });
    
});


Route::prefix('/compagnie')->group(function () {
    Route::get('/', function () {
         return view('tools.compagnie');
     })->middleware('auth');
    Route::get('/index', 'CompagnieController@index');
    Route::post('/store', 'CompagnieController@store');
    Route::post('/detail/{id}', 'CompagnieController@detail_compagnie')->name('compagnie.detail');

    Route::post('/filtred_index', 'CompagnieController@filtred_index');
    Route::post('/delete/{id}', 'CompagnieController@edit');
    Route::post('/restore/{id}', 'CompagnieController@edit');
    Route::post('/edit/{id}', 'CompagnieController@edit');

    Route::prefix('{id_c}/products')->group(function () {
        Route::get('/', function () {
             return view('tools.product');
         })->middleware('auth');
         Route::post('/index', 'CompagnieController@index_product');
         Route::post('/delete/{id_p}', 'CompagnieController@edit_product');
         Route::post('/restore/{id_p}', 'CompagnieController@edit_product');
         
        
    });
    
});

Route::get('/home', 'HomeController@index')->name('home');


