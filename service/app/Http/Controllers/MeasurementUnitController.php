<?php

namespace App\Http\Controllers;

use App\Models\MeasurementUnit;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMeasurementUnitRequest;
use App\Http\Requests\UpdateMeasurementUnitRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class MeasurementUnitController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = [
            'like' => ['name'],
        ];

        return $this->getIndex($request, MeasurementUnit::class, $filters);
    }

    public function store(StoreMeasurementUnitRequest $request)
    {
        return $this->createElement(MeasurementUnit::class, $request->validated());
    }

    public function show(MeasurementUnit $measurementUnit)
    {
        return $this->response($measurementUnit);
    }

    public function update(UpdateMeasurementUnitRequest $request, MeasurementUnit $measurementUnit)
    {
        $data = $request->validated();

        return $this->validUpdate($measurementUnit, $data);
    }

    public function destroy(MeasurementUnit $measurementUnit)
    {
        return $this->deleteElement($measurementUnit);
    }
}
