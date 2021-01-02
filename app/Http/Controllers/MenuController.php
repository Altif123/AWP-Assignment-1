<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MenuController extends Controller
{
    public function index()
    {
        return view('menu/index', [
            'menu' => Menu::latest()->get()]);
    }

    public function filterByCategory(Request $request, Menu $menu)
    {
        return view('menu/index', [
            'menu' => $menu->filterQuery('category', 'LIKE', $request->category)]);
    }

    public function filterByPrice(Request $request, Menu $menu)
    {
        return view('menu/index', [
            'menu' => $menu->filterQuery('price', '<=', $request->price)]);
    }

    public function searchByDishName(Request $request, Menu $menu)
    {
        return view('menu/index', [
            'menu' => $menu->filterQuery('dish_name', 'LIKE', '%' . $request->searchTerm . '%')]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $this->validateMenuItem();
        $item = new Menu(request(['dish_name', 'description', 'allergy', 'price', 'category']));
        if ($request->hasFile('image')) {
            $imageName = $this->imageUpload($request);
            $item->image = $imageName;
        }
        $item->save();

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

    public function update(Menu $menuItem, Request $request)
    {
        $menuItem->update(request(['dish_name', 'description', 'allergy', 'price', 'category']));
        if (isset($request->image)) {
            $imageName = $this->imageUpload($request);
            $menuItem->image = $imageName;
            $menuItem->save();
        }
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
            'category' => ['required'],
            'image' => ['image', 'nullable', 'max:1999']
        ]);
    }

    public function imageUpload($request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $filename . '_' . time() . '.' . $extension;
        $request->file('image')->storeAs('public/menu_images', $fileName);
        return $fileName;
    }

}

