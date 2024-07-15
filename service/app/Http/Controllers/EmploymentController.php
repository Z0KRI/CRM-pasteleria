<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use App\Http\Requests\StoreEmploymentRequest;
use App\Http\Requests\UpdateEmploymentRequest;
use App\Http\Resources\EmploymentResource;
use Illuminate\Http\Request;

// Traits
use App\Http\Traits\ObjectManipulation;
use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;

class EmploymentController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = ["query" => ["name"]];

        return $this->getIndex($request, Employment::class, $filters, "id", "desc", EmploymentResource::class); 
    }

    public function store(StoreEmploymentRequest $request)
    {
        return $this->createElement(Employment::class, $request->validated());
    }

    public function show(Employment $employment)
    {
        return $this->response(EmploymentResource::make($employment));
    }

    public function update(UpdateEmploymentRequest $request, Employment $employment)
    {
        $data = $request->validated();

        return $this->validUpdate($employment, $data);
    }

    public function destroy(Employment $employment)
    {
        return $this->deleteElement($employment);
    }
}