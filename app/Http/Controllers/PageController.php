<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    //
    public function legals(): View
    {
        return view('legals', [
            'title' => 'Legals',
            'content' => 'Lorem Ipsum',
        ]);
    }
    public function aboutus(): View
    {
        return view('aboutus', [
            'title' => 'About Us',
            'content' => '<p>Lorem Ipsum ...</p><p>Lorem Ipsum 2 ...</p>',
        ]);
    }
}
