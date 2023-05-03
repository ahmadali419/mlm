<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserAccountDetail;
use App\Models\User;

class AccountController extends Controller
{
    protected function Profile()
    {
        $user = User::where("id",Auth::id())->with('parent')->first();
        return view('client.account.profile',get_defined_vars());   
    }
    protected function Setting()
    {
        $user = User::where('id',Auth::user()->id)->with('userAccountDetail','parent')->first();
        return view('client.account.setting',get_defined_vars());   
    }
    protected function saveProfile(Request $request)
    {
        if($request->hasFile('profile_pic')){
            $file = $request->profile_pic;
            $path = 'uploads/clients';
            $name = microtime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $image = $path . '/' . $name;
            $user = Auth::user();
            $user->profile_pic = $image;
            $user->update();
        }
        $newAccount = UserAccountDetail::updateOrCreate([
            'user_id'   => Auth::user()->id,
        ],[
            'bank_name' => $request->bank_name,
            'account_title' => $request->account_title,
            'account_number' => $request->account_number,
            'wallet_address' => $request->wallet_address,
        ]);
        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }
    protected function Kyc()
    {
        $user = User::where('id',Auth::user()->id)->with('userAccountDetail')->first();
        return view('client.account.kyc',get_defined_vars()); 
    }
    protected function saveKyc(Request $request)
    {
        if ($request->hasFile('cnic_front')) {
            $file = $request->cnic_front;
            $path = 'uploads/clients/cnic';
            $name = microtime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $imageFront = $path . '/' . $name;
            $user = Auth::user();
            $user->cnic_front_pic = $imageFront;
            $user->update();
        }
        if ($request->hasFile('cnic_back')) {
            $file = $request->cnic_back;
            $path = 'uploads/clients/cnic';
            $name = microtime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $imageBack = $path . '/' . $name;
            $user = Auth::user();
            $user->cnic_back_pic = $imageBack;
            $user->update();
        }
        $kycUpdate = User::updateOrCreate([
            'id'   => Auth::user()->id,
        ],[
            'name' => $request->name,
            'cnic' => $request->cnic
        ]);
        return redirect()->back()->with('message', 'Kyc Profile Updated Successfully');
    }
}
