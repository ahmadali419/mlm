<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;
use Auth;
use App\Models\UserFund;
use App\Models\UserWithdrawRequest;

class AdminController extends Controller
{
    protected function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $clients = User::role('client')->latest()->limit(6)->get();
            $totalClientCurrentMonth = User::role('client')->whereMonth('created_at', Carbon::now()->month)->count();
            $totalClient = User::role('client')->count();
            $todayClient = User::role('client')->whereDate('created_at', Carbon::today())->count();
            $todayDeposit = UserFund::whereDate('created_at', date('Y-m-d'))->sum('amount');
            $totalDeposit = UserFund::sum('amount');
            $topDeposit = UserFund::with(["user"=>function($query){
                $query->select("id","name","email","phone","address");
            }])->orderBy('amount','DESC')->limit(6)->get();
            $topWithdraw = UserWithdrawRequest::with(["user"=>function($query){
                $query->select("id","name","email","phone","address");
            }])->with('details',function($detail){
                $detail->select("id","user_id","wallet_address");
            })->orderBy('amount','DESC')->limit(6)->get();
            return view('admin.dashboard',get_defined_vars());
        }else{
            return redirect('/');
        }
    }
    protected function package()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('admin.package');
        }else{
            return redirect('/');
        }
    }
    protected function addNewPackage()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('admin.addpackage');
        }else{
            return redirect('/');
        }   
    }
    protected function registerUser()
    {
        if (Auth::user()->hasRole('admin')) {
            $clients = User::role('client')->get();
            return view('admin.registeruser',compact('clients'));
        }else{
            return redirect('/');
        }   
    }
    protected function blockedUser()
    {
        if (Auth::user()->hasRole('admin')) {
            $clients = User::where('status','Reject')->role('client')->get();
            return view('admin.registeruser',compact('clients'));
        }else{
            return redirect('/');
        }   
    }
    protected function contactUs()
    {
        if (Auth::user()->hasRole('admin')) {
            $contacts = Contact::latest()->get();
            return view('admin.contacts',compact('contacts'));
        }else{
            return redirect('/');
        }   
    }

    public function viewUserDetail($id){
        $userDetail = User::with('userAccountDetail')->find($id);
        return view('admin.viewUserDetail',get_defined_vars());
    }

    public function updateStatus(Request $request){
        if(!empty($request->status) && !empty($request->id)){
          $query  =  User::where(['id'=>$request->id])->update(['status'=>$request->status]);
          if($query){
                  return redirect()->back()->with('message','User '.$request->status.'  successfully!');
          }else{
            return redirect()->back()->with('error','Sorry you cannot update status');
          }
        }
    }

    public function userPackages(){
       $lists = User::with('userPackages')->get();
       return view('admin.user.package.list',get_defined_vars());
    }
    public function userReferralPackages($id){
        $lists = User::where("referral_id",$id)->with('userPackages')->get();
        return view('admin.user.package.referral',get_defined_vars());
    }
    protected function userList()
    {
        $clients = User::role('client')->with('deposit',function($query){
            $query->select("id","amount");
        })->get();
        return view('admin.genealogy.index',get_defined_vars());
    }
    protected function userLevel($id)
    {
        $clients=User::where('referral_id',$id)->with('deposit',function($query){
            $query->select("id","amount");
        })->get();
        return view('admin.genealogy.level',get_defined_vars());
    }
}
