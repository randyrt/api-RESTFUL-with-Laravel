<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\V1\InvoicesQuery;
use App\Http\Requests\Api\EditInvoiceRequest;
use App\Http\Resources\V1\InvoicesCollection;
use App\Http\Requests\Api\CreateInvoiceRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InvoiceController extends Controller
{
     
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return InvoicesCollection
     */
    public function index(Request $request)
    {
        $filter = new InvoicesQuery();
        $queryItems = $filter->filterRequest($request);

        if(count($queryItems) == 0){
            return new InvoicesCollection(Invoice::paginate(400)); 
        }

        return new InvoicesCollection(Invoice::where($queryItems)->paginate(400)->appends($request->query()));
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\Api\CreateInvoiceRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function create(CreateInvoiceRequest $request)
    {
        try {

            $invoice = new Invoice();

            $invoice->amount = $request->amount;
            $invoice->customer_id = $request->customer_id;
            $invoice->user_id = Auth::user()->id;
            $invoice->status = $request->status;
            $invoice->billed_date = $request->billed_date;
            $invoice->paided_date = $request->paided_date;
            $invoice->save();

            return response()->json([
                'status_code' => 201,
                'success' => 'true',
                'status_message' => 'invoice add with success',
                'data' => $invoice
            ]);

        }catch(Exception $error){
          return response()->json($error);
       }
    }

    /**
     * Summary of show
     * @param \App\Models\Invoice $invoice
     * @return Invoice
     */
    public function show(Invoice $invoice)
    {
        return $invoice;
        //return new InvoicesResource($invoice);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\Api\EditInvoiceRequest $request
     * @param \App\Models\Invoice $invoice
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function update(EditInvoiceRequest $request, Invoice $invoice)
    {

        $invoice->amount = $request->amount;
        $invoice->customer_id = $request->customer_id;
        $invoice->status = $request->status;
        $invoice->user_id = Auth::user()->id;
        $invoice->billed_date = $request->billed_date;
        $invoice->paided_date = $request->paided_date;
        $invoice->save();

        return response()->json([
            'status_code' => 200,
            'success' => 'true',
            'status_message' => 'invoice update with success',
            'data' => $invoice
        ]);
        
    }

    /**
     * Summary of destroy
     * @param \App\Models\Invoice $invoice
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function destroy(Invoice $invoice)
    {
        try{
                $invoice->delete();
                
                return response()->json([
                'status_code' => 200,
                'success' => 'true',
                'status_message' => 'invoice delete with success',
                'deleted_data' => $invoice
                ]);

            
        }catch(ModelNotFoundException $error){
            return response()->json([
                'status_code' => 404,
                'status_message' => 'Invoice not found',
                'error' => $error->getMessage()

            ]);
        }catch(Exception $error){
            return response()->json([
                'status_code' => 500,
                'status_message' => 'An error occurred while deleting the customer',
                'error' => $error->getMessage(),
                'trace' => $error->getTrace()
            ]);
        }
    }
}
