<?php

namespace App\Http\Controllers\Api;

use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorecategoryRequest;
use App\Http\Requests\Api\UpdatecategoryRequest;
use App\Http\Resources\Api\CategoryCollection;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Exception;
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

        $categories = $categories->orderBy('id', 'asc');
        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }

    /*
        y este create es para lo visual 
     */
    public function create(StorecategoryRequest $request, Category $category)
    {
        $newCategory = $category::create($request->all());
        return (new CategoryResource($newCategory))->response()->setStatusCode(201);
    }

    /*
     este store es para la api 
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
    public function edit(StorecategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
    
            $input = $request->input('category');
    
            if ($input && $input != $category->category) {
                $category->update([
                    'category' => $input 
                ]);
            }
    
            return response()->json(['message' => 'parámetros editados correctamente']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'categoria eliminada'], 204);
    }
}
