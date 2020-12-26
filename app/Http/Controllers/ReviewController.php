<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request,$menuItem)
    {
        //$review = new Review();
        Review::create([
            'menu_id' => $menuItem,
            'user_id' => auth()->user()->id,
            'review' => $request->review,
            'rating'=> $request->rating,
        ]);
        return redirect()->route('menu.index');
    }
}
