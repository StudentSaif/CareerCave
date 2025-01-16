<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function registration()
    {
        return view('frontend.account.registration');
    }

    public function login()
    {
        return view('frontend.account.login');
    }
}
