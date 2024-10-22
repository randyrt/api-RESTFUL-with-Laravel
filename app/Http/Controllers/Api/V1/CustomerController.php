<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\V1\customerQuery;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Requests\Api\EditCustomerRequest;
use App\Http\Requests\Api\CreateCustomerRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CustomerController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return CustomerCollection|mixed|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $filter = new customerQuery();
            $queryItems = $filter->filterRequest($request);

            if (count($queryItems) == 0) {
                return new CustomerCollection(Customer::paginate(20));

            } else {
                return new CustomerCollection(Customer::where($queryItems)->paginate(20)->appends($request->query()));
            }
        } catch (Exception $error) {
            return response()->json($error);
        }
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\Api\CreateCustomerRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function create(CreateCustomerRequest $request)
    {
        try {
            $customer = new Customer();

            $customer->name = $request->name;
            $customer->type = $request->type;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->user_id = Auth::user()->id;
            $customer->postal_code = $request->postal_code;
            $customer->save();

            return response()->json([
                'status_code' => 201,
                'success' => 'true',
                'status_message' => 'customer add with success',
                'data' => $customer
            ]);

        } catch (Exception $error) {
            return response()->json($error);
        }
    }

    /**
     * Summary of show
     * @param \App\Models\Customer $customer
     * @return Customer
     */
    public function show(Customer $customer)
    {
        return $customer;
        //return $customers->find($customer);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\Api\EditCustomerRequest $request
     * @param \App\Models\Customer $customer
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function update(EditCustomerRequest $request, Customer $customer)
    {
        try {

            $customer->name = $request->name;
            $customer->type = $request->type;
            $customer->user_id = Auth::user()->id;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->postal_code = $request->postal_code;
            $customer->save();

            return response()->json([
                'status_code' => 200,
                'success' => 'true',
                'status_message' => 'customer update with success',
                'data' => $customer
            ]);

        } catch (Exception $error) {
            return response()->json($error);
        }
    }

    /**
     * Summary of destroy
     * @param \App\Models\Customer $customer
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();

            return response()->json([
                'status_code' => 200,
                'success' => true,
                'status_message' => 'Customer deleted successfully',
                'deleted_data' => $customer
            ]);
            
        } catch (ModelNotFoundException $error) {
            return response()->json([
                'status_code' => 404,
                'status_message' => 'Customer not found',
                'error' => $error->getMessage()
            ], 404);
            
        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status_message' => 'An error occurred while deleting the customer',
                'error' => $error->getMessage(),
                'trace' => $error->getTrace() 
            ], 500);
        }
    }

}

