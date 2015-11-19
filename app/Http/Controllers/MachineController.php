<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Auger;
use App\Bracket;
use App\Bucket;
use App\Motor;
use App\Machine;
use App\Customer;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Requests\MachineRequest;

use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $machines = Machine::all();
        $filteredMachines = array();

        foreach($machines as $machine)
          {
            $filteredMachines[$machine->id] = $machine->toArray();
            $filteredMachines[$machine->id]['bracket_type'] = Bracket::where('id', $machine->bracket_id)->first()->bracket_type;
            $filteredMachines[$machine->id]['bucket_type'] = Bucket::where('id', $machine->bucket_id)->first()->bucket_type;
            $filteredMachines[$machine->id]['company'] = Customer::where('id', $machine->customer_id)->first()->company;
            
          }

        return view('machines.index', [
            'filteredMachines' => $filteredMachines
        ]);
    }

    public function search(Request $request)
    {

    // Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $machines = Machine::orderBy('serial', 'asc')
                  ->where('serial', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('id', 'LIKE', '%' . $request->search . '%')
                  ->get();
        
    // returns a view and passes the view the list of articles and the original query.
    $filteredMachines = array();

        foreach($machines as $machine)
          {
            $filteredMachines[$machine->id] = $machine->toArray();
            $filteredMachines[$machine->id]['bracket_type'] = Bracket::where('id', $machine->bracket_id)->first()->bracket_type;
            $filteredMachines[$machine->id]['bucket_type'] = Bucket::where('id', $machine->bucket_id)->first()->bucket_type;
            $filteredMachines[$machine->id]['company'] = Customer::where('id', $machine->customer_id)->first()->company;
            
          }

        return view('machines.index', [
            'filteredMachines' => $filteredMachines
        ]);
  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $param)
    {
        $customer = Customer::findOrFail($param->customer_id);
        $augers = Auger::lists('auger_type', 'id');
        $brackets = Bracket::lists('bracket_type', 'id');
        $buckets = Bucket::lists('bucket_type', 'id');
        $motors = Motor::lists('motor_type', 'id');

        $extras = [];
            foreach (Extra::orderBy('extra_value')->get() as $extra) {
        $extras[$extra->extra_type][] = $extra;
        }

        $data = [
            'augers' => $augers->toArray(),
            'brackets' => $brackets->toArray(),
            'buckets' => $buckets->toArray(),
            'motors' => $motors->toArray(),
            'extras' => $extras,
            ];

        return view('machines.create', $data)->withCustomer($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineRequest $request)
    {
        $machine_id = Machine::create($request->only('customer_id', 'serial', 'sold_date', 'bucket_id', 'bracket_id', 'auger_id', 'motor_id', 'notes', 'invoice', 'measurement1', 'measurement2'))->id;

        $machine = Machine::findOrFail($machine_id);
        
        $machine->extras()->sync($request->input('extras'));
    
        return redirect()->route('customers.show', ['id' => $machine->customer_id]); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::findOrFail($id);
        $auger = Machine::findOrFail($id)->auger;
        $bracket = Machine::findOrFail($id)->bracket;
        $bucket = Machine::findOrFail($id)->bucket;
        $motor = Machine::findOrFail($id)->motor;
        $extras = Machine::findOrFail($id)->extras()->get();

        //return $extras;

        $data = [
            'auger' => $auger->toArray(),
            'bracket' => $bracket->toArray(),
            'bucket' => $bucket->toArray(),
            'motor' => $motor->toArray(),
            'extras' => $extras->toArray()
            ];

            //return $data;

        return view('machines.show', $data)->withMachine($machine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::lists('company', 'id');
        $machine = Machine::findOrFail($id);
        $augers = Auger::lists('auger_type', 'id');
        $brackets = Bracket::lists('bracket_type', 'id');
        $buckets = Bucket::lists('bucket_type', 'id');
        $motors = Motor::lists('motor_type', 'id');
        
        $extras = [];
            foreach (Extra::orderBy('extra_value')->get() as $extra) {
        $extras[$extra->extra_type][] = $extra;
        }

        // Just Added this to get the extras that this machine has...
        $myextras = Machine::findOrFail($id)->extras()->get();

        $data = [
            'augers' => $augers->toArray(),
            'brackets' => $brackets->toArray(),
            'buckets' => $buckets->toArray(),
            'motors' => $motors->toArray(),
            'extras' => $extras,
            'myextras' => $myextras,
            ];

        return view('machines.edit', $data)->withMachine($machine)->withCustomers($customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MachineRequest $request, $id)
    {
        $machine = Machine::findOrFail($id);

        $machine->fill($request->only('customer_id', 'serial', 'sold_date', 'bucket_id', 'bracket_id', 'auger_id', 'motor_id', 'notes', 'invoice', 'measurement1', 'measurement2'));
        $machine->save();
        $machine->extras()->sync($request->input('extras'));
    
        //$input = $request->all();
        //$machine->fill($input)->save();
        flash()->success('Success!', 'The Machine has been updated!');
    
        return redirect()->route('customers.show', ['id' => $machine->customer_id]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notesUpdate(Request $request)
    {
        $machine = Machine::findOrFail($request->id);

        $this->validate($request, [
            'notes' => 'required'
        ]);
        $input = $request->all();
        $machine->fill($input)->save();

        flash()->success('Success!', 'The Machine Notes have been updated!');
        
        return redirect()->route('machines.show', ['id' => $machine->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        flash()->success('Deleted!', 'The Machine has been deleted!');
        return redirect()->route('customers.show', ['id' => $machine->customer_id]); 
    
    }

    /**
     * Lets move a bucket
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveMachine($id)
    {
        $machine = Machine::findOrFail($id);
        //$customers = Customer::lists('company', 'id');
        
        $customers = Customer::OrderBy('company')->get(['id', 'company', 'postcode', 'town', 'building'])->keyBy('id')->map(function ($customer) {
            return $customer->company.' - '.$customer->building.' - '.$customer->town.' - '.$customer->postcode.' - '.$customer->id;
        });

        $data = [
            'customers' => $customers->toArray(),
            ];

        return view('machines.move', $data)->withMachine($machine);
    }

    /**
     * Lets move a bucket
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveMachineSave(Request $request)
    {

        $machine = Machine::findOrFail($request->id);

        $this->validate($request, [
            'id' => 'required',
            'customer_id' => 'required'
        ]);

        $input = $request->all();
        $machine->fill($input)->save();

        flash()->success('Success!', 'The Machine has been realocated!');
        
        return redirect()->route('customers.show', ['id' => $machine->customer_id]);

        
    }

}
