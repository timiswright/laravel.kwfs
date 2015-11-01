<?php namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

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
            $data = [
                'customers' => Customer::orderBy('created_at', 'desc')
                                ->get()
                                ->toArray()
            ];
            
            #dd($data);
		return view('customer-list', $data);
	}
        /***/
        
        
	/**
	 * Display create view
	 *
	 * @return Response
	 */
	public function create()
	{
          
            return view('customer-create');
	}    


	/**
	 * Display create view
	 *
	 * @return Response
	 */
	public function store(Request $request)
    {

           $input = $request->all();
           $record = Customer::create($input);
                      
           return redirect('/customer');
    }       

}
