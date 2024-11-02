<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(){
        try{
            $customers = Customer::query()->orderBy('created_at','desc')->get();
            return view('customers', compact('customers'));

        }catch(\Exception $e){
            Log::error("CUSTOMER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function store(Request $request){
        try{
            $rules = [
                "customer_name" =>"required|string|max:255",
                "contact_email" =>"nullable|email",
                "contact_phone" =>"required|string",
                "address"       =>"nullable|string",
                "city"          =>"nullable|string",
            ];

            $validation = Validator::make($request->all(), $rules);
            if($validation->fails()){
                return back()->with('error', $validation->errors()->first());
            }

            $customer = Customer::query()->create([
                "name"          =>$request->customer_name,
                "email"         =>$request->contact_email,
                "contact_number"=>$request->contact_phone,
                "address"       =>$request->address ?? null,
                "city"          =>$request->city ?? null,
            ]);
            if($customer){
                return back()->with('success', "Customer Added Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the creation of the customer");
            }
        }catch(\Exception $e){
            Log::error("CUSTOMER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function update(Request $request, $id){
        try{
            $customer = Customer::query()->where('id',$id)->update([
                "name"          =>$request->customer_name,
                "email"         =>$request->contact_email,
                "contact_number"=>$request->contact_phone,
                "address"       =>$request->address ?? null,
                "city"          =>$request->city ?? null,
            ]);
            if($customer){
                return back()->with('success', "Customer Updated Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the update of the customer");
            }
        }catch(\Exception $e){
            Log::error("CUSTOMER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function destroy($id){
        try{
            $customer_delete = Customer::query()->where('id',$id)->delete();
            if(!$customer_delete){
                return back()->with('error', "Sorry, Customer delete encountered a problem");
            }
            return back()->with('success', "Customer deleted successfully");
        }catch(\Exception $e){
            Log::error("CUSTOMER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry, Internal Server Error");
        }
    }
}
