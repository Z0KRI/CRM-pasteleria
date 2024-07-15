<?php

namespace App\Http\Controllers;

use App\Models\Store as StoreModel;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class StoreController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = [
            'like' => ['name'],
            'query' => ['zip_code_id']
        ];

        return $this->getIndex($request, StoreModel::class, $filters);
    }

    public function store(StoreStoreRequest $request)
    {
        return $this->createElement(StoreModel::class, $request->validated());
    }

    public function show(StoreModel $store)
    {
        return $this->response($store);
    }

    public function update(UpdateStoreRequest $request, StoreModel $store)
    {
        $data = $request->validated();

        return $this->validUpdate($store, $data);
    }

    public function destroy(StoreModel $store)
    {
        return $this->deleteElement($store);
    }
}
