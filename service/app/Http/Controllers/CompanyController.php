<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class CompanyController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;


    public function show(Company $company)
    {
        return $this->response($company);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        return $this->validUpdate($company, $request->validated());
    }
}
