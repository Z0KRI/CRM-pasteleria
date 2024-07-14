<?php

namespace App\Http\Controllers;

use App\Models\Address\City;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCityRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class CityController extends Controller
{

    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = [
            'like' => ['name'],
            'query' => ['state_id']
        ];
        return $this->getIndex($request, City::class, $filters);
    }

    public function store(StoreCityRequest $request)
    {
        return $this->createElement(City::class, $request->validated());
    }

    public function show(City $city)
    {
        return $this->response($city);
    }

    public function destroy(City $city)
    {
        return $this->deleteElement($city);
    }
}
