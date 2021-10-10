<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller {

    use AuthenticatesUsers;
    protected $redirectTo = '/';
    public function admin_login() {
        if (Auth::id()) {
            return redirect()->back();
        } else {
            return view('auth.admin.login');
        }
    }
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
    protected function guard() {
        return Auth::guard('admin');
    }

}
