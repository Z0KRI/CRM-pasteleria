<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

use Illuminate\Http\Request;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;

class WarehouseController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request, $model, $modelId)
    {
        return $this->getIndexPolymorph($request, Warehouse::class, 'warehouseable', $model, $modelId,);
    }

    public function store(StoreWarehouseRequest $request, $model, $modelId)
    {
        $data = $request->validated();
        $data['warehouseable_type'] = getClassName($model);
        $data['warehouseable_id'] = $modelId;
        return $this->createElement(Warehouse::class, $data);
    }

    public function show(Warehouse $warehouse)
    {
        return $this->response($warehouse);
    }

    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        return $this->validUpdate($warehouse, $request->validated());
    }

    public function destroy(Warehouse $warehouse)
    {
        return $this->deleteElement($warehouse);
    }
}
