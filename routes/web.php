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





Auth::routes();



Route::group(['middleware'=>['web','auth']], function(){
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/page',function(){
        return view('page');
    });
    Route::get('/appartements',function(){
        return view('Appartement/List');
    });
    Route::get('/home', 'HomeController@index');
    
    Route::get('Zones',"ZoneController@index");
    Route::post('Zones',"ZoneController@store");
    Route::put('Zones/{id}',"ZoneController@update");
    Route::delete('Zones/{id}',"ZoneController@distroy");
    Route::get('zones/{id}','ZoneController@immeubles');

    Route::get('proprietaires',"ProprietaireController@index");
    Route::post('proprietaires',"ProprietaireController@store");
    Route::put('proprietaires/{id}',"ProprietaireController@update");
    Route::delete('proprietaires/{id}',"ProprietaireController@distroy");

    Route::get('locataires',"LocataireController@index");
    Route::post('locataires',"LocataireController@store");
    Route::put('locataires/{id}',"LocataireController@update");
    Route::delete('locataires/{id}',"LocataireController@distroy");

    Route::get('Immeubles',"ImmeubleController@index");
    Route::post('Immeubles',"ImmeubleController@store");
    Route::put('Immeubles/{id}',"ImmeubleController@update");
    Route::delete('Immeubles/{id}',"ImmeubleController@distroy");
    Route::post('Immeubles/zone',"ImmeubleController@storebyzone");
    Route::put('zones/Immeubles/{id}',"ImmeubleController@updatebyzone");

    Route::get('appartements',"AppartementController@first");
    Route::get('appartements/{id}',"AppartementController@index");
    Route::post('appartements',"AppartementController@store");
    Route::put('appartements/{id}',"AppartementController@update");
    Route::delete('appartements/{id}',"AppartementController@distroy");
    Route::get('appartements/detail/{id}','AppartementController@show');
    

    // details de l'appartements routes
    Route::post('appartements/detail',"Detail_appController@store");
    Route::delete('appartements/detail/{id}','Detail_appController@distroy');
    Route::put('appartements/detail/{id}',"Detail_appController@update");

    // Appartement locataires links routes
    Route::post('appartements/lign',"LignappController@store");
    Route::delete('appartements/lign/{id}','LignappController@distroy');
    Route::put('appartements/lign/{id}',"LignappController@update");
    Route::get('appartements/lign/out/{id}','LignappController@out');
    Route::get('appartements/lign/in/{id}','LignappController@in');

    //Encaissement routes
    Route::post('appartements/reglement',"ReglementController@store");
    Route::delete('appartements/reglement/{id}','ReglementController@distroy');
    Route::put('appartements/reglement/{id}',"ReglementController@update");

    // Quittance routes
    Route::get('appartement/recu/{id}',"PdfController@quittance");
    Route::get('appartement/recu/{id}/pdf','PdfController@quittance_pdf');

    //Etats Routes
    Route::get('immeuble/Etat/{id}','PdfController@immeuble');
    Route::get('immeuble/pdf/{id}','PdfController@Etatimmeuble');
    Route::get('encaissement/Etat','PdfController@encetat');
    Route::post('encaissement/pdf','PdfController@encpdf'); 

    //Our Data
    Route::get('datas',"OurdataController@index");
    Route::post('datas',"OurdataController@store");
    Route::put('datas',"OurdataController@update");

    
});