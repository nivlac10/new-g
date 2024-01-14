<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller {
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard'; // Redirect after successful login
    protected $guard = 'admin'; // Use the admin guard

    // Override the showLoginForm method to use the admin login view
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Logout the admin
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        return view('admin.dashboard'); // Replace 'admin.dashboard' with your actual view name
    }

    // Define the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
