<?php

namespace App\Http\Controllers\Api;

use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorecategoryRequest;
use App\Http\Requests\Api\UpdatecategoryRequest;
use App\Http\Resources\Api\CategoryCollection;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    here i filter the categories and return the categories with words
     */
    public function index(Request $request)
    {
        $filter = new CategoryFilter();
        $queryItems = $filter->transform($request);
        $includeSubCategories = $request->query('includeSubCategories');
        $categories = Category::where($queryItems);
        if($includeSubCategories)
        {
            $categories = $categories->with('subcategory');
        }
        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    /*
    i show the words of the category
     */
    public function show(Category $category)
    {
        $includeSubCategories = request()->query('includeSubCategories');
        if($includeSubCategories)
        {
            return new CategoryResource($category->loadMissing('subcategory'));
        }
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryRequest $request, Category $category)
    {
        $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
