<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCustomersRequest;
use App\Http\Services\V1\customerQuery;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerRessource;
use App\Http\Resources\V1\CustomerCollection;
use Exception;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $filter = new customerQuery();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
          return new CustomerCollection(Customer::paginate(400)); 
        }

        $customer = Customer::where($queryItems)->paginate(400);
        return new CustomerCollection($customer->appends($request->query())); 
    }
    

    /**
     * Show the form for creating a new resource.<z
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request)
    {
       try{
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->type = $request->type;
        $customers->address = $request->address;
        $customers->city = $request->city;
        $customers->postal_code = $request->postal_code;
        $customers->save();

        return response()->json([
            'status_code' => 200,
            'status_message' => 'customers add with success',
            'data' => $customers
        ]);
       }catch(Exception $error){
         return response()->json($error);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
       // return $customer;
        return new CustomerRessource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
