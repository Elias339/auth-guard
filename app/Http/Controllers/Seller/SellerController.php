<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = \Hash::make($request->password);
        $seller->phone = $request->phone;
        $seller->latitude = $request->latitude;
        $seller->longitude = $request->longitude;
        $seller->kyc_img = $request->kyc_img;
        $seller->kyc_number = $request->kyc_number;
        $seller->restaurant_name = $request->restaurant_name;
        $seller->address = $request->address;
        $seller->restaurant_profile = $request->restaurant_profile;
        $seller->restaurant_banner = $request->restaurant_banner;
        $seller->restaurant_email = $request->restaurant_email;
        $seller->restaurant_phone = $request->restaurant_phone;

        $save = $seller->save();

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
           'email'=>'required|email|exists:sellers,email',
           'password'=>'required|min:5|max:30'
        ],
        [
            'email.exists'=>'This email is not exists on seller table'
        ]);

        $crads = $request->only('email','password');
        if(Auth::guard('seller')->attempt($crads)){
            return redirect()->route('seller.home');
        }
        else{
            return redirect()->route('seller.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login');
    }
}
