<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ObjectManipulation;
use App\Http\Traits\ResponseIndex;

class CategoryController extends Controller
{
    use SuccessResponse, ObjectManipulation, ResponseIndex;
    
    public function index(Request $request)
    {
        $filters = [
            'like' => ['name']
        ];

        return $this->getIndex($request, Category::class, $filters, "id", "desc", CategoryResource::class);
    }

    public function store(StoreCategoryRequest $request)
    {
        return $this->createElement(Category::class, $request->validated());
    }

    public function show(Category $category)
    {
        return $this->response($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        return $this->validUpdate($category, $data);
    }

    public function destroy(Category $category)
    {
        return $this->deleteElement($category);
    }
}
