<?php

namespace App\Http\Controllers;

use App\Models\Address\State;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStateRequest;

use App\Http\Traits\ResponseIndex;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;

class StateController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;

    public function index(Request $request)
    {
        $filters = [
            'like' => ['name']
        ];
        return $this->getIndex($request, State::class, $filters);
    }
    public function store(StoreStateRequest $request)
    {
        return $this->createElement(State::class, $request->validated());
    }

    public function show(State $state)
    {
        return $this->response($state);
    }

    public function destroy(State $state)
    {
        return $this->deleteElement($state);
    }
}
