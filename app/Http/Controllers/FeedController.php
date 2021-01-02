<?php

namespace App\Http\Controllers;

class FeedController extends Controller
{
    public function readFeed()
    {
        $feed = \Feeds::make(['http://sprudge.com/feed']);
        $items = $feed->get_items();
        return $items;
    }

    public function index()
    {
        $items = $this->readFeed();
        return view('feed.index', compact('items'));
    }

}
