<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;
use App\Models\Service;
use App\Http\Controllers\ServiceController;


Route::get('/', function () {
    return view('/');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', 'get');
    Route::post('/services', 'getService')->name('getServiceID');

});
