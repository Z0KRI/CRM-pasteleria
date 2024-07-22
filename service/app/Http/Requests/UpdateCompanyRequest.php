<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string'],
            'address' => ['string'],
            'opening_date' => ['date'],
            'rfc' => ['string'],
            'slogan' => ['string'],
            'logo' => ['string'],
            'zip_code_id' => ['uuid'],
        ];
    }
}
