<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{    
    /**
     * store book
     *
     * @return void
     */
    public function store()
    {
        $book = Book::create($this->validateData());
        return view('books', compact('book'));
    }

    protected function validateData()
    {
        return request()->validate([
            'title' => 'required'
        ]);
    }
}
