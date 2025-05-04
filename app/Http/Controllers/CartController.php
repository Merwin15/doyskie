<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Displays the cart
    public function showCart()
    {
        // fetches the book from books.php
        $books = require app_path('Data/books.php');
        
        return view('user.cart', compact('books'));
    }

    // Remove book from cart
    public function removeBookFromCart(Request $request)
    {
        $remove_id = $request->input('remove_book_id');

        // Checks if the cart session exists and is not empty
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            // Removes book from the cart
            $cart = array_filter($cart, function ($id) use ($remove_id) {
                return $id != $remove_id;
            });

            session()->put('cart', array_values($cart)); // Updates the session cart
        }

        return redirect()->route('cart.show');
    }
}
