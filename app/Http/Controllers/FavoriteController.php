<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;


class FavoriteController extends Controller
{

    public function index()
    {
        $favorites = User::find(auth()->user()->id)->getfavorites;
        return view('favorite.index', compact('favorites'));
    }

    public function store($menuItem)
    {
        $favorite = new Favorite();
        $favorite->favorites()->attach(auth()->user()->id, ['menu_id' => $menuItem]);
        return redirect()->route('favorites.index');
    }

    public function destroy(Favorite $favorite, $favoriteItem)
    {
        $favorite->where(['menu_id' => $favoriteItem, 'user_id' => auth()->user()->id])->delete();
        return redirect()->route('favorites.index');
    }
}

