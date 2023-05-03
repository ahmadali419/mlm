<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index(){
        $lists = Package::all();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.package.list',get_defined_vars());
        }else{
            return redirect('/');
        }
    }

    public function create(){
      return view('admin.package.create');  
    }

    public function edit(Request $request){
        $package = Package::where('id',$request->id)->first();
        return view('admin.package.create',get_defined_vars());
    }

    public function store(StorePackageRequest $request){
        $image = $old_img = null;
        if(!empty($request->image)){
            $file = $request->image;
            $old_img = $request->old_image;
            $path = 'assets/img/package';
            $name = microtime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $image = $path . '/' . $name;
            if(!empty($old_img)){
                if (\File::exists(public_path($old_img))) {
                    \File::delete(public_path($old_img));
                }
            }
        }
       Package::updateOrCreate(['id'=>$request->id],[
        'title'=>$request->title,
        'duration'=>$request->duration,
        'min_price'=>$request->min_price,
        'max_price'=>$request->max_price,
        'description'=>$request->description,
        'image'=>$image ?? $old_img,
       ]);
       
       return redirect()->route('package.list')->with('message','Package created successfully!');
    }

    public function destroy(Request $request){
       $package = Package::find($request->id);
       $package->delete();
       return redirect()->back()->with('success','Pakcage delete sucessfully!');
    }
    
}
