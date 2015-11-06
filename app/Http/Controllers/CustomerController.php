<?php 

namespace App\Http\Controllers;

use App\Bucket;
use App\Bracket;
use App\Machine;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Customer Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		#$this->middleware('auth');
	}
  /***/

	/**
	 * View list of customers.
	 *
	 * @return Response
	 */
	public function index()
	{
    $customers = Customer::orderBy('company', 'asc')->get();

    return view('customers.index')->withCustomers($customers);
	}

  public function search(Request $request)
  {
    // Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $customers = Customer::orderBy('company', 'asc')
                  ->where('company', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('phone', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('mobile', 'LIKE', '%' . $request->search . '%')
                  ->get();
        
  // returns a view and passes the view the list of articles and the original query.
    return view('customers.index')->withCustomers($customers);
  }
      
	/**
	 * Display create view
	 *
	 * @return Response
	 */
	public function create()
	{
    return view('customers.create');
	}    

	/**
	 * Display create view
	 *
	 * @return Response
	 */
	 public function store(CustomerRequest $request)
   {
    $input = $request->all();
    $record = Customer::create($input);
    flash()->success('Success!', 'The customer has been created!');
    return redirect('/customers');
   } 


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $machines = Machine::whereCustomerId($id)->orderBy('sold_date', 'asc')->get();
        $filteredMachines = array();

        foreach($machines as $machine)
          {
              $filteredMachines[$machine->id] = $machine->toArray();
              $filteredMachines[$machine->id]['bracket_type'] = Bracket::where('id', $machine->bracket_id)->first()->bracket_type;
              $filteredMachines[$machine->id]['bucket_type'] = Bucket::where('id', $machine->bucket_id)->first()->bucket_type;
              $filteredMachines[$machine->id]['sold_date'] = Carbon::parse(Machine::where('id', $machine->id)->first()->sold_date)->format('d/m/Y');
          }
        
        return view('customers.show', [
          'record' => $customer->toJson(),
          'customer' => $customer,
          'filteredMachines' => $filteredMachines
        ]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
      public function edit($id)
      {
        $customer = Customer::find($id);
           
           $data = [
               'record' => $customer->toJson(),
               'customer' => $customer->toArray()
           ];

        return view('customers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $input = $request->all();
    
        $customer->fill($input)->save();
    
        flash()->success('Success!', 'The customer has been updated!');
    
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $player = Customer::findOrFail($id);

        $player->delete();

        flash()->success('Success!', 'The customer has been deleted!');

        return redirect()->route('customers.index');
    }

    public function showall()
    {
    $data = ['customers' => Customer::select('company', 'fname', 'lname', 'postcode', 'latlng', 'id')->whereIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
            ];
    return view('customers.showall', $data);
    }

    public function showallsales()
    {
    $data = ['customers' => Customer::select('company', 'fname', 'lname', 'postcode', 'latlng', 'id')->whereNotIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
            ];
    return view('customers.showall', $data);
    }

    public function showallfull()
    {
    $data = ['customers' => Customer::select('company', 'fname', 'lname', 'postcode', 'latlng', 'id')->whereIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
            ];

    return view('customers.showallfull', $data);
    }

    public function showallsalesfull()
    {
    $data = ['customers' => Customer::select('company', 'fname', 'lname', 'postcode', 'latlng', 'id')->whereNotIn('id', Machine::distinct()->select('customer_id')->get())
                            ->get()
                            ->toJson()
            ];
    return view('customers.showallfull', $data);
    }

    

    
}