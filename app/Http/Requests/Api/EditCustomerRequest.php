<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditCustomerRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string']
        ];
    }

    /**
     * Summary of failedForValidation
     * @param \Illuminate\Validation\Validator $validator
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
            'name.required' => 'name is required',
            'type.required' => 'type is required',
            'address.required' => 'address is required',
            'city.required' => 'city is required',
            'postal_code.required' => 'postal code is required',
        ];
    }

    /**
     * Summary of messageStringErrors
     * @return string[]
     */
    public function messageStringErrors()
    {
        return [
            'name.string' => 'name must be a string',
            'type.string' => 'type must be a string',
            'address.string' => 'address must be a string',
            'address.unique.customers' => 'address already exist, find an other !',
            'city.string' => 'city must be a string',
            'postal_code.string' => 'postal code must be a string',
        ];
    }
}