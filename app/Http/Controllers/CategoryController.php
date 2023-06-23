<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'category' => 'required|unique:categories|max:255',
        ]);

        if($validated){
            // create category
            $category = new Category;
            $category->category_name = $request->input('category');
            $category->save();

            return response()->json(['status'=>true]);
        }
    }
}