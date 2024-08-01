<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Word;

class HomeController extends Controller
{

    public function category()
    {
        $category = Category::paginate(10);
        $categories = Category::select('category')->get();
    
        $uniqueLetters = $categories->pluck('category')->unique()->sort()->values()->all();
        return view('tables.categorytable', compact('category', 'uniqueLetters', 'categories'));
    }

    public function subcategory()
    {
        $subCategory = SubCategory::paginate(10);
        $categories  = Category::select('category', 'id')->get();
    
        $uniqueLetters = $categories->pluck('category')->unique()->sort()->values()->all();
        return view('tables.subcategorytable', compact('subCategory', 'uniqueLetters', 'categories'));
    }

    public function word()
    {
        $word = Word::paginate(10);
        $words = Word::select('letter')->get();
        $subCategories = SubCategory::with('category:id,category')
        ->select('id', 'subcategory', 'category_id')
        ->get();
    
        $wordData = $word->map(function ($word) {
            return [
                'id' => $word->id,
                'letter' => $word->letter,
                'word' => $word->word,
                'description' => is_string($word->definition) ? json_decode($word->definition, true) : $word->definition,
                'sentence' => $word->sentence,
                'spanish_sentence' => $word->spanish_sentence,
            ];
        });
        $uniqueLetters = $words->pluck('letter')->unique()->sort()->values()->all();
        return view('tables.wordtable', compact( 'word', 'uniqueLetters', 'subCategories'));
    }
}
