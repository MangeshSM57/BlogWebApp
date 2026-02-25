<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->current_password && $request->new_password) {

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Current password incorrect');
            }

            $request->validate([
                'new_password' => 'min:6|confirmed'
            ]);

            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }
}