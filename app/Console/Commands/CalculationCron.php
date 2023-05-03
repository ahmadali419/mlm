<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Package;
use App\Models\PackageLevel;
use App\Models\User;
use App\Models\UserFund;
use App\Models\UserPackage;
use App\Models\UserTransaction;
use Carbon\Carbon;
use App\Helpers\Helpers as Helper;

class CalculationCron extends Command

{

   /**

    * The name and signature of the console command.

    *

    * @var string

    */
  protected $signature = 'calculation:cron';


   protected $user = 'calculation:cron';

   /**

    * The console command description.

    *

    * @var string

    */

   protected $description = 'Command description';

   /**

    * Create a new command instance.

    *

    * @return void

    */

   public function __construct()

   {

       parent::__construct();

   }

   /**

    * Execute the console command.

    *

    * @return mixed

    */

   public function handle()

   {
       
   
     $depositPercentage = null;
       // Deactivate packages that have expired
                   UserPackage::where('expiration_date', '<', Carbon::now())
                   ->update(['status' => 0]);
                   $day = Carbon::now()->format('D');
                   if($day != 'Sun'){
                   $users = User::get();
                   $users = $users->skip(1);
                   foreach($users as $user){ 
                    $depositProfit = UserFund::where('user_id',$user->id)->where('status',1)->latest()->first();
                   
                   
                    $dayOfTheWeek = Carbon::now()->dayOfWeek;
                    $dayOfTheWeek = $dayOfTheWeek == 0 ? 7 : $dayOfTheWeek;
                  
                    if($depositProfit){
                    $depositPercentage = $depositProfit->deposit_percentage / $dayOfTheWeek;
                    $depositPercentage = $depositPercentage ;
                    UserTransaction::create(['user_id'=>$user->id ,'type'=>'Roi','amount'=>$depositPercentage ,'status'=>'approved']);
                    }
                    
                   }


                   $users = User::with('parent', 'children')->where('referral_id','!=','0')->get()->toArray();
                      foreach ($users as $user) {
                          $parent = $user['parent'];
                          if(!empty($parent['id'])){
                          $parentPackage = Helper::getUserPackage($parent['id']);
                          if (!empty($user['children'])) {
                              foreach ($user['children'] as $key => $children) {
                                  $level = $key + 2;
                                  $mainLevel = $key + 1;
                                  $userPackage = Helper::getUserPackage($user['id']);
                                  //for user refrels
                                  if (!empty($userPackage)) {
                                      if ($mainLevel > 1) {
                                          $mainLevel = Helper::ordinal($mainLevel);
                                          $packageLevel = PackageLevel::select('profit_percentage')->where([
                                              'package_id' => $userPackage->package_id,
                                              'level' => $mainLevel
                                          ])->first();
                                          if (!empty($packageLevel)) {
                                              $childDeposit = UserFund::where('user_id', $children['id'])->where('status',1)->select('deposit_percentage')->latest()->first();
                                              $profit = ($packageLevel->profit_percentage / 100) * $childDeposit->deposit_percentage;
                                              $roi = $profit;
                                              UserTransaction::create(['user_id' => $parentPackage['id'], 'type' => 'Profit', 'amount' => $roi, 'status' => 'approved', 'added_by' => $children['id']]);
                                          }
                                      }
                                  }
                                  //for parent refrels
                                  if (!empty($parentPackage)) {
                                      $chidLevel = Helper::ordinal($level);
                                      $packageLevel = PackageLevel::select('profit_percentage')->where([
                                          'package_id' => $parentPackage->package_id,
                                          'level' => $chidLevel
                                      ])->first();
                                      if (!empty($packageLevel)) {
                                          $childDeposit = UserFund::where('user_id', $children['id'])->where('status',1)->select('deposit_percentage')->latest()->first();
                                          $profit = ($packageLevel->profit_percentage / 100) * $childDeposit->deposit_percentage;
                                          $roi = $profit;
                                          UserTransaction::create(['user_id' => $parentPackage['id'], 'type' => 'Profit', 'amount' => $roi, 'status' => 'approved', 'added_by' => $children['id']]);
                                      }
                                  }
                              }
                          }
                               
                          }
                           
                      }
                    }

   }

}