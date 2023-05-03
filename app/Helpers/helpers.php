<?php
namespace App\Helpers;

use App\Models\PackageLevel;
use App\Models\PageSetting;
	use App\Models\Team;
    use App\Models\UserFund;
    use App\Models\UserTransaction;
	use Illuminate\Support\Facades\Auth;
	use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;

class Helpers
{
	public static  function uploadMedia($file, $path)
	{
	    $name = microtime() . '.' . $file->getClientOriginalExtension();
	    $file->move($path, $name);
	    return $path . '/' . $name;
	}
	public static  function setting($key)
	{
	    $setting = PageSetting::pluck('value', 'name');
	    return $setting[$key] ?? '';
	}
	public static  function team()
	{
	    $team = Team::get();
	    return $team ?? '';
	}
	public static  function getWalletAmount(){
		$walletAmount = UserFund::where('user_id', Auth::user()->id)->sum('amount') - UserTransaction::where('user_id', Auth::user()->id)->sum('amount');
        return $walletAmount;
	}
	public static  function members($id)
    {
        return $dd=User::where('referral_id',$id)->get();
    } 

	public static  function ordinal($number) {
		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
		if ((($number % 100) >= 11) && (($number%100) <= 13))
			return $number. 'th';
		else
			return $number. $ends[$number % 10];
	}

	public static  function getFundPercentage($user_id , $type){
		$parents = User::where('id',$user_id)->first();
        $parents = $parents->listParents();
        $parents = !empty($parents) ? count($parents) : $parents;
        $level = ordinal($parents);
		$package = UserPackage::where(['user_id'=>$user_id , 'status'=>'1'])->first()->pluck('package_id')->toArray();
        $packageLevel = PackageLevel::where(['package_id'=>$package,'level'=>$level])->first()->toArray();
        $profit = $packageLevel[$type];
		return $profit;
	}
	//Example Usage
    public static  function calculateEndPackageDate($startDate,$endDate)
    {
    	$start_date =Carbon::createFromFormat('d-m-Y',$startDate);
        $end_date = Carbon::createFromFormat('d-m-Y',$endDate);
        $days = $start_date->diffInDays($end_date);
        $months = $start_date->diffInMonths($end_date);
        $minutes = $start_date->diffInMinutes($end_date);
        return $months." Months ". $days." Days ". $minutes ." Minutes";
    }

	public static  function getUserPackage($user_id){
		$package = UserPackage::where(['user_id'=>$user_id , 'status'=>'1'])->with('package')->first();
		return $package;
	}
}
?>
