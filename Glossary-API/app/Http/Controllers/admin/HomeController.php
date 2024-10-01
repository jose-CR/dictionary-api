<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        return response()->json([
            'categories' => route('categories.index'),
            'sucategories' => route('subcategories.index'),
            'words' => route('words.index')
        ]);
    }
}
