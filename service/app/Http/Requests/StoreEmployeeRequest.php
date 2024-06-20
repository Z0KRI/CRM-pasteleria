<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => ['required','string'],
            'paternal_surname' => ['required','string'],
            'maternal_surname' => ['string'],
            'salary' => ['numeric','regex:/^\d+(\.\d{1,2})?$/'],
            'store_id' => ['required','uuid'],
            'user_id' => ['required','uuid'],
            'job_id' => ['required','uuid'],
        ];
    }
}
