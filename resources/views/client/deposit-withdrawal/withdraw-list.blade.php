@extends('client.master')
@section('content')
<div class="app-content content ">
	<div class="content-body">
	    <div class="row match-height">
                        <!-- Company Table Card -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-company-table">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Amount</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Withdraw Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            	<div class="d-flex align-items-center">
                            		@forelse ($lists as $list)
	                                <tr>
	                                    <td class="align-middle">
	                                        {{ $loop->index + 1 }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ $list->type }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ $list->amount }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ Str::ucfirst($list->status) ?? '' }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
	                                    </td>
	                                </tr>
	                            @empty
	                            @endforelse
                            	</div>
                        </tbody>                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Company Table Card -->
                    </div>
    </div>
<div>
@endsection