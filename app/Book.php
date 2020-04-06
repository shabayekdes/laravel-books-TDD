<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{    
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * path to show book
     *
     * @return void
     */
    public function path()
    {
        return '/books/' . $this->id;
    }

}
