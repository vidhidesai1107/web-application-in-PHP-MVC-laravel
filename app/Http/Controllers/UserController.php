<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\Register; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class UserController extends Controller
{
    public function showRegistrationForm() {
        return view('register');
    }

    public function register(Request $request) {
        Log::info('Register method called');
       // dd($request->all()); 
  
        // dd('Before validation'); 
       
        $validator = Validator::make($request->all(), Register::$rules);
       
        // dd(session()->all());
        // dd('After validation'); 

        // Log::info('Register method called');
        // Log::info($request->all());
        
        if ($validator->fails()) {
            logger($validator->errors());
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

   
      $user = Register::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'confirm_password' => $request->input('confirm_password', ''), 
        'language' => $request->input('language'),
        'mobile' => $request->input('mobile'),
    ]);
    // $user = Register::create($request->all());

    // Mail::to($user->email)->send(new EmailVerification($user));

    return redirect('/')->with('success', 'Registration successful. Check your email for verification.');
}

    // public function updateEmail(Request $request, $userId) {
   
    //     $user = Register::findOrFail($userId);
    //     $user->update(['email' => $request->input('email')]);
    //     dd('Update successful', $user);
    
      
    // }
    
}
