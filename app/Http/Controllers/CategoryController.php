<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
        return response()->json(['data'=>$categorys],200);
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->save();

        return response()->json(['status' => true]);
    }

    public function edit($id)
    {
        $category = category::find($id);
        return response()->json($category, 200);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
    
        if ($category) {
            $category->category_name = $request->input('category_name');
            $category->save();
            return response()->json(['message' => 'อัพเดตสำเร็จ!!'], 200);
        } else {
            return response()->json(['message' => 'ไม่พบหมวดหมู่ที่ต้องการอัพเดต!!'], 422);
        }
    }
    

    public function delete($id)
{
    return Category::find($id)
        ? response()->json(['status' => 'ลบประเภทสำเร็จ!!'], 200)
        : response()->json(['status' => 'ไม่เจอไอดีที่ต้องการลบ!!'], 422);
}
}
