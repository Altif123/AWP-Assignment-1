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
        $showall = Menu::all();

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
            'amount' => ['required', 'max:5','min:5'],
        ]);

        $menu = new Menu();
        $menu-> dish_name =request('dish_name');
        $menu-> description =request('description');
        $menu-> amount =request('amount');
        $menu ->save();

       return redirect('menu/index');
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
    public function edit(MenuController $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuController $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuController $menu)
    {
        //
    }
}
