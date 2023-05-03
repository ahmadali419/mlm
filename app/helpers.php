<?php

use App\Models\PackageLevel;
use App\Models\PageSetting;
	use App\Models\Team;
    use App\Models\UserFund;
    use App\Models\UserTransaction;
	use Illuminate\Support\Facades\Auth;
	use App\Models\User;
use App\Models\UserPackage;

	function uploadMedia($file, $path)
	{
	    $name = microtime() . '.' . $file->getClientOriginalExtension();
	    $file->move($path, $name);
	    return $path . '/' . $name;
	}
	function setting($key)
	{
	    $setting = PageSetting::pluck('value', 'name');
	    return $setting[$key] ?? '';
	}
	function team()
	{
	    $team = Team::get();
	    return $team ?? '';
	}
	function getWalletAmount(){
		$walletAmount = UserFund::where('user_id', Auth::user()->id)->sum('amount') - UserTransaction::where('user_id', Auth::user()->id)->sum('amount');
        return $walletAmount;
	}
	function members($id)
    {
        return $dd=User::where('referral_id',$id)->get();
    } 

	function ordinal($number) {
		$ends = array('th','st','nd','rd','th','th','th','th','th','th');
		if ((($number % 100) >= 11) && (($number%100) <= 13))
			return $number. 'th';
		else
			return $number. $ends[$number % 10];
	}

	function getFundPercentage($user_id , $type){
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
    function calculateEndPackageDate($startDate,$endDate)
    {
    	$start_date = carbon\Carbon::createFromFormat('d-m-Y',$startDate);
        $end_date = carbon\Carbon::createFromFormat('d-m-Y',$endDate);
        $days = $start_date->diffInDays($end_date);
        $months = $start_date->diffInMonths($end_date);
        $minutes = $start_date->diffInMinutes($end_date);
        return $months." Months ". $days." Days ". $minutes ." Minutes";
    }
?>
