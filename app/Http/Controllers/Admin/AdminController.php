<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function username()
    {
        return 'email';
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['is_admin' => true]);
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->is_admin) {
            auth()->guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


}
