<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bonus;
use Auth;
use App\Http\Requests\StoreBonusRequest;

class BonusController extends Controller
{
    public function index()
    {
        $lists = Bonus::all();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.bonus.list',get_defined_vars());
        }else{
            return redirect('/');
        }
    }
    public function create(){
      return view('admin.bonus.create');  
    }
    public function store(StoreBonusRequest $request){
       Bonus::updateOrCreate(['id'=>$request->id],[
        'name'=>$request->name,
        'service_fee'=>$request->service_fee,
        'amount'=>$request->amount,
        'withdraw_limit'=>$request->withdraw_limit
       ]);
       return redirect()->route('bonus.list')->with('message','Bonus created successfully!');
    }
    public function edit(Request $request){
        $bonus = Bonus::where('id',$request->id)->first();
        return view('admin.bonus.create',get_defined_vars());
    }
    public function destroy(Request $request){
       $bonus = Bonus::find($request->id);
       $bonus->delete();
       return redirect()->back()->with('success','Bonus deleted Successfully!');
    }
}
