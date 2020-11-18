<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(
    [
        'prefix' => '/cabinet',
        'middleware' => ['auth']
    ],
    static function() {
        Route::get('/', [App\Http\Controllers\Auth\CabinetController::class, 'index'])->name('cabinet');
        Route::get('/delete/{id}', [App\Http\Controllers\Auth\UserController::class, 'delete'])->name('delete');
    }
);
