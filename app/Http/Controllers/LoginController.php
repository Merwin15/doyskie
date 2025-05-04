<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if ($credentials['email'] === 'staff@eme.com' && $credentials['password'] === 'staff123') {
            return redirect()->route('staff.dashboard');
        }
    
        if ($credentials['email'] === 'admin@eme.com' && $credentials['password'] === 'admin123') {
            return redirect()->route('admin.dashboard');
        }
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }
    
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
    
}
