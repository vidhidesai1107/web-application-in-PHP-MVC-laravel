<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
       
        $credentials = $request->only('username', 'password');

        if ($credentials['username'] == 'admin' && $credentials['password'] == 'adminpassword') {
  
            return redirect('/admin/create');
        } else {
           
            return redirect()->route('admin.login')->with('error', 'Invalid credentials');
        }
    }
}
