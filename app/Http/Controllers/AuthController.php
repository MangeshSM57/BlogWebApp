<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login');
       
        }

    // Show Login Form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
        return back()->with('error', 'First register yourself');
        }

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect('/posts');
        }
        return back()->with('error','Invalid Credentials');
    
    }
    

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
