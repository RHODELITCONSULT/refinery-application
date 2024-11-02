<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profilePage(){
        try{
            return view("profile");

        }catch(\Exception $e){
            Log::error("USER_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function profileUpdate(Request $request){
        try{
            $request->validate([
                'first_name'    => 'required',
                'last_name'     => 'required',
                'email'         => 'required|email',
                "phone_number"  => 'required|string',
            ]);
            $user = User::query()->where('id', Auth::guard("web")->user()->id)->update([
                'first_name'    =>$request->first_name,
                'last_name'     =>$request->last_name,
                'email'         =>$request->email,
                'phone_number'  =>$request->phone_number,
            ]);
            if($user){
                return back()->with('success', "Profile Updated Successfully");
            }else{
                return back()->with('error', "Sorry, Profile update encountered a problem");
            }
        }catch(\Exception $e){
            Log::error("USER_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function updatePassword(Request $request){
        try{
            $request->validate([
                'password'      => 'required|min:3|confirmed|max:255',
            ]);
            $user = User::query()->where('id', Auth::guard("web")->user()->id)->update([
                'password'  => Hash::make($request->password),
            ]);
            if($user){
                Auth::guard("web")->logout();
                $request->session()->invalidate();
                return redirect("/login")->with('success', "Password Updated Successfully. Please Login Again");
            }else{
                return back()->with('error', "Sorry, Password update encountered a problem");
            }
        }catch(\Exception $e){
            Log::error("USER_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
}
