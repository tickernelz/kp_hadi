<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DarkModeController extends Controller
{
    /**
     * Show specified view.
     *
     * @param Request $request
     * @return Response
     */
    function switch () {
            session([
                'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : true,
            ]);

            return back();
    }
}
