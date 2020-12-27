<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/auth/github/redirect', [\App\Http\Controllers\Auth\GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [\App\Http\Controllers\Auth\GithubController::class, 'callback'])->name('github.callback');

Route::middleware ('auth') -> group (function () {

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->middleware('can:create_menu_item')->name('menu.create');

    Route::post('menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');

    Route::get('menu/', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');

    Route::get('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');

    Route::get('menu/{menuItem}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->middleware('can:edit_menu_item')->name('menu.edit');

    Route::put('menu/{menuItem}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');

    Route::delete('menu/{menuItem}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->middleware('can:delete_menu_item')->name('menu.delete');

    Route::post('favorites/{menu_id}', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');

    Route::delete('favorites/{favoriteItem}', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorites.delete');

    Route::get('favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');

    Route::get('profile', [App\Http\Controllers\UserController::class, 'show'])->name('profile.show');

    Route::put('profile/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

    Route::post('filterByCategory', [App\Http\Controllers\MenuController::class, 'filterByCategory'])->name('filterByCategory');

    Route::post('filterByPrice', [App\Http\Controllers\MenuController::class, 'filterByPrice'])->name('filterByPrice');

    Route::post('searchByDishName', [App\Http\Controllers\MenuController::class, 'searchByDishName'])->name('searchByDishName');

    Route::get('contact-us', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');

    Route::post('contact-us/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

    Route::post('order/{menuItem}', [App\Http\Controllers\OrderController::class, 'addToOrder'])->name('order.add');

    Route::get('basket', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

    Route::delete('order/{item}', [App\Http\Controllers\OrderController::class, 'removeFromBasket'])->name('basket.delete');

    Route::post('order/store/{items}', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

    Route::get('orders', [App\Http\Controllers\orderController::class, 'index'])->middleware('can:view_all_orders')->name('order.index');

    Route::delete('order/delete/{itemId}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.delete');

    Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');

    Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.process');

    Route::post('review/{menuItem}', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

    Route::delete('review/{menuItem}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.delete');
});