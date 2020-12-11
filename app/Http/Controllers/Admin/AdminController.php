<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        return view('admin.dashboard');
    }

    public function chkCurrentPassword(Request $request)
    {
        if(Hash::check($request->chkCurrentPassword, Auth::guard('admin')->user()->password))
        {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }

    public function changePassword(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $rules = [
                'chkCurrentPassword' => 'required',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required'
            ];
            $customMessage = [
                'chkCurrentPassword.required' => 'field is required',
                'password.required' => 'field is required',
                'password.min' => 'Mininum 6 character required',
                'password.confirmed' => 'Passwords do not match',
                'password_confirmation.required' => 'field is required',
            ];

            $request->validate($rules, $customMessage);

            if(Hash::check($request->chkCurrentPassword, Auth::guard('admin')->user()->password))
            {
                $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
                $admin->password = Hash::make($request->password);
                $admin->save();
                Session::flash('flash_message', 'Password updated successfully!');
            }
            else{
                Session::flash('flash_message', 'Your current password is incorrect');
            }
            return redirect()->back();
        }

        $adminData = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        Session::put('page', 'admin_change_password');
        return view('admin.change-password', compact('adminData'));
    }

    public function changeDetails(Request $request)
    {
        if($request->isMethod('post'))
        {
            $rules = [
                'admin_name'   =>   'required|alpha|regex:/^[\pL\s\-]+$/u',
                'admin_email'   =>  'required|email',
                'admin_type'    =>  'required|alpha'
            ];
            $customMessages = [
                'admin_name.required'   => 'Name cannot be empty',
                'admin_email.required'   => 'Email cannot be empty',
                'admin_email.email'     =>  'Your email is not valid',
                'admin_type.required'   =>  'Admin type is required'
            ];
            $request->validate($rules, $customMessages);
        }
        Session::put('page', 'admin_update_details');
        return view('admin.change-details');
    }
}
