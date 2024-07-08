<?php

namespace App\Http\Controllers;

use App\Models\Address\ZipCode;

use Illuminate\Http\Request;
use App\Http\Requests\StoreZipCodeRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class ZipCodeController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = [
            'like' => ['code'],
            'query' => ['city_id']
        ];
        return $this->getIndex($request, ZipCode::class, $filters);
    }

    public function store(StoreZipCodeRequest $request)
    {
        return $this->createElement(ZipCode::class, $request->validated());
    }

    public function show(ZipCode $zipCode)
    {
        return $this->response($zipCode);
    }

    public function destroy(ZipCode $zipCode)
    {
        return $this->deleteElement($zipCode);
    }
}
