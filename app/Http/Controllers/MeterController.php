<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MeterController extends Controller
{
    public function index(){
        try{

            $meters = Meter::query()->orderBy('created_at','desc')->get();
            return view('meters', compact('meters'));

        }catch(\Exception $e){
            Log::error("METER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function store(Request $request){
        try{
            $rules = [
                "meter_name" =>"required|string|max:255",
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return back()->with('error', $validator->errors()->first());
            }
            $meter = Meter::query()->create([
                "name"          => $request->meter_name,
                "unique_id"=>Str::uuid()
            ]);
            if($meter){
                return back()->with('success', "Meter Created Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the creation of the meter");
            }
        }catch(\Exception $e){
            Log::error("METER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");            
        }
    }

    public function update(Request $request, $id){
        try{
            $meter = Meter::query()->where('id',$id)->update([
                "name"          => $request->meter_name,
            ]);
            if($meter){
                return back()->with('success', "Meter Updated Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the update of the meter");
            }
        }catch(\Exception $e){
            Log::error("METER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }


    public function destroy(){
        try{

            $meter_delete = Meter::query()->delete();
            if(!$meter_delete){
                return back()->with('error', "Sorry, Meter delete encountered a problem");
            }
            return back()->with('success', "Meter deleted successfully");
        }catch(\Exception $e){
            Log::error("METER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
}
