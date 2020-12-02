<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        $adminData = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.settings', compact('adminData'));
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
}
