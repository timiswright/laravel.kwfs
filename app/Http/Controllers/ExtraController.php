<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extra;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extras = Extra::all();
        return view('extras.index')->withExtras($extras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extras = Extra::orderBy('extra_type')->orderBy('extra_value')->get();


        $output_array = array(); 

            // Loop over the one you have...
            foreach ($extras as $extra) {
              
              $extra->extra_type = $extra->extra_type;
              
              // Create the sub-array if it doesn't exist
              if (!isset($output_array[$extra->extra_type])) {
                $ouput_array[$extra->extra_type] = array();
              }    
              // Then append the state onto it
              $output_array[$extra->extra_type][] = $extra->extra_value;
            }


        return view('extras.create')->withExtras($output_array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Extra::create($request->all());
        
        flash()->success('Success!' , 'The Extra has been created.');

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
        $extra = Extra::findOrFail($id);

        return view('extras.show')->withExtra($extra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extra = Extra::findOrFail($id);

        return view('extras.edit')->withExtra($extra);
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
        $extra = Extra::findOrFail($id);

        $this->validate($request, [
            'extra_type' => 'required',
            'extra_value' => 'required',
        ]);
    
        $input = $request->all();
    
        $extra->fill($input)->save();
    
        flash()->success('Success!', 'The Extra has been updated!');
    
        return redirect()->route('extras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extra = Extra::findOrFail($id);

        $extra->delete();

        flash()->success('Success!', 'The Extra has been deleted!');

        return redirect()->route('extras.index');
    }
}
