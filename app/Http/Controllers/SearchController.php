<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $books = include(app_path('Data/books.php'));
        
        // Get the search query from the request
        $search = $request->query('search', '');
        
        // Filter the books based on the search query
        $results = [];
        
        if ($search) {
            foreach ($books as $book) {
                if (stripos($book['title'], $search) !== false || stripos($book['author'], $search) !== false) {
                    $results[] = $book;
                }
            }
        }

        return view('user.search-results', compact('results', 'search'));
    }
}
