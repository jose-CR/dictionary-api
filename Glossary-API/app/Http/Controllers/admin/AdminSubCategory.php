<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;

class AdminSubCategory extends Controller
{
    public function subcategory(){
        return view('tables.table-subcategory');
    }

    public function updatesubcategory($id){
        $subcategory = SubCategory::findOrFail($id);

        return view('tables.resources.subcategory-edit', compact('subcategory'));
    }

    public function createsubcategory(){
        $categories = Category::all();
        return view('tables.resources.subcategory-create', compact('categories'));    
    }
}
