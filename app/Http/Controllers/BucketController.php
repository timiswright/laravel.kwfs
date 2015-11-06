<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buckets = Bucket::all();
        return view('buckets.index')->withBuckets($buckets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buckets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bucket::create($request->all());
        
        flash()->success('Success!', 'The Team has been updated!');

        return redirect()->route('buckets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bucket = Bucket::findOrFail($id);

        return view('buckets.show')->withBucket($bucket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bucket = Bucket::findOrFail($id);
        return view('buckets.edit')->withBucket($bucket);
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
        $bucket = Bucket::findOrFail($id);

        $this->validate($request, [
            'bucket_type' => 'required'
        ]);
    
        $input = $request->all();
    
        $bucket->fill($input)->save();
    
        flash()->success('Updated!', 'The Bucket has been updated!');
    
        return redirect()->route('buckets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bucket = Bucket::findOrFail($id);

        $bucket->delete();

        flash()->success('Deleted!', 'The Bucket has been deleted!');

        return redirect()->route('buckets.index');
    }
}
