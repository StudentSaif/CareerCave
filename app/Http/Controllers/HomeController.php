<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // This shows the home page of the website
    public function index()
    {
        return view('frontend.home');
    }
}
