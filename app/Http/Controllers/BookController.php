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

        return redirect($book->path());
    }
    
    /**
     * update book
     *
     * @param  mixed $book
     * @return void
     */
    public function update(Book $book)
    {
        $book->update($this->validateData());

        return redirect($book->path());
    }

    protected function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required'
        ]);
    }
}
