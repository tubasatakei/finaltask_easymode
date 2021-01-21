<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{
    public function store($goalId)
    {
        \Auth::user()->favorite($goalId);
        return back();
    }

    public function destroy($goalId)
    {
        \Auth::user()->unfavorite($goalId);
        return back();
    }
}
