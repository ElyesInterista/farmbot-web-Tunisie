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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/control','FarmController@indexcontrole')->middleware('auth');
Route::get('/state','FarmController@indexstate')->middleware('auth');
Route::get('/weather','FarmController@indexweather')->middleware('auth');
Route::get('/map','PlantedController@create')->middleware('auth');


Route::get('/SeedsPlace','GrainesController@create')->name('seeds')->middleware('auth');
Route::get('/SeedsPlace/{id_graine}/{pos}','GrainesController@AddNewSeed')->name('seedsAdd')->middleware('auth');
Route::get('/UpdateSeedsPlace/{id_graine}/{pos}/{id_explant}','GrainesController@UpdateSeed')->middleware('auth');
Route::get('/SeedRemove/{id_plant}/{pos}','GrainesController@deleteSeed')->middleware('auth');


Route::get('/PlantedPlants','PlantedController@create')->middleware('auth')->name('planteds');;
Route::get('/PlantedPlants/{id_plant}/{X}/{Y}','PlantedController@AddNewPlant')->middleware('auth')->name('plantedsAdd');
Route::get('/PlantedRemove/{id_plant}/{X}/{Y}','PlantedController@delete')->middleware('auth');
Route::get('/PlantedUpdate/{id_plant}/{X}/{Y}/{id_explant}','PlantedController@UpdatePlanted')->middleware('auth');



Route::post('/SendMail','FarmController@SendEmail')->middleware('auth');

Route::group(['prefix' => 'Api'], function ($id) {

    Route::get('/Weather/{id}','ApiController@getWeatherApi');
    Route::get('/Plant','ApiController@getPlantApi');
    Route::get('/GrainByUser/{id}','ApiController@getgraines');
    Route::get('/PlantedByUser/{id}','ApiController@getPlanted');
    Route::get('/NotSync/{user_id}','ApiController@getPlantedNotSync');
    Route::get('/InProgressPlante/{user_id}','ApiController@InProgressPlante');
    Route::get('/FinishedPlante/{user_id}','ApiController@FinishedPlante');
    Route::get('/GetControllesFor/{user_id}','ApiController@GetControllesFor');

    Route::get('/SetStateControllesFor/{user_id}/{state}','ApiController@SetStateControllesFor');
    Route::get('/SetGoToFor/{user_id}','ApiController@SetGoToFor');


    Route::get('/InitiateControlles/{user_id}','ApiController@InitiateControlles');

    Route::post('/SetControlles','ApiController@SetControlles');
    Route::post('/GoToAxis','ApiController@GoToAxis');

    Route::get('/NotficationPlanted/{user_id}','ApiController@CurrentPlantedOrUpdated');
    Route::get('/PlantedWithSeed/{plant_id}','ApiController@getPlantedWithSeed');
    Route::post('/UpdateWeather','ApiController@UpdateWeather');
    Route::post('/SeedControl','ApiController@AddSeed');
    Route::post('/SeedControlDelete','ApiController@DeleteSeed');
    Route::post('/PlantedControl','ApiController@AddPlanted');
    Route::post('/PlantedControlDelete','ApiController@DeletePlanted');
    Route::get('/Sync/{id}','ApiController@setSync');
    Route::post('/Login','ApiController@Login');

});
Route::get('/getCurrentUser','FarmController@getCurrentUser')->middleware('auth','notif');
Route::post('/authenticate','FarmController@authenticate');



