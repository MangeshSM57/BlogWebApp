<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

          // 4️⃣ Return JSON Response
        return response()->json([
            'status' => true,
            'message' => 'User Registered Successfully',
            'user' => $user
        ], 201);
       
        }

        public function login(Request $request)
    {
    // Validation
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Check user exists
    $user = User::where('email', $validated['email'])->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid Email or Password'
        ], 401);
    }

    return response()->json([
        'status' => true,
        'message' => 'Login Successful',
        'user' => $user
    ], 200);
    }
    public function logout(request $request)
    {
        
    }
}
