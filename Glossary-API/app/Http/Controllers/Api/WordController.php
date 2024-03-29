<?php

namespace App\Http\Controllers\Api;

use App\Filters\WordFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BulkStoreWordRequest;
use App\Http\Resources\Api\WordCollection;
use App\Http\Resources\Api\WordResource;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WordController extends Controller
{
    /*
    i maked the same than CategoryController
     */
    public function index(Request $request)
    {
        $filter = new WordFilter();
        $queryItems = $filter->transform($request);
        if(count($queryItems) == 0)
        {
            return new WordCollection(Word::paginate());
        }
        else
        {
            $words = Word::where($queryItems)->paginate();
            return new WordCollection($words->appends($request->query()));
        }
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
    public function store(Request $request)
    {
        //
    }

        /*
    i insert a words with method bulk
    */
    public function bulkStore(BulkStoreWordRequest $request)
    {
        $bulk = collect($request->all())->map(function($arr, $key)
        {
            return Arr::except($arr, ['categoryId']);
        });

        Word::insert($bulk->toArray());
    }


    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return new WordResource($word);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id )
    {

        $word = Word::findOrFail($id);

        $word->update([
            'word' => $request->input('word'),
            'definition' => $request->input('definition'),
        ]);

        return response()->json(['message' => 'parametros editados correctamente']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Word $word)
    {
        $word->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete();

        return to_route('table.word')->with(['message' => 'palabra eliminada']);
    }
}
