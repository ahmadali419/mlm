<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Package;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $packages;
    public function __construct()
    {
        $this->packages =  Package::with(['levels'=>function($q){
            $q->orderBy('level');
        }])->get();
    }
    public function index()
    {
        $packages = $this->packages;
      
        return view('home',get_defined_vars());
    }
    public function saveContact(Request $request)
    { 
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "title" => $request->subject,
            "message" => $request->message
        ]);
        return "OK";
    }

    public function plan(){
        $packages = $this->packages;
        return view('plans',get_defined_vars());
    }
    public function verifyAccount($user_id)
    {
        $user = User::find($user_id);
        $user->phone_verified = 1;
        $user->update();
        return $user;
    }
    public function verifyLoginAccount($user_id)
    {
        $user = User::find($user_id);
        $user->phone_verified = 1;
        $user->update();
        $user = User::where('id', $user->id)->first();
        if ($user) {
            Auth::login($user);
            return "success";
        }
        return "error";
    }
}
