<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/order', function () {
    return view('order');
});



Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');

Route::post('menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');

Route::get('menu/', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');

Route::get('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');

Route::get('menu/{menuItem}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');

Route::put('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');

Route::delete('menu/{menuItem}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');



Route::post('favorites/{menu_id}', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');

Route::get('favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');