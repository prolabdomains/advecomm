<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){

            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ];
            $customMessage = [
                'email.required' => 'Email field cannot be empty',
                'email.email'   =>  'Enter correct email in the follow format: johndoe@example.com',
                'password.required' => 'Enter your password'
            ];

            $request->validate($rules, $customMessage);

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect()->route('admin.dashboard');
            }
            else{
                $request->session()->flash('error', 'Invalid Email or Password');
                return back();
            }
        }
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.logout');
    }
}
