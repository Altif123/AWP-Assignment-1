<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function index()
    {
        //dd(User::first()->getFavorites());
        $favorites = User::find(auth()-> user()-> id )->getfavorites;

        return view ('favorite.index', ['favorites'=> $favorites]);

    }

    public function store($menuItem)
    {

        $favorite = new Favorite();

        $favorite->favorites()->attach(auth()-> user()-> id , ['menu_id' =>$menuItem]);



        return redirect('favorites/');
    }


    public function destroy(Favorite $favorite, $favoriteItem)
    {


        $favorite->where(['menu_id' => $favoriteItem, 'user_id' => auth()-> user()-> id])->delete();

        return redirect('favorites/');
    }
}
