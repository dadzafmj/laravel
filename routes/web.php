<?php
/*********************************************** 
_______       ___       ___     ____________
| _____|      |   \   /   |     |___    ____|
|  |_         |    \ /    |         |  |      
|  __|        |           |         |  |      
|  |          |   |   |   |      ___|  |      
|__|          |___|   |___|     |______/ 

Fara Marie José HAJALALAIANA 
Ecole Supérieure Polytechnique Antsiranana 2019 */
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

Route::get('operation', 'gestionOperation\OperationController@index')->name('operationPatient');

Route::get('operation/store', 'gestionOperation\OperationController@operationStore')->name('operationStore');



/**-------------------------facture--------------------------------------- */

Route::get('facture', 'gestionFacture\FactureController@index')->name('formulaireInsertionFacture');

Route::get('facture/store', 'gestionFacture\FactureController@store')->name('factureStore');
	  
Route::get('factureStore/{numpatient}', 'gestionFacture\FactureController@factureStore')->name('factureStore');


Route::get('annulationfacture/{numpatient}', 'gestionFacture\FactureController@annuler_tout')->name('facture_annuler');

Route::post('/imprimerfacture','gestionFacture\FactureController@imprimer_facture')->name('imprimerfacture');































/**------------------ -------*******************------------------------ */


/**-----------------------prestation ----------------------------------------------------------*/

/**vusualiser la liste de prestation */
Route::get('prestation', 'prestation\PrestationController@index')->name('listePrestation');
/**--------------------------------****------------------------------------------------------- */

Route::get('prestation/demande', 'prestation\PrestationController@demande')->name('demandePrestation');

/**------------------------**********************--------------------------------------------- */
/** faire une demande de prestation du client selectioner sur le liste de client, et le prestation selectionner sur le liste de prestation.
 * les parametre : nombre de prestation est envoyer par le methode et mais les reste sont transporter par la route*/
/** '$patient->num_patient','$prestation->ref_prestation','$prestation->nom_prestation','$prestation->prix_prestation'*/
Route::get('num_patient/{num_patient}/ref_prestation{ref_prestation}/nom_prestation/{nom_prestation}/prix_prestation/{prix_prestation}prestation/demande/store/', 'prestation\PrestationController@demandePrestationStore')->name('demandePrestationStore');

/**--------------------------**********---------------------------------------------- */

Route::get('prestation/list', 'prestation\PrestationController@listePrestationRendu')->name('listePrestationRendu');
Route::get('prestationForSelectedClient/{id}', 'prestation\DemandePrestationController@prestationForSelectedClient')->name('prestationForSelectedClient');


/** --------------------------end prestation---------------------------------------------------- */

/** delete prestation */

Route::get('prestdelete/{idprest}/numpatient{numpatient}', 'prestation\PrestationController@deletePrestPatient')->name('deletePrestPatient');
















/**end delete prestation */


Route::get('patient', 'gestionpatient\PatientController@index')->name('listPatient');
Route::get('patient/create', 'gestionpatient\PatientController@create')->name('createPatient');

Route::post('patient/store', 'gestionpatient\PatientController@store')->name('PatientController.store');

Route::get('patient/sortie', 'gestionpatient\PatientController@sortie')->name('sortiePatient');

Route::get('patient/donneMedical', 'gestionpatient\DossierMedicalController@saisieDonneMedical')->name('saisieDonneMedical');

Route::get('donneMedical/store', 'gestionpatient\DossierMedicalController@saisieDonneMedicalStore')->name('saisieDonneMedicalStore');


Route::get('export', 'DisneyplusController@export');



Route::get('disneyplus/list', 'DisneyplusController@index')->name('disneyplus.index');

Route::get('disneyplus', 'DisneyplusController@create')->name('disneyplus.create');
Route::post('disneyplus', 'DisneyplusController@store')->name('disneyplus.store');




Route::get('users/export/', 'StatistiqueController@export');
Route::get('generate-pdf','StatistiqueController@generatePDF');


Route::get('/', function () {
    return view('welcome');
});




Route::get('/mouv_sortie_vente','Mouv_sortie_venteController@index')->name('sortie_vente')->middleware('auth');

Route::post('/mouv_sortie_vente/show','Mouv_sortie_venteController@index')->name('sortie_venteShow')->middleware('auth');



Route::get('/matable','MatableController@afficher');

/**Gestion statistique */



Route::get('/statistique', 'gestionStatistique\StatistiqueController@index')->name('statistique');

Route::get('/statistique/misAjour', 'gestionStatistique\StatistiqueController@misAjour')->name('misAjourStatistique');

Route::get('/statistique/voirStatistiqueForm', 'gestionStatistique\StatistiqueController@voirStatistiqueForm')->name('voirStatistiqueForm');

Route::get('/statistique/affichageStatistique', 'gestionStatistique\StatistiqueController@affichageStatistique')->name('affichageStatistique');

Route::get('/statistique/globale/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueGlobaleController@statistiqueGlobale')->name('statistiqueGlobale');


Route::get('/statistique/prestation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiquePrestationController@statistiquePrestation')->name('statistiquePrestation');

Route::get('/statistique/docteur/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueDocteurController@statistiqueDocteur')->name('statistiqueDocteur');

Route::get('/statistique/uniteAdmission/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueUniteAdmissionController@statistiqueUniteAdmission')->name('statistiqueUniteAdmission');

Route::get('/statistique/detailsPrestation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueDetailsPrestationController@statistiqueDetailsPrestation')->name('statistiqueDetailsPrestation');

Route::get('/statistique/sortieHospitalisation/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueSortieHospitalisationController@statistiqueSortieHospitalisation')->name('statistiqueSortieHospitalisation');
Route::get('/statistique/service/date_debut/{date_debut}/date_fin/{date_fin}', 'gestionStatistique\StatistiqueServiceController@statistiqueService')->name('statistiqueService');

/**export */
Route::post('/stat-Export','gestionStatistique\StatistiqueGlobaleController@export')->name('statistiqueGlobalExport');



/**----------------------------------*****************---------- */


Route::get('/Mouv_prestation_rendue','Mouv_prestation_rendueController@index')->name('mouvPrestationRendue');
Route::get('/montant_globale','montant_globaleController@index')->name('montantGlobale');
Route::post('/montant_globale','montant_globaleController@index')->name('montantGlobale');
Route::get('/montant_globale/show','montant_globaleController@show')->name('montantGlobaleShow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

