<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request,$menuItem)
    {
        Review::create([
            'menu_id' => $menuItem,
            'user_id' => auth()->user()->id,
            'review' => $request->review,
            'rating'=> $request->rating,
        ]);
        return redirect()->route('menu.index');
    }

    public function update(Request $request,$menuItem)
    {
        dd('update in review');
//        $this->authorize('update',$menuItem->reviews);

//        Review::create([
//            'menu_id' => $menuItem,
//            'user_id' => auth()->user()->id,
//            'review' => $request->review,
//            'rating'=> $request->rating,
//        ]);
        return redirect()->route('menu.index');
    }
    public function destroy(Review $reviews,$review)
    {
        $reviews->where(['id'=>$review])->delete();
        return redirect()->route('menu.index');
    }


}
