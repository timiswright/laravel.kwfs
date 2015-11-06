<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::all();
        return view('motors.index')->withMotors($motors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Motor::create($request->all());
        
        flash()->success('Success!' , 'The Motor has been created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = Motor::findOrFail($id);

        return view('motors.show')->withMotor($motor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Motor::findOrFail($id);

        return view('motors.edit')->withMotor($motor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $motor = Motor::findOrFail($id);

        $this->validate($request, [
            'motor_type' => 'required'
        ]);
    
        $input = $request->all();
    
        $motor->fill($input)->save();
    
        flash()->success('Success!', 'The Motor has been updated!');
    
        return redirect()->route('motors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Motor::findOrFail($id);

        $motor->delete();

        flash()->success('Success!', 'The Motor has been deleted!');

        return redirect()->route('motors.index');
    }
}
