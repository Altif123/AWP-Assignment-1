<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\DB;
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
    return view('home');
});

Auth::routes();



Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order', function () {
    return view('order');
});



//when url menu/create is applied it uses MenuControllers create function
Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create');
//post request for the menu/create page which stores form data
Route::post('menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('create');



