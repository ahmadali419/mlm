<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       $user  = User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'sponser_code' => 'TGT'.rand(0, 9999999),
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('client');
        // return $user;
        return redirect()->route('verify.account', ['user_id' => $user->id]);
    }
    protected function registerClient(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','unique:users','regex:/^((\+92)?)(3)([0-9]{9})/'],
            // 'phone' => ['required','unique:users','regex:/^((\+92)?)(3)([0-9]{9})/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required'],
            'sponsor_code' => ['required','min:7'] 
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $userExist = User::where("sponser_code",$request->sponsor_code)->first();
        if($userExist){
            $user  = User::create([
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'sponser_code' => 'TGT'.rand(0, 9999999),
                'referral_id' => $userExist->id,
                'password' => Hash::make($request['password']),
            ]);
            $user->assignRole('client');
            return $user;
        }else{
            $user  = User::create([
                'name' => $request['full_name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'sponser_code' => 'TGT'.rand(0, 9999999),
                'password' => Hash::make($request['password']),
            ]);
            $user->assignRole('client');
            return $user;
        }
        // return redirect()->route('verify.account', ['user_id' => $user->id]);
    }
}
