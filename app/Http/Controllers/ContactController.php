<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('user.contact');
    }


    public function submitForm(Request $request)
    {
        //Dugangan pani soon nga ma send jud sa email
        return redirect()->route('contact.form')->with('success', 'Your message has been sent successfully!');
    }
}
