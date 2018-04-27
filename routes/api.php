<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'record'],function(){
    Route::get('listHeroes',['as'=>'api.record.listHeroes','uses'=>'Api\HeroRecordController@listHeroes']);
    Route::post('saveHero',['as'=>'api.record.saveHero','uses'=>'Api\HeroRecordController@saveHero']);
    Route::post('createHero',['as'=>'api.record.createHero','uses'=>'Api\HeroRecordController@createHero']);
    Route::post('submitImage',['as'=>'api.record.submitImage','uses'=>'Api\HeroRecordController@submitImage']);
    Route::post('deleteImage',['as'=>'api.record.deleteImage','uses'=>'Api\HeroRecordController@deleteImage']);
    Route::post('deleteHeroSuperpower',['as'=>'api.record.deleteHeroSuperpower','uses'=>'Api\HeroRecordController@deleteHeroSuperpower']);
    Route::post('listSuperpowers',['as'=>'api.record.listSuperpowers','uses'=>'Api\HeroRecordController@listSuperpowers']);
    Route::post('createSuperpower',['as'=>'api.record.createSuperpower','uses'=>'Api\HeroRecordController@createSuperpower']);
    Route::post('addHeroSuperpower',['as'=>'api.record.addHeroSuperpower','uses'=>'Api\HeroRecordController@addHeroSuperpower']);
    Route::post('deleteHero',['as'=>'api.record.deleteHero','uses'=>'Api\HeroRecordController@deleteHero']);
});
