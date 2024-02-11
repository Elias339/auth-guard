<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'role_id'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role_id = $request->role_id;
        $admin->phone = $request->phone;
        $admin->profile = $request->profile;
        $admin->designation = $request->designation;
        $admin->password = \Hash::make($request->password);
        $save = $admin->save();

        if ($save){
            return redirect()->back()->with('success','You are now registered successfully');
        }
        else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }

    }

    public function check(Request $request)
    {
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],
        [
            'email.exists'=>'This email is not exists on admin table'
        ]);

        $crads = $request->only('email','password');
        if(Auth::guard('admin')->attempt($crads)){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
