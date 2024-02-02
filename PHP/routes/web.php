<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;
use App\Models\Service;

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
    return view('welcome');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', 'get');
    Route::get('/services/{name}', 'getService')->name('getServiceID');

});
