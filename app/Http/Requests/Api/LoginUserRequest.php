<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string']
        ];
    }

     public function failedForValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Error for validation',
            'errorList' => $validator->errors()
        ]));
    }

    public function messageEmailErros()
    {
        return [
            'email.required' => 'name is required',
            'email.email' => "it's not a email",
            'email.exists' => 'email invalid'
        ];
    }

    public function messagePasswordErros()
    {
        return [
            'password.required' => 'passowrd is required',
            'passord.string' => 'password must be string'
        ];
    }

    
}
