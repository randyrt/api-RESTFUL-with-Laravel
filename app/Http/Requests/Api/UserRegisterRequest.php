<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string']
        ];
    }

    public function failedForValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'status_code' => 422,
            'error' => true,
            'message' => 'Error for validation',
            'errorList' => $validator->errors()
        ]));
    }

     public function messageRequiredErros()
    {
        return [
            'name.required' => 'name is required',
            'email.required' => 'email is required',
            'password.required' => 'password is required'
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
            'email.email' => 'it\'s not an email valid',
            'email.unique' => 'email already exist, find an other',
            'password.string' => 'password is must be string'
        ];
    }

}
