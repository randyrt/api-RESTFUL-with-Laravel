<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'string'],
            'customer_id' => ['integer'],
            'status' => ['required','string'],
            'billed_date' => ['required', 'string'],
            'paided_date' => ['required', 'string'],
        ];
    }

    /**
     * Summary of failedForValidation
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    public function failedForValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Error for validation',
            'errorList' => $validator->errors()
        ]));
    }

    /**
     * Summary of messageRequiredErros
     * @return string[]
     */
    public function messageRequiredErros()
    {
        return [
            'amount.required' => 'name is required',
            'status.required' => 'status is required',
            'billed_date.required' => 'billed_date is required',
            'paided_date.required' => 'paided_date is required'
        ];
    }

    /**
     * Summary of messageStringErrors
     * @return string[]
     */
    public function messageStringErrors()
    {
        return [
            'amount.string' => 'amount must be a string',
            'status.string' => 'status must be a string',
            'customer_id.integer' => 'customer_id must be integer',
            'billed_date.string' => 'billed_date must be a string',
            'paided_date.string' => 'city must be a string'
        ];
    }
}
