<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class AdminController extends Controller
{
    public function index()
{
    $users = Register::all();
    dd($users); 
    return view('admin.index', compact('users'));
}

public function toggleStatus(Register $user)
{
    $user->update(['is_enabled' => !$user->is_enabled]);
    return redirect()->back()->with('success', 'User status updated.');
}
}
