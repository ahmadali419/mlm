<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageLevel;
use Illuminate\Http\Request;
use PDO;

class PackageLevelController extends Controller
{
    public function index(){
        $lists = null;
        $lists = PackageLevel::with('pacakge')->get();
        return view('admin.levels.list',get_defined_vars());
    }

    public function create(){
        $packges = Package::get();
        $lists = PackageLevel::with('pacakge')->get();
        return view('admin.levels.create',get_defined_vars());
    }

    public function edit(Request $request){
        $packges = Package::get();
        $packgeLevel = PackageLevel::find($request->id);
        return view('admin.levels.create',get_defined_vars());
    }
    public function store(Request $request){
        $id = $request->level_id;
        $validated = $request->validate([
            // 'level' => 'required|unique:package_levels,level,'.$id,
            'level' => 'required',
            'package_id' => 'required',
            'bonus_percentage' => 'required',
            'profit_percentage' => 'required',
        ]);
        
        PackageLevel::updateOrCreate(['id'=>$id],['package_id'=>$request->package_id , 'level'=>$request->level , 
        'bonus_percentage'=> $request->bonus_percentage , 'profit_percentage' => $request->profit_percentage]);
        return redirect()->route('level.list')->with('message','Package Level Added Successfully!');
    }

    public function destroy(Request $request){
        $level = PackageLevel::find($request->id);
        $level->delete();
        return redirect()->back()->with('success','Level delete sucessfully!');
     }
}
