<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('optimize/clear', function () {

    /* php artisan migrate */
    \Artisan::call('optimize:clear');
    dd("Done");
});

Route::post('/webhooks/order-created', function (Illuminate\Http\Request $request) {
    // Read the request body as JSON
    $requestBody = $request->getContent();

    // Decode the JSON payload into an associative array
    $payload = json_decode($requestBody, true);

    // Write the payload to the Laravel log
    Log::channel('webhook')->info('Received order create webhook', [
        'payload' => $payload,
    ]);

    // Do something with the payload, e.g., update a database, send an email, etc.
    // ...

    // Return a response to acknowledge receipt of the webhook
    return response()->json(['message' => 'Webhook received.'], 200);
});
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('about',[App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('contact',[App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/verify/account/{user_id}',[App\Http\Controllers\HomeController::class, 'verifyAccount'])->name('verify.account');
Route::get('/verify-login-account/{user_id}',[App\Http\Controllers\HomeController::class, 'verifyLoginAccount'])->name('verify.login.account');
Route::post('/save-contact-us',[App\Http\Controllers\HomeController::class, 'saveContact'])->name('saveContact');
Route::get('plan',[App\Http\Controllers\HomeController::class, 'plan'])->name('plan');
Route::get('/referral/{id}', [App\Http\Controllers\Client\DashboardController::class,'referral'])->name('referral');
Route::post('/referral/register', [App\Http\Controllers\Client\DashboardController::class,'referralRegister'])->name('referral.register');
Route::post('/client/register', [App\Http\Controllers\Auth\RegisterController::class,'registerClient'])->name('client.register');
Route::post('/client/login', [App\Http\Controllers\Auth\LoginController::class,'loginClient'])->name('client.login');
Auth::routes();
Route::group(['middleware' => ['role:client','auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Client\DashboardController::class,'index'])->name('client.dashboard');
    Route::group(['prefix'=>'account'], function(){
        Route::get('/profile', [App\Http\Controllers\Client\AccountController::class,'Profile'])->name('client.profile');
        Route::get('/settings', [App\Http\Controllers\Client\AccountController::class,'Setting'])->name('client.settings');
        Route::post('/profile/save', [App\Http\Controllers\Client\AccountController::class,'saveProfile'])->name('client.profile.save');
        Route::post('/kyc/save', [App\Http\Controllers\Client\AccountController::class,'saveKyc'])->name('client.kyc.save');
        Route::get('/kyc', [App\Http\Controllers\Client\AccountController::class,'Kyc'])->name('client.kyc');
        Route::get('/deposits', [App\Http\Controllers\Client\DepositController::class,'index'])->name('client.deposit');
        Route::post('/deposit/save', [App\Http\Controllers\Client\DepositController::class,'store'])->name('client.deposit.save');
        Route::get('/buypackage', [App\Http\Controllers\Client\PackageController::class,'index'])->name('client.buypackage');
        Route::get('/addPackage/{id}', [App\Http\Controllers\Client\PackageController::class,'addPacakge'])->name('client.addPackage');
        Route::post('/storePackage', [App\Http\Controllers\Client\PackageController::class,'storePackageDetail'])->name('package.storePackage');
    });
    Route::group(['prefix'=>'genealogy'], function(){
        Route::get('/team', [App\Http\Controllers\Client\GenealogyController::class,'index'])->name('client.team');
        Route::get('/team/{id}', [App\Http\Controllers\Client\GenealogyController::class,'show'])->name('genealogy.show');
    });
    Route::group(['prefix' => 'deposits', 'as' => 'deposit.'], function () {
         Route::get('/list', [App\Http\Controllers\Client\DepositController::class,'list'])->name('list');
         Route::get('/user/{id}', [App\Http\Controllers\Client\DepositController::class,'userDeposit'])->name('user.deposit');
        });
    Route::group(['prefix' => 'withdrawals', 'as' => 'withdrawal.'], function () {
        Route::get('/list', [App\Http\Controllers\Client\WithdrawController::class,'list'])->name('client.list');
        Route::get('/', [App\Http\Controllers\Client\WithdrawController::class,'index'])->name('client.withdraw');
        Route::post('withdrawl-request', [App\Http\Controllers\Client\WithdrawController::class,'withdrawRequest'])->name('request');
        Route::post('withdraw-create', [App\Http\Controllers\Client\WithdrawController::class,'withdrawCreate'])->name('withdraw.create');
    });
});
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin-login');
Route::post('/admin/attempt', [App\Http\Controllers\Admin\AuthController::class, 'loginAdmin'])->name('login-admin');
Route::group(['middleware' => ['role:admin','auth']], function () {
    Route::group(['prefix'=>'admin'], function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/packages', [App\Http\Controllers\Admin\AdminController::class,'package']);
        Route::get('/registerusers', [App\Http\Controllers\Admin\AdminController::class,'registerUser'])->name("admin.register.user");
        Route::get('/blockedUsers', [App\Http\Controllers\Admin\AdminController::class,'blockedUser'])->name('blockedUser');
        Route::get('/viewUserDetail/{id}', [App\Http\Controllers\Admin\AdminController::class,'viewUserDetail'])->name('viewUserDetail');
        Route::get('/updateStatus/{id}/{status}', [App\Http\Controllers\Admin\AdminController::class,'updateStatus'])->name('updateStatus');
        Route::get('/add-new-package', [App\Http\Controllers\Admin\AdminController::class,'addNewPackage']);
        Route::get('/banner', [App\Http\Controllers\Admin\PageSettingController::class,'index'])->name('Banner');
        Route::get('/left-text-section', [App\Http\Controllers\Admin\PageSettingController::class,'leftTextSection'])->name('leftTextSection');
        Route::get('/right-text-section', [App\Http\Controllers\Admin\PageSettingController::class,'rightTextSection'])->name('rightTextSection');
        Route::get('/call-to-action-section', [App\Http\Controllers\Admin\PageSettingController::class,'callToActionSection'])->name('callToActionSection');
        Route::get('/contact-us-section', [App\Http\Controllers\Admin\PageSettingController::class,'contactUsSection'])->name('contactUsSection');
        Route::get('/team-section', [App\Http\Controllers\Admin\PageSettingController::class,'teamSection'])->name('teamSection');
        Route::post('/save-setting', [App\Http\Controllers\Admin\PageSettingController::class,'store']);
        Route::get('/contact-us', [App\Http\Controllers\Admin\AdminController::class,'contactUs'])->name('contactUs');
        Route::post('/save-team', [App\Http\Controllers\Admin\PageSettingController::class,'saveTeam']);
        Route::get('/logout', [App\Http\Controllers\Admin\AuthController::class,'logout']);
        Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
            Route::get('/userPackages', [App\Http\Controllers\Admin\AdminController::class,'userPackages'])->name('userPackages');
            Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\AdminController::class,'userReferralPackages'])->name('userReferralPackages');
        });

        Route::group(['prefix' => 'user_levels', 'as' => 'user_level.'], function () {
         Route::get('/', [App\Http\Controllers\Admin\AdminController::class,'userList'])->name('user.list');
         Route::get('/{id}', [App\Http\Controllers\Admin\AdminController::class,'userLevel'])->name('user.level');
        });

        Route::group(['prefix' => 'packages', 'as' => 'package.'], function () {
         Route::get('/', [App\Http\Controllers\Admin\PackageController::class,'index'])->name('list');
         Route::get('create', [App\Http\Controllers\Admin\PackageController::class,'create'])->name('create');
         Route::post('store', [App\Http\Controllers\Admin\PackageController::class,'store'])->name('store');
         Route::get('delete/{id}', [App\Http\Controllers\Admin\PackageController::class,'destroy'])->name('delete');
         Route::get('edit/{id}', [App\Http\Controllers\Admin\PackageController::class,'edit'])->name('edit');
        });
        Route::group(['prefix' => 'deposits', 'as' => 'deposit.'], function () {
         Route::get('/', [App\Http\Controllers\Admin\DepositController::class,'index'])->name('list');
         Route::get('/deposit/approve', [App\Http\Controllers\Admin\DepositController::class,'approve'])->name('approve');
         Route::get('/deposit/decline/{id}', [App\Http\Controllers\Admin\DepositController::class,'decline'])->name('decline');
        });
        Route::group(['prefix' => 'withdraws', 'as' => 'witdraw.'], function () {
         Route::get('/', [App\Http\Controllers\Admin\WithdrawController::class,'index'])->name('list');
         Route::get('/withdraw/status/{id}/{status}', [App\Http\Controllers\Admin\WithdrawController::class,'updateStatus'])->name('status');
        });
        Route::group(['prefix' => 'bonuses', 'as' => 'bonus.'], function () {
         Route::get('/', [App\Http\Controllers\Admin\BonusController::class,'index'])->name('list');
         Route::get('create', [App\Http\Controllers\Admin\BonusController::class,'create'])->name('create');
         Route::post('store', [App\Http\Controllers\Admin\BonusController::class,'store'])->name('store');
         Route::get('delete/{id}', [App\Http\Controllers\Admin\BonusController::class,'destroy'])->name('delete');
         Route::get('edit/{id}', [App\Http\Controllers\Admin\BonusController::class,'edit'])->name('edit');
        });
        Route::group(['prefix' => 'levels', 'as' => 'level.'], function () {
            Route::get('/', [App\Http\Controllers\Admin\PackageLevelController::class,'index'])->name('list');
            Route::get('create', [App\Http\Controllers\Admin\PackageLevelController::class,'create'])->name('create');
            Route::get('edit/{id}', [App\Http\Controllers\Admin\PackageLevelController::class,'edit'])->name('edit');
            Route::post('store', [App\Http\Controllers\Admin\PackageLevelController::class,'store'])->name('store');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\PackageLevelController::class,'destroy'])->name('delete');
 
        });
        Route::get('creditLimit', [App\Http\Controllers\Admin\PageSettingController::class,'setCreditLimit'])->name('creditLimit');

    });
});

