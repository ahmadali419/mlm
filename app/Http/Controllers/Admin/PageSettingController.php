<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Team;

class PageSettingController extends Controller
{
    protected function index()
    {
        return view('admin.pagesetting.banner');
    }
    protected function leftTextSection()
    {
        return view('admin.pagesetting.lefttextsection');
    }
    protected function rightTextSection()
    {
        return view('admin.pagesetting.righttextsection');
    }
    protected function callToActionSection()
    {
        return view('admin.pagesetting.calltoaction');
    }
    protected function contactUsSection()
    {
        return view('admin.pagesetting.contact-us');
    }
    protected function teamSection()
    {
        return view('admin.pagesetting.team');
    }
    protected function saveTeam(Request $request)
    {
        $team = new Team();
        $team->name = $request->member_name;
        $team->designation = $request->designation;
        $team->twitter_link = $request->twitter_link;
        $team->facebook_link = $request->facebook_link;
        $team->instagram_link = $request->instagram_link;
        $team->linkedin_link = $request->linkedin_link;
        $name = uploadMedia($request->profile_pic,'uploads/settings');
        $team->profile_pic = $name;
        $team->save();
        return redirect()->back()->with('success','Team Created successfully!');
    }
    protected function store(Request $request)
    {
        // dd($request->all());
        $setting = $request->except('_token');
        foreach ($setting as $key => $value) {
            if (empty($value))
            continue;
                $set = PageSetting::where('name', $key)->first() ?: new PageSetting();
                $set->name = $key;
                if ($request->hasFile($key)) {
                    $existing = PageSetting::where('name', '=', $key)->first();
                    if ($existing) {
                        if (\File::exists(public_path($existing->value))) {
                            \File::delete(public_path($existing->value));
                        }
                    }
                }
                $set->value = $value;
                $set->save();
                if ($request->hasFile($key)) {
                    $existing = PageSetting::where('name', '=', $key)->first();
                    $image = $request->file($key);
                    $name = uploadMedia($image,'uploads/settings');
                    PageSetting::where('name', '=', $key)->update([
                        'value' =>  $name
                    ]);
                }
        }
        return redirect()->back()->with('success','Settings Updated successfully!');
    }

    public function setCreditLimit(){
        return view('admin.bonus.create');
    }
}
