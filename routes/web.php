<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/1', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
 
//route accueil pour les visiteurs
Route::get('/', 'VisiteurController@index')->name('portail');
Route::post('/offre_store', 'VisiteurController@offre_store')->name('offre.store');
Route::get('/offre_emploi', 'VisiteurController@emploi')->name('emploi');
Route::get('/offre_stage', 'VisiteurController@stage')->name('stage');
Route::get('/stage/pdf','VisiteurController@createPDF')->name('stage.pdf');
Route::get('/emploi/pdf','VisiteurController@emploiPDF')->name('emploi.pdf');
Route::get('stage-export', 'VisiteurController@stageExport')->name('stage-export');
Route::get('emploi-export', 'VisiteurController@emploiExport')->name('emploi-export');
Route::delete('/stage/{offre}','VisiteurController@destroy_stage')->name('destroy.stage');
Route::delete('/emploi/{offre}','VisiteurController@destroy_emploi')->name('destroy.emploi');

//contacter le l'entreprise
Route::post('/contact', 'VisiteurController@contact_store')->name('contact.store');
Route::get('/message', 'VisiteurController@message')->name('message');
Route::delete('/message/{mg}','VisiteurController@destroy_message')->name('destroy.message');
Route::get('/message/pdf','VisiteurController@messagePDF')->name('message.pdf');
Route::get('message-export', 'VisiteurController@messageExport')->name('message-export');

                // ******   ******    ******
Route::get('logout', 'Auth\LoginController@logout');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
    Route::resource('users', 'UsersController');
    Route::resource('dpts', 'PersonnelsController');
});
Route::post('/poste_store', 'Admin\PersonnelsController@poste_store')->name('poste.store');
Route::get('/presonel_edit/{user}', 'Admin\PersonnelsController@pers_edit')->name('pers.edit');
Route::patch('/presonel/update/{user}', 'Admin\PersonnelsController@pers_update')->name('pers.update');

Route::put('/deleted_at/{user}', 'Admin\UsersController@deleted_user')->name('user.delete');
Route::get('/user_list', 'Admin\UsersController@list_actif')->name('users.actif');
Route::get('/user_archive', 'Admin\UsersController@list_inactif')->name('users.inactif');
Route::put('/activer/{user}', 'Admin\UsersController@activer_user')->name('activer.user');
Route::get('/user_archive-export', 'Admin\UsersController@archiveExport')->name('archive-export');
Route::get('/user_archive/pdf', 'Admin\UsersController@archivePDF')->name('archive.pdf');

                 // ******   ******    ******
 // profil d'un user 
 Route::get('/profil', 'ProfilController@index')->name('profile');
 Route::post('/image', 'ProfilController@image_update')->name('image');
 Route::post('/pasword', 'ProfilController@password')->name('password');

                 // ******   ******    ******
Route::namespace('Secretariat')->prefix('secreta')->middleware('can:secretariat')->group(function() {
    Route::resource('cahier', 'SecretaireController');
});
             // ******   ******    ******
Route::namespace('Communication')->prefix('com')->group(function() {
    Route::resource('events', 'EventsController');
    Route::resource('categories', 'CategoriesController');
});

 // ******   ******    ******

 Route::resource('rendu', 'RenduController');
 Route::post('/comments/{rendu}', 'CommentRenduController@store')->name('comments.store');
 Route::post('/reponse/{comment}', 'CommentRenduController@reponse')->name('reponse.store');
 Route::get('/notifications/{rendu}/{notification}', 'RenduController@show_notification')->name('show.notification');
 Route::get('/rendus', 'RenduController@rendu')->name('rendu');

// ****** ***** **** *****
Route::get('/user_salaire', 'Finance\FinanceController@salarier')->name('users.salaire');
Route::get('/salaire_edit/{user}', 'Finance\FinanceController@salaire_edit')->name('salaire.edit');
Route::patch('/salaire_update/{user}', 'Finance\FinanceController@salaire_update')->name('salaire.update');
Route::get('/user_paiement/{user}', 'Finance\FinanceController@salarier')->name('users.paiement');
