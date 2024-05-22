<?php

namespace App\Http\Controllers\Api;

use App\Filters\SubCategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateSubCategoryRequest;
use App\Http\Requests\Api\StoreSubCategoryRequest;
use App\Http\Resources\Api\SubCategoryCollection;
use App\Http\Resources\Api\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = new SubCategoryFilter();
        $queryItems = $filter->transform($request);
        $includeWords = $request->query('includeWords');
        $subCategory = SubCategory::where($queryItems);
        if ($includeWords)
        {
            $subCategory = $subCategory->with('words');
        }

        $subCategory = $subCategory->orderBy('id', 'asc');
        return new SubCategoryCollection($subCategory->paginate()->appends($request->query()));
    }

    public function create(CreateSubCategoryRequest $request, SubCategory $subCategory)
    {
    // Obtén el 'categoryId' de la solicitud
    $categoryId = $request->input('categoryId');
    $subcategory = $request->input('subcategory');

    // Crea la subcategoría utilizando los datos de la solicitud
    $newSubCategory = $subCategory::create([
        'category_id' => $categoryId,
        'subcategory' => $subcategory // Debería ser 'subcategory' en minúscula
    ]);

    // Devuelve la nueva subcategoría como una respuesta JSON
    return (new SubCategoryResource($newSubCategory))->response()->setStatusCode(201);
    }

    public function store(StoreSubCategoryRequest $request)
    {
        return new SubCategoryResource(SubCategory::create($request->all()));
    }

    public function show(SubCategory $subCategory)
    {
        $includeWords = request()->query('includeWords');
        if($includeWords)
        {
            return new SubCategoryResource($subCategory->loadMissing('words'));
        }
        return new SubCategoryResource($subCategory);
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());
    }

    public function edit(Request $request, $id )
    {

        $subCategory = SubCategory::findOrFail($id);

        $subCategory->update([
            'subcategory' => $request->input('subCategory'),
        ]);

        return response()->json(['message' => 'parametros editados correctamente']);
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();

        return response()->json(['message' => 'sub categoria eliminada'], 204);
    }

}
