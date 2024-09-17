<?php

namespace App\Http\Controllers\Api;

use App\Filters\SubCategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSubCategoryRequest;
use App\Http\Requests\Api\UpdateSubCategoryRequest;
use App\Http\Resources\Api\SubCategoryResource;
use App\Models\subCategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new SubCategoryFilter();
        $queryItems = $filter->transfom($request);
    
        $includeWords = $request->query('includeWords');
    
        $subCategory = SubCategory::where($queryItems);
    
        if ($includeWords) {
            $subCategory = $subCategory->with('words');
        }
    
        $subCategory = $subCategory->orderBy('id');
    
        $subCategoryPaginated = $subCategory->paginate()->appends($request->query());
    
        return response()->json([
            'info' => [
                'count' => $subCategoryPaginated->total(),
                'pages' => $subCategoryPaginated->lastPage(),
                'next' => $subCategoryPaginated->nextPageUrl(),
                'prev' => $subCategoryPaginated->previousPageUrl(),
            ],
            'data' => SubCategoryResource::collection($subCategoryPaginated),
            'meta' => [
                'current_page' => $subCategoryPaginated->currentPage(),
                'per_page' => $subCategoryPaginated->perPage(),
                'from' => $subCategoryPaginated->firstItem(),
                'to' => $subCategoryPaginated->lastItem(),
                'last_page' => $subCategoryPaginated->lastPage(),
                'total' => $subCategoryPaginated->total()
            ],
            'links' => [
                'first' => $subCategoryPaginated->url(1),
                'prev' => $subCategoryPaginated->previousPageUrl(),
                'next' => $subCategoryPaginated->nextPageUrl(),
                'last' => $subCategoryPaginated->url($subCategoryPaginated->lastPage()),
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
    public function store(StoreSubCategoryRequest $request)
    {
        return new subCategoryResource(subCategory::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subCategory = SubCategory::find($id);
    
        if (!$subCategory) {
            return response()->json(['error' => 'SubCategory not found'], 404);
        }
    
        $includeWords = request()->query('includeWords');
        if($includeWords)
        {
            return new SubCategoryResource($subCategory->loadMissing('words'));
        }
        return new SubCategoryResource($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, subCategory $subCategory)
    {
        $subCategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subCategory = subCategory::find($id);

        if($subCategory){
            $subCategory->delete();
            return response()->json(['message' => 'subCategory deleted successfully'], 200);
        }else{
            return response()->json(['message' => 'subCategory not found'], 404);
        }
    }
}
