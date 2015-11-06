<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Machine;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
               'customers' => Customer::select('city', 'town', 'latlng')->whereIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
           ];    
        return view('location', $data);
    }

    public function fullscreen()
    {
        $data = [
               'customers' => Customer::select('city', 'town', 'latlng')->whereIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
           ];       
        return view('fullscreen', $data);
    }
}
