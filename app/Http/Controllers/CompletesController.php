<?php

namespace App\Http\Controllers;

class CompletesController extends Controller
{
    public function store($goalId)
    {
        \Auth::user()->complete($goalId);
        return back();
    }

    public function destroy($goalId)
    {
        \Auth::user()->uncomplete($goalId);
        return back();
    }
}
