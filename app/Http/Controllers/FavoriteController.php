<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
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
    public function create($userid,$menuItemid)
    {

    }

    public function store($menuItem)
    {

        $favorite = new Favorite();

        $favorite->favorites()->attach(auth()-> user()-> id , ['menu_id' =>$menuItem]);



        return redirect('favorites/');
    }


    public function show(Favorite $favorite)
    {
        //
    }


    public function edit(Favorite $favorite)
    {
        //
    }


    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    public function destroy(Favorite $favorite)
    {
        //
    }
}
