<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auger extends Model
{
    /**
     * Get
     */
    public function machine()
    {
        return $this->hasOne('App\Machine');
    }

    /**
     * Fillable fields for a Team.
     */
    protected $fillable = [
        'auger_type'
    ];
}
