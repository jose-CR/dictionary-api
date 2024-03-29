<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function category()
    {
        $category = Category::paginate(10);
        $categories = Category::select('category')->get();
    
        $categoryData = $category->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->category,
            ];
        });
        $uniqueLetters = $categories->pluck('category')->unique()->sort()->values()->all();
        return view('tables.categorytable', compact('categoryData', 'category', 'uniqueLetters', 'categories'));
    }

    public function word()
    {
        $word = Word::paginate(10);
        $words = Word::select('letter')->get();
        $categories = Category::select('category', 'id')->get();
/*         $subCategories = SubCategory::select('subcategory_name', 'id')->get(); */
    
        $wordData = $word->map(function ($word) {
            return [
                'id' => $word->id,
                'letter' => $word->letter,
                'word' => $word->word,
                'description' => $word->definition,
            ];
        });
        $uniqueLetters = $words->pluck('letter')->unique()->sort()->values()->all();
        return view('tables.wordtable', compact('wordData', 'word', 'uniqueLetters', 'categories',));
    }
}
