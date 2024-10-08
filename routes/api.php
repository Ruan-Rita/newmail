<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@index')->name('campaign.all');
    Route::post('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@store');
    Route::get('/campaigns/{code}', 'App\Http\Controllers\Api\CampaignApiController@show');
    Route::put('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@update');
    
    Route::resource('/customers', 'App\Http\Controllers\Api\CustomerApiController');
    Route::resource('/website', 'App\Http\Controllers\Api\WebSiteApiController');
    Route::get('/reports', 'App\Http\Controllers\Api\ReportsApiController@index')->name('reports.index');
    Route::put('settings/{settings}', 'App\Http\Controllers\Api\SettingsApiController@update')->name('settings.update');
});
