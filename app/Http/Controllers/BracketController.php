<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bracket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BracketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brackets = Bracket::all();
        return view('brackets.index')->withBrackets($brackets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brackets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bracket::create($request->all());
        
        flash()->success('Success!' , 'The Bracket has been created.');

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
        $bracket = Bracket::findOrFail($id);

        return view('brackets.show')->withBracket($bracket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bracket = Bracket::findOrFail($id);

        return view('brackets.edit')->withBracket($bracket);
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
        $bracket = Bracket::findOrFail($id);

        $this->validate($request, [
            'bracket_type' => 'required'
        ]);
    
        $input = $request->all();
    
        $bracket->fill($input)->save();
    
        flash()->success('Success!', 'The Bracket has been updated!');
    
        return redirect()->route('brackets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bracket = Bracket::findOrFail($id);

        $bracket->delete();

        flash()->success('Success!', 'The Bracket has been deleted!');

        return redirect()->route('brackets.index');
    }
}
