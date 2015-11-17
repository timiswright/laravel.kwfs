<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Get the machines for the customer.
     */
    public function machines()
    {
        return $this->hasMany('App\Machine');
    }
    
    protected $fillable = [
                'id',
                'company',
                'building',
                'fname',
                'lname',
                'street',
                'town',
                'city',
                'county',
                'postcode',
                'email',
                'phone',
                'mobile',
                'latlng',
                'notes'];

    /**
     * Always capitalize the company name when we save it to the database
     */
    public function setCompanyAttribute($value)
    {
        $this->attributes['company'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the building name when we save it to the database
     */
    public function setBuildingAttribute($value)
    {
        $this->attributes['building'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the fname when we save it to the database
     */
    public function setFnameAttribute($value)
    {
        $this->attributes['fname'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the lname when we save it to the database
     */
    public function setLnameAttribute($value)
    {
        $this->attributes['lname'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the street name when we save it to the database
     */
    public function setStreetAttribute($value)
    {
        $this->attributes['street'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the town name when we save it to the database
     */
    public function setTownAttribute($value)
    {
        $this->attributes['town'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the city name when we save it to the database
     */
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = ucwords(strtolower($value));
    }

    /**
     * Always capitalize the county name when we save it to the database
     */
    public function setCountyAttribute($value)
    {
        $this->attributes['county'] = ucwords(strtolower($value));
    }

    /**
     * Always clean the phone no when we save it to the database
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    /**
     * Always clean the phone no when we save it to the database
     */
    public function setMobileAttribute($value)
    {
        $this->attributes['mobile'] = preg_replace('/[^0-9]/', '', $value);
    }

    

}
