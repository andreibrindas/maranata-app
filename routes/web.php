<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});


// For Users

// For Admin 
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::controller(ServiceController::class)->group(function() {
        Route::get('/services', 'index')->name('services');
        Route::get('/services/create', 'create')->name('services.create');
        Route::post('/services/create', 'store')->name('services.store');
        Route::delete('/services/delete/{service}', 'destroy')->name('services.destroy');
    });
});

require __DIR__.'/auth.php';
