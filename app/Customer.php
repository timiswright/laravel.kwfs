<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['id', 'title', 'fname', 'lname', 'street', 'town', 'postcode', 'email', 'phone',
       'mobile', 'machine', 'machineType', 'serialNumber', 'latlng'];
}
