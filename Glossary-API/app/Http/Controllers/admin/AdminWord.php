<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\subCategory;
use App\Models\Word;
use Illuminate\Http\Request;

class AdminWord extends Controller
{
    public function word(){
        return view('tables.table-word');
    }

    public function updateword($id)
    {
        $word = Word::findOrFail($id);
        return view('tables.resources.word-edit', compact('word'));
    }

    public function createword(){
        $words = Word::select('letter')->get();
        $subCategories = subCategory::with('category:id,category')
        ->select('id', 'subcategory', 'category_id')
        ->get();

        $uniqueLetters = $words->pluck('letter')->unique()->sort()->values()->all();
        return view('tables.resources.word-create', compact('uniqueLetters', 'subCategories'));
    }
}
