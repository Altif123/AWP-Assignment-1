<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/auth/github/redirect', [\App\Http\Controllers\Auth\GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [\App\Http\Controllers\Auth\GithubController::class, 'callback'])->name('github.callback');

Route::middleware ('auth') -> group (function () {

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');

    Route::post('menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');

    Route::get('menu/', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');

    Route::get('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');

    Route::get('menu/{menuItem}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');

    Route::put('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');

    Route::delete('menu/{menuItem}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.delete');

    Route::post('favorites/{menu_id}', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');

    Route::delete('favorites/{favoriteItem}', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorites.delete');

    Route::get('favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
});