<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;
use App\Models\Service;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/services');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', 'get');
    Route::post('/services', 'getService')->name('getServiceID');

});
