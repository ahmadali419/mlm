<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserFund;
use App\Models\UserWithdrawRequest;
use App\Models\UserTransaction;
use Validator;

class DashboardController extends Controller
{
    protected function index()
    {
        $user = Auth::user();
        $totalFund = UserFund::where('user_id',Auth::user()->id)->where("status",1)->sum('amount');
        $totalReferral = User::where('referral_id',Auth::user()->id)->count();
        $totalWithdraw = UserWithdrawRequest::where(['user_id'=>Auth::user()->id,'status'=>'approved'])->sum('amount');
        $referralLink = request()->getSchemeAndHttpHost().'/referral/TGT'.$user->id;
        $referrals = User::where('referral_id',Auth::id())->with('deposit')->select('id','name','created_at')->latest()->limit(6)->get();
        
        $userTransactions = UserTransaction::where('user_id',Auth::user()->id)->get();
        $profit = $userTransactions->where('type','Profit')->where('withdraw_status',0)->sum('amount') - $userTransactions->where('type','Profit')->where('withdraw_status',1)->sum('amount');
        $investment = $userTransactions->where('type','Investment')->where('withdraw_status',0)->sum('amount')  - $userTransactions->where('type','Investment')->where('withdraw_status',1)->sum('amount');
        $roi = $userTransactions->where('type','Roi')->where('withdraw_status',0)->sum('amount') - $userTransactions->where('type','Roi')->where('withdraw_status',1)->sum('amount');
        
        return view('client.dashboard',get_defined_vars());
    }
    protected function referral($id)
    {
        return view('referral',get_defined_vars());
    }
    protected function referralRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users','regex:/^((\+92)?)(3)([0-9]{9})/'],
            // 'phone' => ['required','unique:users','regex:/^((\+92)?)(3)([0-9]{9})/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required'],
            'sponser_code' => ['required','min:7'] 
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // dd($request->all());
        $id = substr($request->sponser_code, 3);
        $userSponser = User::role("client")->where("id",$id)->first();
        if ($userSponser) {
            $user  = User::create([
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'sponser_code' => 'TGT'.rand(0, 9999999),
                'password' => Hash::make($request['password']),
                'referral_id' => $userSponser->id
            ]);
            $user->assignRole('client');
           
            return response()->json(["statusCode"=>200,"user"=>$user,"status"=>"success","message"=>"Referral Registered Successfully"]);
        }else{
            return response()->json(["statusCode"=>201,"user"=>null,"status"=>"error","message"=>"Sponsor code not found"]);
        }
    }
}
