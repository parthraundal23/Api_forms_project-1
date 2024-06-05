<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiFormController;

    
Route::get('/api-form', [ApiFormController::class, 'create']);
Route::post('/api-form', [ApiFormController::class, 'store']);

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
    return view('welcome');
});
