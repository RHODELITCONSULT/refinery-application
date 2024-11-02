<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        try{
            $products = Product::query()->orderBy('created_at','desc')->get();
            return view('product-list',compact('products'));

        }catch(\Exception $e){
            Log::error("PRODUCT_LIST_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function create(){
        return view('add-product');
    }

    public function store(Request $request){
        try{
            $request->validate([
                'name'=>'required',
            ]);
            $product_exist = Product::query()->where('name',$request->name)->first();
            if($product_exist){
                return back()->with('error', "Product already exist");
            }
            Product::create([
                'name'=>$request->name,
                'unique_id'=>Str::uuid(),
            ]);
            return back()->with('success', "Product added successfully");
        }catch(\Exception $e){
            Log::error("PRODUCT_LIST_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'name'=>'required',
            ]);
            $product_update = Product::query()->where('id',$id)->update([
                'name'=>$request->name,
            ]);
            if(!$product_update){
                return back()->with('error', "Sorry, Product update encountered a problem");
            }
            return back()->with('success', "Product updated successfully");
        }catch(\Exception $e){
            Log::error("PRODUCT_LIST_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }

    public function destroy($id){
        try{
            $product_delete = Product::query()->where('id',$id)->delete();
            if(!$product_delete){
                return back()->with('error', "Sorry, Product delete encountered a problem");
            }
            return back()->with('success', "Product deleted successfully");
        }catch(\Exception $e){
            Log::error("PRODUCT_LIST_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }
}
