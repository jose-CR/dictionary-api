<?php

namespace App\Http\Controllers\Api;

use App\Filters\WordFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BulkStoreWordRequest;
use App\Http\Requests\Api\CreateWordRequest;
use App\Http\Requests\Api\StoreWordRequest;
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
            $words = $words->orderBy('id', 'asc');
        }
    }

    public function create(CreateWordRequest $request, Word $word)
    {
        $newWord = $word::create($request->all());
        return (new WordResource($newWord))->response()->setStatusCode(201);
    }
    
    public function bulkStore(BulkStoreWordRequest $request)
    {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['subCategoryId']);
        });
    
        Word::insert($bulk->toArray());
    }

    public function show(Word $word)
    {
        return new WordResource($word);
    }

    public function edit(StoreWordRequest $request, $id )
    {

        $word = Word::findOrFail($id);

        $word->update([
        /*  'letter' => $request->input('letter'), */
            'sub_category_id' => $request->input('sub_category_id'),
            'word' => $request->input('word'),
            'definition' => $request->input('definition'),
            'sentence' => $request->input('sentence'),
            'spanish_sentence' => $request->input('spanish_sentence')
        ]);

        return response()->json(['message' => 'parametros editados correctamente']);
    }


    public function update(StoreWordRequest $request, Word $word)
    {
        $word->update($request->all());
    }

    public function destroy(Word $word)
    {
        $word->delete();

        return response()->json(['message' => 'palabra eliminada'], 204);
    }
}
