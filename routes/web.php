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


//routes for menu
//when url menu/create is applied it uses MenuControllers create function
Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create');
//post request for the menu/create page which stores form data
Route::post('menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('create');
//when url menu/index is applied uses MenuControllers index function
Route::get('menu/', [App\Http\Controllers\MenuController::class, 'index'])->name('index');
//when url menu/{id} is applied uses MenuControllers show function to show specific menu item
Route::get('menu/{id}', [App\Http\Controllers\MenuController::class, 'show'])->name('show');
//when url menu/{id}/edit is applied uses MenuControllers edit function to show specific menu item
Route::get('menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('edit');
//
Route::put('menu/{id}',[App\Http\Controllers\MenuController::class, 'update'])->name('update') ;
//
Route::delete('menu/{id}/delete',[App\Http\Controllers\MenuController::class, 'destroy'])->name('destroy');

