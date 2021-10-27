<?php

namespace App\Http\Controllers;

use Auth;

class DataUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getNama()
    {
        if (Auth::check()) {
            return Auth::user()->nama;
        }
    }

    public static function getUsername()
    {
        if (Auth::check()) {
            return Auth::user()->username;
        }
    }
}
