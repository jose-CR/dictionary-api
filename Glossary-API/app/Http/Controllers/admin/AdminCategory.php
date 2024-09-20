<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategory extends Controller
{
    public function category(){
        return view('tables.table-category');
    }

    public function updatecategory($id)
    {
        $category = Category::findOrFail($id);
        return view('tables.resources.category-edit', compact('category'));
    }

    public function createcategory(){
        return view('tables.resources.category-create');    
    }
}
