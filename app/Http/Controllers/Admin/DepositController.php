<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageLevel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserFund;
use App\Models\UserPackage;
use App\Models\UserTransaction;
use Carbon\Carbon;

class DepositController extends Controller
{
    protected function index()
    {
        $lists = UserFund::with(["user"=>function($query){
                    $query->select("id","name","email","phone","address");
                }])->latest()->get();
        return view('admin.deposit-withdrawal.deposit-list',get_defined_vars());
    }
    protected function approve(Request $request)
    {
        UserFund::where('id',$request->id)->update(['status'=>1]);
         $day = Carbon::now()->format('D');
       
        if(!empty($request->user_id)){
           $approveUser = User::where('id',$request->user_id)->first();
           $userFunds = UserFund::where(['user_id'=>$request->user_id ,'status'=>'1'])->get();
           $pendingAmount = $userFunds->sum('amount');
           if(!empty($pendingAmount)){
             $purchasePackage  = Package::where('min_price', '<=', $pendingAmount)->where('max_price', '>=', $pendingAmount)->first();

             $depositAmount = ($pendingAmount * 3 ) / $purchasePackage->duration;
             $depositAmount = $depositAmount / Carbon::now()->month()->daysInMonth; 
                   
             UserFund::where('id',$request->id)->update(['deposit_percentage'=>$depositAmount]);
            if($purchasePackage){
                //check user purchase any package or not
                $userPackage = UserPackage::where('package_id',$purchasePackage->id)->where('user_id',$request->user_id)->first();
                //check user how many fund transfer 
                $funds =  UserFund::where('user_id',$request->user_id)->get()->count();
                //check transfer bonus or not
                $roiAlreadyExist = UserTransaction::where('added_by',$request->user_id)->first();
              
                if(empty($roiAlreadyExist)){

                   $parent = User::where('id',$request->user_id)->first();
                   $parent_ids = $parent->listParents();  
                   $parents_ids = array_reverse($parent_ids);
               
                   if(!empty($parent_ids)){
                       foreach($parents_ids as $key=> $parent_id){
                           $level = $key+1;
                           $package = UserPackage::where(['user_id'=>$parent_id , 'status'=>'1'])->first();
                         
                           if(!empty($level)){
                               $bonus_percentage = PackageLevel::where(['package_id'=>$package->package_id ,'level'=>$level])->first();
                               if(!empty($bonus_percentage)){
                                   $depositAmount  = UserFund::where('user_id',$request->user_id)->first();
                                   $depositPercentage = ($bonus_percentage->bonus_percentage / 100) * $depositAmount->amount;
                                   UserTransaction::create(['user_id'=>$parent_id ,'type'=>'Investment' ,'amount'=>$depositPercentage, 'status'=>'approved','added_by'=>$request->user_id]);
                                
                               }
                           }
                       }
                   }
                }
                if(empty($userPackage)){
                    UserPackage::where('user_id',$request->user_id)->update(['status'=>'0']);
                    $userPackage = new UserPackage();
                    $userPackage->user_id = $request->user_id;
                    $userPackage->package_id = $purchasePackage->id;
                    $userPackage->amount = $pendingAmount;
                    $userPackage->status = '1';
                    $userPackage->expiration_date = Carbon::now()->addMonth($purchasePackage->duration)->format('Y-m-d');
                    $userPackage->save();
                }
            }
           }
        }
        return redirect()->back()->with('message', 'Transaction Approved Successfully!');
        
    }
    protected function decline($id)
    {
        UserFund::find($id)->update(['status'=>0]);
        return redirect()->back()->with('message', 'Transaction Declined Successfully!');
    }
}
