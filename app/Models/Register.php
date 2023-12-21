<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = ['name', 'email', 'password', 'confirm_password', 'language', 'mobile'];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:registers',
        'password' => 'required|min:8|confirmed',
        
        'language' => 'required|in:EN,DE',
        'mobile' => 'nullable|numeric',
    ];
}
