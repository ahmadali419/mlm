<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserFund;
use App\Models\UserTransaction;
use App\Models\UserWithdrawRequest;
use Auth;
class WithdrawController extends Controller
{
    public function index(){
        $lists = UserWithdrawRequest::with(["user"=>function($query){
            $query->select("id","name","email","phone","address");
        }])->with('details',function($detail){
            $detail->select("id","user_id","wallet_address");
        })->get();
        return view('admin.withdraw.list',get_defined_vars());
    }

    public function updateStatus(Request $request){
        $userRequest = UserWithdrawRequest::where('id',$request->id)->first();
        $query = UserWithdrawRequest::where('id',$request->id)->update(['status'=>$request->status]);
        if($query){
            // if($request->status == 'approved' ){
            //     UserTransaction::create(['user_id'=>$userRequest->user_id , 'type' => ucfirst($userRequest->type) , 'amount' => $userRequest->amount , 'withdraw_status'=>'1','status'=>'approved']);
            // }
            return redirect()->back()->with('message','User '.ucfirst($request->status).'  successfully!');
        }else{
            return redirect()->back()->with('message','Something went wrong');
        }
    }
}