<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books(Request $request)
    {
        $books = Book::orderBy('id', 'DESC')->paginate(10);

        if ($request->ajax()) {
            return view('load_books_data', compact('books'));
        }
        return view('books', compact('books'));
    }
}
