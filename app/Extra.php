<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    //
    public function machines()
    {
        return $this->belongsToMany('App\Machine');
    }

    /**
     * Fillable fields for a Team.
     */
    protected $fillable = [
        'extra_type',
        'extra_value',
    ];


}
