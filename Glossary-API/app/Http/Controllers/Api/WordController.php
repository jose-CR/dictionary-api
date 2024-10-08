<?php

namespace App\Http\Controllers\Api;

use App\Filters\WordFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BulkWordRequest;
use App\Http\Requests\Api\StoreWordRequest;
use App\Http\Requests\Api\UpdateWordRequest;
use App\Http\Resources\Api\WordResource;
use App\Models\Word;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new WordFilter();
        $queryItems = $filter->transfom($request);
    
        $words = Word::where($queryItems);

        $word = $words->orderBy('id');
    
        $wordsPaginated = $word->paginate()->appends($request->query());
    
        return response()->json([
            'info' => [
                'count' => $wordsPaginated->total(),
                'pages' => $wordsPaginated->lastPage(),
                'next' => $wordsPaginated->nextPageUrl(),
                'prev' => $wordsPaginated->previousPageUrl(),
            ],
            'data' => WordResource::collection($wordsPaginated),
            'meta' => [
                'current_page' => $wordsPaginated->currentPage(),
                'per_page' => $wordsPaginated->perPage(),
                'from' => $wordsPaginated->firstItem(),
                'to' => $wordsPaginated->lastItem(),
                'last_page' => $wordsPaginated->lastPage(),
                'total' => $wordsPaginated->total()
            ],
            'links' => [
                'first' => $wordsPaginated->url(1),
                'prev' => $wordsPaginated->previousPageUrl(),
                'next' => $wordsPaginated->nextPageUrl(),
                'last' => $wordsPaginated->url($wordsPaginated->lastPage()),
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
    public function store(StoreWordRequest $request){
        try {
            $post = $request->isMethod('post');
            $get = $request->isMethod('get');
            $word = Word::create($request->all());

            if ($request == $post) {
                return new WordResource($word);
            }
            elseif($request == $get){
            return to_route('table-word');
            }
            
        } catch (Exception $e) {
            return response()->json(['error' => 'Error creando la palabra', 'message' => $e->getMessage()], 500);
        }
    }

    public function bulkStore(BulkWordRequest $request){
        try{
            $bulk = collect($request->all())->map(function($arr, $key) {
    
            if (!isset($arr['times'])) {
                $arr['times'] = null;
            } elseif (is_array($arr['times'])) {
                $arr['times'] = json_encode($arr['times']);
            }

                return Arr::except($arr, ['subCategoryId', 'spanishSentence']);
            });
        
            Word::insert($bulk->toArray());   
        } catch (Exception $e){
            return response()->json(['error' => 'Error creando la palabra', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return new WordResource($word);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word){
        try {
            $word->update($request->all());

            if($request->wantsJson()){
                return response()->json(['message' => 'Word updated successfully'], 200);
            }
            return to_route('table-word');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating word',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word, Request $request)
    {
        $word->delete();

        if($request->wantsJson()){
            return response()->json(['message' => 'Word deleted successfully'], 200);
        }

        return to_route('table-word');
    }
}