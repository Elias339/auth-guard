<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = \Hash::make($request->password);
        $save = $customer->save();

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
           'email'=>'required|email|exists:customers,email',
           'password'=>'required|min:5|max:30'
        ],
        [
            'email.exists'=>'This email is not exists on customers table'
        ]);

        $crads = $request->only('email','password');
        if(Auth::guard('web')->attempt($crads)){
            return redirect()->route('customer.home');
        }
        else{
            return redirect()->route('customer.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('customer.home');
    }
}
