<?php

namespace App\Http\Controllers;

use App\Models\Consignor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ConsignorController extends Controller
{
    public function index(){
        try{

            $consignors = Consignor::query()->orderBy('created_at','desc')->get();
            return view('consignor-list', compact('consignors'));

        }catch(\Exception $e){
            Log::error("CONSIGNOR_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function store(Request $request){
        try{
            $rules = [
                "consignor_name"=>"required|string|max:255",
                "contact_email" =>"required|email",
                "contact_phone" =>"required|string",
                "address"       =>"nullable|string",
                "city"          =>"nullable|string",
                "landmark"      =>"nullable|string",
            ];

            $validation = Validator::make($request->all(), $rules);
            if($validation->fails()){
                return back()->with('error', $validation->errors()->first());
            }

            $consignor = Consignor::query()->create([
                "consignor"     =>$request->consignor_name,
                "contact_email" =>$request->contact_email,
                "contact_number" =>$request->contact_phone,
                "address"       =>$request->address ?? null,
                "city"          =>$request->city ?? null,
                "landmark"      =>$request->landmark ?? null,
            ]);
            if($consignor){
                return back()->with('success', "Consignor Added Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the creation of the consignor");
            }

        }catch(\Exception $e){
            Log::error("CONSIGNOR_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function update(Request $request, $id){
        try{
            $consignor = Consignor::query()->where('id',$id)->update([
                "consignor"     =>$request->consignor_name,
                "contact_email" =>$request->contact_email,
                "contact_number" =>$request->contact_phone,
                "address"       =>$request->address ?? null,
                "city"          =>$request->city ?? null,
                "landmark"      =>$request->landmark ?? null,
            ]);
            if($consignor){
                return back()->with('success', "Consignor Updated Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the update of the consignor");
            }
        }catch(\Exception $e){
            Log::error("CONSIGNOR_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function destroy($id){
        try{
            $consignor_delete = Consignor::query()->where('id',$id)->delete();
            if(!$consignor_delete){
                return back()->with('error', "Sorry, Consignor delete encountered a problem");
            }
            return back()->with('success', "Consignor deleted successfully");
        }catch(\Exception $e){
            Log::error("CONSIGNOR_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }
}
