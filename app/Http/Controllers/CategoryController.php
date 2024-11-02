<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(){
        try{
            $categories = Category::query()->orderBy('created_at','desc')->get();
            return view('category-list',compact('categories'));

        }catch(\Exception $e){
            Log::error("CATEGORY_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function store(Request $request){
        try{
            $request->validate([
                'brv'=>'required|string',
            ]);
            $category_exist = Category::query()->where('brv',$request->brv)->first();
            if($category_exist){
                return back()->with('error', "Category already exist");
            }
            Category::create([
                'brv'=>$request->brv,
            ]);
            return back()->with('success', "Category added successfully");
        }catch(\Exception $e){
            Log::error("CATEGORY_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'brv'=>'required|string',
            ]);
            $category_exist = Category::query()->where('brv',$request->brv)->first();
            if($category_exist){
                return back()->with('error', "You have changed the category to a category that already exist");
            }
            $category_update = Category::query()->where('id',$id)->update([
                'brv'=>$request->brv,
            ]);
            if(!$category_update){
                return back()->with('error', "Sorry, Category update encountered a problem");
            }
            return back()->with('success', "Category updated successfully");
        }catch(\Exception $e){
            Log::error("CATEGORY_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function destroy($id){
        try{
            $category_delete = Category::query()->where('id',$id)->delete();
            if(!$category_delete){
                return back()->with('error', "Sorry, Category delete encountered a problem");
            }
            return back()->with('success', "Category deleted successfully");
        }catch(\Exception $e){
            Log::error("CATEGORY_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }
}
