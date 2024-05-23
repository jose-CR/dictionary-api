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
use Exception;
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
        $newWord = $word::create($request->validated());
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
        try {
            $word = Word::findOrFail($id);

            $subCategory = $request->input('sub_category_id');
            $letter = $request->input('letter');
            $wordInput = $request->input('word');
            $definition = $request->input('definition');
            $sentence = $request->input('sentence');
            $spanishSentence = $request->input('spanish_sentence');
    
            $changesDetected = false;
            if ($subCategory && $subCategory != $word->sub_category_id) {
                $word->sub_category_id = $subCategory;
                $changesDetected = true;
            }
            if ($letter && $letter != $word->letter) {
                $word->letter = $letter;
                $changesDetected = true;
            }
            if ($wordInput && $wordInput != $word->word) {
                $word->word = $wordInput;
                $changesDetected = true;
            }
            if ($definition && $definition != $word->definition) {
                $word->definition = $definition;
                $changesDetected = true;
            }
            if ($sentence && $sentence != $word->sentence) {
                $word->sentence = $sentence;
                $changesDetected = true;
            }
            if ($spanishSentence && $spanishSentence != $word->spanish_sentence) {
                $word->spanish_sentence = $spanishSentence;
                $changesDetected = true;
            }
    
            if ($changesDetected) {
                $word->save();
                return response()->json(['message' => 'Parámetros editados correctamente']);
            } else {
                return response()->json(['message' => 'No hay cambios en la palabra']);
            }
    
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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