<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\UserFund;
use App\Models\User;

class DepositController extends Controller
{
    protected function index()
    {
        $user = Auth::user();
        return view('client.deposit',get_defined_vars());
    }
    protected function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'transaction_id' => 'required',
            'transaction_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300'
        ], [
            'amount.required' => 'Amount is required',
            'transaction_id.required' => 'Transaction id is required',
            'transaction_image.required' => 'Transaction Screenshot is required',
            'transaction_image.image' => 'Transaction Screenshot must be image',
            'transaction_image.max' => 'Transaction Screenshot Size must be 300KB',
        ]);
        if($request->hasFile('transaction_image')){
            $file = $request->transaction_image;
            $path = 'uploads/clients/transaction';
            $name = microtime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $image = $path . '/' . $name;
        }
         UserFund::create([
                "user_id" => Auth::user()->id,
                "wallet_address" => $request->wallet_address,
                "amount" => $request->amount,
                "transaction_id" => $request->transaction_id,
                "transaction_image" => $image ?? ""
            ]);
           

        return redirect()->back()->with('message', 'Deposit Successfully');
    }
    protected function list()
    {
        $lists = UserFund::where('user_id',Auth::user()->id)->with(["user"=>function($query){
                    $query->select("id","name","email","phone","address");
                }])->latest()->get();
        return view('client.deposit-withdrawal.deposit-list',get_defined_vars());
    }
    protected function userDeposit($id)
    {
        $lists = UserFund::where('user_id',$id)->with(["user"=>function($query){
            $query->select("id","name","email","phone","address");
        }])->get();
        return view('client.deposit-withdrawal.deposit-list',get_defined_vars());
    }
    protected function approve($id)
    {
        UserFund::find($id)->update(['status'=>1]);
        return redirect()->back()->with('message', 'Transaction Approved Successfully!');
    }
    protected function decline($id)
    {
        UserFund::find($id)->update(['status'=>0]);
        return redirect()->back()->with('message', 'Transaction Declined Successfully!');
    }
}
