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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Amount</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Transaction ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Transaction Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Deposit Date</th>
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
	                                        {{ $list->user->name ?? "" }}
	                                    </td>
                                        <td class="align-middle">
	                                        {{ $list->user->email ?? "" }}
	                                    </td>
                                        <td class="align-middle">
	                                        {{ $list->user->phone ?? "" }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ $list->amount }}
	                                    </td>
	                                    <td class="align-middle">
	                                        {{ $list->transaction_id }}
	                                    </td>
                                        <td class="align-middle">
	                                        <img src="{{ '/'.$list->transaction_image }}" width="50" height="50" />
	                                    </td>
                                      
	                                    <td class="align-middle">
	                                        {{ $list->status == '1' ? 'Approved' : 'Pending'}}
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