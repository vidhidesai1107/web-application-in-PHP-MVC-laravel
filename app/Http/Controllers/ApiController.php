<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class ApiController extends Controller
{
    public function getUserDetails(Request $request)
    {
     
        $data = $request->json()->all();

       
        $user = Register::where('name', $data['name'])->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

      
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'language' => $user->language,
            'mobile' => $user->mobile,
        ]);
    }
}
