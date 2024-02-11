<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deliveryman;
use Illuminate\Support\Facades\Auth;

class DeliverymanController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $deliveryman = new Deliveryman();
        $deliveryman->name = $request->name;
        $deliveryman->email = $request->email;
        $deliveryman->password = \Hash::make($request->password);
        $deliveryman->phone = $request->phone;
        $deliveryman->profile = $request->profile;
        $deliveryman->latitude = $request->latitude;
        $deliveryman->longitude = $request->longitude;
        $deliveryman->kyc_img = $request->kyc_img;
        $deliveryman->kyc_number = $request->kyc_number;

        $deliveryman->total_commission = $request->total_commission;
        $deliveryman->available_balance = $request->available_balance;
        $deliveryman->pending_withdrawal = $request->pending_withdrawal;
        $deliveryman->withdrawal = $request->withdrawal;
        $deliveryman->rating = $request->rating;

        $save = $deliveryman->save();

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
           'email'=>'required|email|exists:deliverymen,email',
           'password'=>'required|min:5|max:30'
        ],
        [
            'email.exists'=>'This email is not exists on deliveryman table'
        ]);

        $crads = $request->only('email','password');
        if(Auth::guard('deliveryman')->attempt($crads)){
            return redirect()->route('deliveryman.home');
        }
        else{
            return redirect()->route('deliveryman.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('deliveryman')->logout();
        return redirect()->route('deliveryman.login');
    }
}
