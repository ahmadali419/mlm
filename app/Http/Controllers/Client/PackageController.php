<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Package;
use App\Models\User;
use App\Models\UserFund;
use App\Models\UserPackage;
use App\Models\UserTransaction;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use PDO;
use PharIo\Manifest\Author;

class PackageController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $packages;
    public function __construct()
    {
        $this->packages =  Package::with(['levels' => function ($q) {
            $q->orderBy('level');
        }])->get();
    }
    protected function index()
    {
        $user = Auth::user();
        $packages = $this->packages;
        return view('client.package', get_defined_vars());
    }

    public function addPacakge($id)
    {
        $packageDetail = Package::where('id', $id)->first();
        $isApproved =  User::where('id',Auth::user()->id)->where('status','Approved')->first();
        if($isApproved){
            $alreadyPurchased = UserPackage::where(['user_id' => Auth::user()->id, 'package_id' => $id])->first();
            if (empty($alreadyPurchased)) {
                $walletAmount =  getWalletAmount();
                return view('client.package.create', get_defined_vars());
            } else {
                return redirect()->back()->with('message', 'You have already purchased this package!');
            }
        }else{
            return redirect()->back()->with('message', 'Sorry your profile did not approved yet so you cannot purchase this package!');
        }
    }

    public function storePackageDetail(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required',
            'transaction_id' => 'required',
        ]);


        $walletAmount =  getWalletAmount();
        if (!empty($walletAmount)) {
            $packageDetail  = Package::where('id', $request->package_id)->where('max_price', '<=', $walletAmount)->first();
            if (!empty($packageDetail)) {
                $addPackage  = UserPackage::create([
                    'package_id' => $request->package_id,
                    'user_id' => FacadesAuth::user()->id,
                    'amount' => $request->amount,
                    'transaction_id' => $request->transaction_id
                ]);
                if ($addPackage) {
                    $walletAmount = UserTransaction::create([
                        'user_id' => Auth::user()->id,
                        'type' => 'package',
                        'amount' => $request->amount,
                    ]);
                    return redirect()->route('client.buypackage')->with('message', 'You have purchased this package successfully');
                }
            } else {
                return redirect()->back()->with('message', 'Sorry! cannot purchase this package due to low amount');
            }
        } else {
            return redirect()->back()->with('message', 'Sorry you don not have enough balance!');
        }
    }
}
