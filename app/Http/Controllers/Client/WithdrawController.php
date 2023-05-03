<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\UserTransaction;
use App\Models\UserWithdrawRequest;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;

class WithdrawController extends Controller
{
    protected function index()
    {
        $userTransactions = UserTransaction::where('user_id',Auth::user()->id)->get();
        $profit = $userTransactions->where('type','Profit')->where('withdraw_status',0)->sum('amount') - $userTransactions->where('type','Profit')->where('withdraw_status',1)->sum('amount');
        $investment = $userTransactions->where('type','Investment')->where('withdraw_status',0)->sum('amount')  - $userTransactions->where('type','Investment')->where('withdraw_status',1)->sum('amount');
        $roi = $userTransactions->where('type','Roi')->where('withdraw_status',0)->sum('amount') - $userTransactions->where('type','Roi')->where('withdraw_status',1)->sum('amount');
        $lists = UserWithdrawRequest::with(["user"=>function($query){
            $query->select("id","name","email","phone","address");
        }])->where('user_id',Auth::user()->id)->get();
        $bonuses = Bonus::get();
        $user = Auth::user();
        return view('client.withdraw', get_defined_vars());
    }
    protected function list()
    {
        $lists = UserWithdrawRequest::with(["user"=>function($query){
            $query->select("id","name","email","phone","address");
        }])->where('user_id',Auth::user()->id)->get();
        return view('client.deposit-withdrawal.withdraw-list',get_defined_vars());
    }

    public function withdrawRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => ['required'],
            'bonus' => ['required'],
            'g-recaptcha-response' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $bonus = Bonus::where('id', $request->bonus)->first();
        if (!empty($bonus)) {
             $withdrawRequest = null;
            if($bonus->name == 'Roi'){
                $withdrawRequest   = UserWithdrawRequest::where(['user_id' => Auth::user()->id, 'type' => $bonus->name])
                    ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"), "=", Carbon::now()->format('m'))
                    ->first();
            }
            // if(!empty($withdrawRequest)){
            $amount = UserTransaction::where(['type' => ucfirst($bonus->name), 'user_id' => Auth::user()->id , 'withdraw_status'=>'0'])->sum('amount');
            $amountWitdraw = UserTransaction::where(['type' => ucfirst($bonus->name), 'user_id' => Auth::user()->id , 'withdraw_status'=>'1'])->sum('amount');
           
            if($amountWitdraw > $amount){
                $pendingAmount = $amountWitdraw - $amount;
            }else{
                $pendingAmount = $amount - $amountWitdraw;
            }
             $serviceFee = 0;
            if($bonus->service_fee){
               
               $serviceFee =  ($bonus->service_fee / 100) * $request->amount;
               $afterServiceFeeAmount = $request->amount - $serviceFee;
            }
           
           
            if($afterServiceFeeAmount < $bonus->amount){
                  return response()->json([
                                    "statusCode" => 201,
                                    "message" => 'Sorry you cannot withdraw this amount please add more amount'
                                ]);
            }
            if ($request->amount <= $pendingAmount && !empty($pendingAmount)) {
                if (empty($withdrawRequest)) {
                    if ($request->amount >= $bonus->amount) {
                        // cut service fee
                       $serviceFee = 0;
                       if($bonus->service_fee){
                          $serviceFee = ($bonus->service_fee / $request->amount) * 100;
                       }
                        if ($request->amount > $serviceFee) {
                            $amount = $request->amount;
                       
                            $withdraw_amount = $request->amount - $serviceFee;
                            // UserTransaction::create(['user_id'=>Auth::user()->id , 'type' => ucfirst($bonus->name) , 'amount' => $request->amount , 'withdraw_status'=>'1','status'=>'approved']);
                            // $withdraw =  UserWithdrawRequest::create(['user_id' => Auth::user()->id, 'type' => $bonus->name, 'amount' => $amount,'after_withdraw_amount'=>$withdraw_amount, 'status' => 'pending']);
                            if ($withdraw_amount != 0) {
                                return response()->json([
                                    "statusCode" => 200,
                                    "user"=>Auth::user(),
                                    "message" => 'Your withdraw request send successfully!'
                                ]);
                                
                            }
                        } else {
                            return response()->json([
                                    "statusCode" => 201,
                                    "message" => 'Sorry you cannot withdraw amount'
                                ]);
                            // return redirect()->back()->with('message', 'Sorry you cannot withdraw amount');
                        }
                    } else {
                        return response()->json([
                                    "statusCode" => 201,
                                    "message" => 'Sorry you cannot withdraw amount due to low amount in your wallet'
                                ]);
                        // return redirect()->back()->with('message', 'Sorry you cannot withdraw amount due to low amount in your wallet');
                    }
                } else {
                    return response()->json([
                                    "statusCode" => 201,
                                    "message" => 'Attention R.O.I &  Profit will be paid once in a month'
                                ]);
                    // return redirect()->back()->with('message', 'Attention R.O.I &  Profit will be paid once in a month');
                }
            } else {
                return response()->json([
                                    "statusCode" => 201,
                                    "message" => 'Sorry you do not have enough amount'
                                ]);
                // return redirect()->back()->with('message', 'Sorry you don not have enough amount');
            }
            // }else{
            //     return redirect()->back()->with('message','Attention R.O.I &  Profit will be paid once in a month');
            // }
        }
    }
    public function withdrawCreate(Request $request)
    {
        $bonus = Bonus::where('id', $request->bonus)->first();
        $amount = $request->amount;
        $serviceFee = 0;
        $afterServiceFee = 0;
        if($bonus->service_fee){
            $serviceFee = ($bonus->service_fee / 100) * $amount;
           
            $afterServiceFee = $amount - $serviceFee;
         }
      
        $withdraw =  UserWithdrawRequest::create(['user_id' => Auth::user()->id, 'type' => $bonus->name,'after_withdraw_amount'=>$afterServiceFee, 'amount' => $amount, 'status' => 'pending']);
        UserTransaction::create(['user_id'=>Auth::user()->id , 'type' => ucfirst($bonus->name) , 'amount' => $amount , 'withdraw_status'=>'1','status'=>'approved']);
        return response()->json([
            "statusCode" => 200,
            "message" => 'Your withdraw request send successfully!'
        ]);
    }
}
