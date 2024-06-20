<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Traits\ObjectManipulation;
use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = ["query" => ["job_id","store_id"]];

        return $this->getIndex($request, Employee::class, $filters, "id", "desc", EmployeeResource::class);
    }

    public function store(StoreEmployeeRequest $request)
    {
        return $this->createElement(Employee::class, $request->validated());
    }

    public function show(Employee $employee)
    {
        return $this->response(EmployeeResource::make($employee));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();

        return $this->validUpdate($employee, $data);
    }

    public function destroy(Employee $employee)
    {
        return $this->deleteElement($employee);
    }
}
