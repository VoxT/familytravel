<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function login(Request $request)
    {
        if($request->remember == 'on') $remember = true; else $remember = false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Authentication passed...
            return response()->json(['message' => 'success', 'user_name' => Auth::user()->full_name]);
        } else {
            return response()->json(['message' => 'Email hoặc mật khẩu không đúng.']);
        }
    }

    public function logout(Request $request)
    {           
        Auth::logout();
        Cache::flush();
        \Session::flush();
        return response()->json(['message' => 'success']);
    }

    public function getUser()
    {
        if(Auth::check()) {
             return response()->json(['login' => true]);
        } else {
             return response()->json(['login' => false]);
        }
    }
}
