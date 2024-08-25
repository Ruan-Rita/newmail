<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@index')->name('campaign.all');
Route::post('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@store');
Route::get('/campaigns/{code}', 'App\Http\Controllers\Api\CampaignApiController@show');
Route::put('/campaigns', 'App\Http\Controllers\Api\CampaignApiController@update');
