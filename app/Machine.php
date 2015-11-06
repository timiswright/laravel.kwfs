<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{

    /**
     * Get the customer that owns the machine.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get
     */
    public function extras()
    {
        return $this->belongsToMany('App\Extra');
    }

    /**
     * Get
     */
    public function auger()
    {
        return $this->belongsTo('App\Auger');
    }

    /**
     * Get
     */
    public function bracket()
    {
        return $this->belongsTo('App\Bracket');
    }

    /**
     * Get
     */
    public function bucket()
    {
        return $this->belongsTo('App\Bucket');
    }

    /**
     * Get
     */
    public function motor()
    {
        return $this->belongsTo('App\Motor');
    }


    /**
     * Fillable fields for a Team.
     */
    protected $fillable = [
        'id',
        'customer_id',
        'serial',
        'bucket_id',
        'auger_id',
        'bracket_id',
        'motor_id',
        'sold_date',
        'notes',
    ];

    /**
     * Always capitalize the company name when we save it to the database
     */
    public function setSerialAttribute($value)
    {
        $this->attributes['serial'] = strtoupper($value);
    }
}

