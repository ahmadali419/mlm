@extends('client.master')
@section('content')
<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Dashboard</h4>
                                    <div class="align-items-center">
                                    @if(App\Helpers\Helpers::getUserPackage(Auth::id()) && App\Helpers\Helpers::getUserPackage(Auth::id())->package)
                                        <span><img style="width:35%;" src="{{asset(App\Helpers\Helpers::getUserPackage(Auth::id())->package->image)}}" /></span>
                                    @else
                                        <span class="h1 fw-bold" style="color: #7367f0;">No Package</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">${{round($totalFund,3)}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Deposit</p>
                                                    <a href="/deposits/list">View Statement</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{$totalReferral}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Direct Referral</p>
                                                    <!--<a href="/genealogy/team">View Referral</a>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"></h4>
                                                    <p class="card-text font-small-3 mb-0">Referral Tree</p>
                                                    <a href="/genealogy/team">View Total Referral Tree</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">${{round($totalWithdraw,3)}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total Withdraw</p>
                                                    <a href="/withdrawals/list">View Statement</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-xl-3 col-sm-6 col-12">-->
                                        <!--    <div class="d-flex flex-row">-->
                                        <!--        <div class="avatar bg-light-success me-2">-->
                                        <!--            <div class="avatar-content">-->
                                        <!--                <i data-feather="dollar-sign" class="avatar-icon"></i>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="my-auto">-->
                                        <!--            <h4 class="fw-bolder mb-0">$9745</h4>-->
                                        <!--            <p class="card-text font-small-3 mb-0">Total Profit</p>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">${{ round($roi,3) ?? 0.00 }}</h4>
                                                    <h4 class="card-text mb-0" style="color: #7367f0;">ROI</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">${{ round($investment,3) ?? 0.00 }}</h4>
                                                    <h4 class="card-text mb-0" style="color: #7367f0;">Investment Bonus</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">${{ round($profit,3) ?? 0.00 }}</h4>
                                                    <h4 class="card-text mb-0" style="color: #7367f0;">Profit Bonus</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="referral-link">Referral Link</label>
                                <input type="text" value="{{$referralLink}}" id="referral_link" class="form-control" placeholder="Referral Link" name="referral_link" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <a class="btn btn-info mt-2" onclick="copyReferralLink('#referral_link')">Copy Link</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-2">Direct Referrals</h4>
                    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Deposit</th>
                                                    <th>Date of Join</th>
                                                    <th>Date of Deposit</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @forelse ($referrals as $list)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$list->name}}</td>
                                                    <td>${{$list->deposit->amount ?? 0}}</td>
                                                    <td>{{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}</td>
                                                    <td>{{ $list->deposit ? carbon\Carbon::parse($list->deposit->created_at)->format('m/d/Y') : '' }}</td>
                                                    @if($list->deposit)
                                                    <td>{{$list->deposit->status == 1 ? "Approved" : "Pending"}}</td>
                                                    @else
                                                    <td class="text-danger">Pending</td>
                                                    @endif
                                                </tr>
                                                @empty
                                                    <p>No Referral Found</p>
	                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
<script type="text/javascript">
function copyReferralLink(element){
   $(element).select();
    document.execCommand("copy");
    alert("Referral link copied");
}
</script>