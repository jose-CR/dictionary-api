<?php

namespace App\Http\Controllers\Api;

use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCategoryRequest;
use App\Http\Requests\Api\UpdateCategoryRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CategoryFilter();
        $queryItems = $filter->transfom($request);

        $includeSubCategories = $request->query('includeSubCategories');

        $categories = Category::where($queryItems);

        if($includeSubCategories){
            $categories = $categories->with('subcategory');
        }

        $category = $categories->orderBy('id');

        $categoryPaginated = $category->paginate()->appends($request->query());


        return response()->json([
            'info' => [
                'count' => $categoryPaginated->total(),
                'pages' => $categoryPaginated->lastPage(),
                'next' => $categoryPaginated->nextPageUrl(),
                'prev' => $categoryPaginated->previousPageUrl(),
            ],
            'data' => CategoryResource::collection($categoryPaginated),
            'meta' => [
                'current_page' => $categoryPaginated->currentPage(),
                'per_page' => $categoryPaginated->perPage(),
                'from' => $categoryPaginated->firstItem(),
                'to' => $categoryPaginated->lastItem(),
                'last_page' => $categoryPaginated->lastPage(),
                'total' => $categoryPaginated->total()
            ],
            'links' => [
                'first' => $categoryPaginated->url(1),
                'prev' => $categoryPaginated->previousPageUrl(),
                'next' => $categoryPaginated->nextPageUrl(),
                'last' => $categoryPaginated->url($categoryPaginated->lastPage()),
            ],
        ]);
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
    public function store(StoreCategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    /**
     * Display the specified resource.
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}