<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{
    public function store($taskId)
    {
        \Auth::user()->favorite($taskId);
        return back();
    }

    public function destroy($taskId)
    {
        \Auth::user()->unfavorite($taskId);
        return back();
    }
}
