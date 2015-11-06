<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
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
        'bucket_type'
    ];
}
