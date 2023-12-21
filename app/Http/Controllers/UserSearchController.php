<?php

namespace App\Http\Controllers;
use App\Models\Register;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index()
    {
        return view('user.search');
    }

    public function search(Request $request)
    {
        $username = $request->input('email');
        $user = Register::where('email', $username)->first();

        return view('user.search', compact('user', 'username'))
        ->with('message', $user ? null : 'User not found.');
    }
}
