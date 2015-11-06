<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auger;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AugerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $augers = Auger::all();
        return view('augers.index')->withAugers($augers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('augers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auger::create($request->all());
        flash()->success('Success!' , 'The Auger has been created.');
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
        $auger = Auger::findOrFail($id);
        return view('augers.show')->withAuger($auger);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auger = Auger::findOrFail($id);

        return view('augers.edit')->withAuger($auger);
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
        $auger = Auger::findOrFail($id);

        $this->validate($request, [
            'auger_type' => 'required'
        ]);
    
        $input = $request->all();
    
        $auger->fill($input)->save();
    
        flash()->success('Success!', 'The Auger has been updated!');
    
        return redirect()->route('augers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auger = Auger::findOrFail($id);

        $auger->delete();

        flash()->success('Success!', 'The Auger has been deleted!');

        return redirect()->route('augers.index');
    }
}
