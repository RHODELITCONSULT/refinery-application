<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{

    public function loginPage(){
        try{
            return view("signin-2");
        }catch(\Exception $e){
            Log::error("USER_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }
    public function login(Request $request): RedirectResponse
    {
        try {
            $rules = [
                "email"     => "required|email",
                "password"  => "required|min:3|max:255"
            ];
            $validation = Validator::make(request()->all(), $rules);
            if ($validation->fails()) {
                return back()->with("error", $validation->errors()->first());
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('index');
            }
            else{
                return back()->with("error", "Invalid Credentials");
            }
        } catch (\Exception $e) {
            Log::error("USER_ERROR: " . $e->getMessage());
            return back()->with('error', "Sorry Internal Server Error");
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard("web")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
