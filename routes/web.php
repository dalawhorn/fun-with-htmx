<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\MapController;

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
    return view('main');
});

Route::resource('/todos', TodosController::class)->only(['index', 'store']);

Route::post('/clicked', function() {
    return view('button-click');
});

Route::get('/map', [MapController::class, 'index']);
Route::post('/map/hsv', [MapController::class, 'hsv']);