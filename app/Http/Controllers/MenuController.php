<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the all the records in the DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showall = Menu::all()->sortBy("dish_name");

        return view('menu/index',['menu' => $showall]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dish_name' => ['required', 'max:200'],
            'description' => ['required'],
            'price' => ['required', 'max:5','min:4'],
        ]);

        $menu = new Menu();
        $menu-> dish_name =request('dish_name');
        $menu-> description =request('description');
        $menu-> allergy =request('allergy');
        $menu-> price =request('price');
        $menu ->save();

       return redirect('menu/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuItem = Menu::find($id);

        return view('menu.show', ['menuitem'=> $menuItem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find article with id
        $menuItem = Menu::find($id);

        return view('menu.update', ['item'=> $menuItem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //find article with id
        $menu = Menu::find($id);

//        $request->validate([
//            'dish_name' => ['required', 'max:200'],
//            'description' => ['required'],
//            'amount' => ['required', 'max:5','min:5'],
//        ]);


        $menu-> dish_name =request('dish_name');
        $menu-> description =request('description');
        $menu-> allergy =request('allergy');
        $menu-> price =request('price');
        $menu ->save();

        return redirect('menu/');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu -> delete();
        return redirect('menu/');
    }
}
