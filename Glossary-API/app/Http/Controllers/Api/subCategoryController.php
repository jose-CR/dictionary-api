<?php

namespace App\Http\Controllers\Api;

use App\Filters\SubCategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSubCategoryRequest;
use App\Http\Requests\Api\UpdateSubCategoryRequest;
use App\Http\Resources\Api\SubCategoryResource;
use App\Models\subCategory;
use Exception;
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
        $subCategory = subCategory::create($request->all());
    
        if ($request->wantsJson()) {
            return new subCategoryResource($subCategory);
        }
        return to_route('table-subcategory');
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
    public function update(UpdateSubCategoryRequest $request, subCategory $subCategory, $id )
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $input = $request->input('subCategory');

            if ($input && $input != $subCategory->subcategory) {
                $subCategory->update([
                    'subcategory' => $input,
                ]);
                if($request->wantsJson()){
                    return response()->json(['message' => 'Parámetros editados correctamente']);
                }
                return to_route('table-subcategory');
            } else {
                if($request->wantsJson()){
                    return response()->json(['message' => 'No hay cambios en la subcategoría']);
                }
            }
        } catch (Exception $e) {
            if($request->wantsJson()){
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $subCategory = subCategory::find($id);
    
        if ($subCategory) {
            $subCategory->delete();
    
            if ($request->wantsJson()) {
                return response()->json(['message' => 'SubCategory deleted successfully'], 200);
            }
            return to_route('table-subcategory');
        }
    
        if ($request->wantsJson()) {
            return response()->json(['message' => 'SubCategory not found'], 404);
        }
    
        return to_route('table-subcategory')->with('error', 'SubCategory not found.');
    }
}
