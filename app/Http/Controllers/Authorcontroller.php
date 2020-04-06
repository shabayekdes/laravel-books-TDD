<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class Authorcontroller extends Controller
{    
    /**
     * create author
     *
     * @return void
     */
    public function create()
    {
        return view('authors.create');
    }
    
    /**
     * store author
     *
     * @return void
     */
    public function store()
    {
        Author::create($this->validateData());
    }

    protected function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'dob' => 'required|date_format:d/m/Y',
        ]);
    }
}
