<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
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

    public function subcategory()
    {
        $subCategory = SubCategory::paginate(10);
        $categories  = Category::select('category', 'id')->get();
    
        $subCategoryData = $subCategory->map(function ($subCategory) {
            return [
                'id' => $subCategory->id,
                'subcategory' => $subCategory->subcategory,
            ];
        });
        $uniqueLetters = $categories->pluck('category')->unique()->sort()->values()->all();
        return view('tables.subcategorytable', compact('subCategoryData', 'subCategory', 'uniqueLetters', 'categories'));
    }

    public function word()
    {
        $word = Word::paginate(10);
        $words = Word::select('letter')->get();
        $subCategories = SubCategory::select('subcategory', 'id')->get();
    
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
        return view('tables.wordtable', compact('wordData', 'word', 'uniqueLetters', 'subCategories'));
    }
}
