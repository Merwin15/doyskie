<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit-profile', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Only update password if it's filled
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
}
