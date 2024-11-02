<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        try{
            $logged_in_user = Auth::guard("web")->user();
            if(!$logged_in_user){
                return redirect()->route('login.page')->with('error','You are not allowed to access');
            }
            $users = User::query()->where('id','!=', $logged_in_user->id)->get();
            return view("users",["users" => $users]);

        }catch(\Exception $e){
            Log::error("USER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function addUser(Request $request){
        try{
            $request->validate([
                'first_name'    =>'required|string',
                'last_name'     =>'required|string',
                'phone_number'  =>'required|string',
                'email'         =>'required|email',
                'role'          =>'string',
            ]);
            $user_exist = User::query()->where('email',$request->email)->first();
            if($user_exist){
                return back()->with('error', "User already exist");
            }
            $password = Str::random(10);
            $hashed_password = Hash::make($password);
            User::create([
                'first_name'       => $request->first_name,
                'last_name'        => $request->last_name,
                'password'         => $hashed_password,
                'phone_number'     => $request->phone_number,
                'role'             => $request->role,
                'email'            => $request->email,
                'email_verified_at'=> Carbon::now()->format("Y-m-d H:i:s"),
                'remember_token'   => $password
            ]);
            return back()->with('success', "User added successfully");

        }catch(\Exception $e){
            Log::error("USER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function editUser($id, Request $request){
        try{
            $user = User::query()->where('id',$id)->update([
                'first_name'       => $request->first_name,
                'last_name'        => $request->last_name,
                'phone_number'     => $request->phone_number,
                'role'             => $request->role,
                'email'            => $request->email,
            ]);
            if($user){
                return back()->with('success', "User Updated Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the update of the user");
            }
        }catch(\Exception $e){
            Log::error("USER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function deleteUser($id){
        try{
            $user = User::query()->where('id',$id)->delete();
            if($user){
                return back()->with('success', "User Deleted Successfully");
            }else{
                return back()->with('error', "Sorry, A problem occurred during the deletion of the user");
            }
        }catch(\Exception $e){
            Log::error("USER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function changeStatus($id){
        try{
            $user = User::query()->where('id',$id)->first();
            if($user->status == "active"){
                $user->status = "inactive";
            }else{
                $user->status = "active";
            }
            $user->save();
            return back()->with('success', "User Status Updated Successfully");
        }catch(\Exception $e){
            Log::error("USER_ERROR: ".$e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
}
