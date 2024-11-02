<?php

namespace App\Http\Controllers;

use App\Models\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemperatureController extends Controller
{
    public static function getTemperature(){
        $temperatures = Temperature::query()->latest("temperature")->first() ?? null;
        return $temperatures;
    }

    public function store(Request $request){
        try{
            $rules = ["temperature"=>"required|numeric"];
            $validation = Validator::make($request->all(), $rules);
            if($validation->fails()){
                return back()->with('error', $validation->errors()->first());
            }
            $temperature = Temperature::query()->first();
            if($temperature){
                $temperature->temperature = $request->temperature;
                $temperature->save();
            }
            else{
                $temperature = new Temperature();
                $temperature->temperature = $request->temperature;
                $temperature->save();
            }
            return back()->with('success', "Temperature Added Successfully");

        }catch(\Exception $e){
            Log::error("TEMPERATURE_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
}
