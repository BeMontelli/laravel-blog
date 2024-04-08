<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    //
    public function legals(): View
    {
        return view('legals');
    }
    public function aboutus(): View
    {
        return view('aboutus');
    }
}
