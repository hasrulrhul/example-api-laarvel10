<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UserRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Failed to validation
     */
    protected function failedValidation(Validator $validator)
    {
        $res = new JsonResponse([
            'message' => $validator->errors(),
        ], 400);

        throw new ValidationException($validator, $res);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:3|max:50',
            'role_id' => 'required|numeric',
        ];
    }
}
