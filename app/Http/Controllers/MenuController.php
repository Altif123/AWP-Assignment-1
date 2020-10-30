<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu/index', [
            'menu' => Menu::latest()->get()]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store()
    {
        Menu::create($this->validateMenuItem());
        return redirect()->route('menu.index');
    }

    public function show(Menu $menuItem)
    {
        return view('menu.show', compact('menuItem'));
    }

    public function edit(Menu $menuItem)
    {
        return view('menu.update', compact('menuItem'));
    }

    public function update(Menu $menuItem)
    {
        $menuItem->update($this->validateMenuItem());
        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu.index');
    }

    protected function validateMenuItem()
    {
        return request()->validate([
            'dish_name' => ['required', 'max:200'],
            'description' => ['required'],
            'allergy' => ['required'],
            'price' => ['required', 'max:5', 'min:4'],
        ]);
    }
}

