<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Author extends Model
{
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * dates cast
     *
     * @var array
     */
    protected $dates = ['dob'];
    
    /**
     * Set Dob Attribute 
     *
     * @param  mixed $dob
     * @return void
     */
    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $dob);
    }
}
