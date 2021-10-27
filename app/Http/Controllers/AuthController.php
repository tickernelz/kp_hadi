<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use Auth;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function loginView()
    {
        return view('login/main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param Request $request
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            throw new Exception('Salah Username dan Password.');
        }
    }

    /**
     * Logout user.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
