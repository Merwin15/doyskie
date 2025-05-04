<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        // Check if the user is logged in, if not, ma redirect to login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Displays dashboard view
        return view('user.dashboard');
    }
}
