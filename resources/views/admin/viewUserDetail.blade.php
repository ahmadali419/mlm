@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Package
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h3>User Detail</h3>
            </div>
        </div>
      <div class="row">
        <div class="col-12">
            <div class="card">
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p><b>Name :</b> {{ $userDetail->name ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Email :</b> {{ $userDetail->email ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Phone :</b> {{ $userDetail->phone ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Address :</b> {{ $userDetail->address ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>CNIC :</b> {{ $userDetail->cnic ?? '' }}</p>
                        </div>
                        <div class="col-4">
                            <p><b>Cnic Front Side :</b> <img src="{{ asset($userDetail->cnic_front_pic) }}" width="35%" alt=""></p>
                        </div>
                        <div class="col-4">
                            <p><b>Cnic Back Side :</b> <img src="{{ asset($userDetail->cnic_back_pic) }}" width="35%" alt=""></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                             <p><b>Bank Name :</b> {{ $userDetail->userAccountDetail->bank_name ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Account Title :</b> {{ $userDetail->userAccountDetail->account_title ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Account Number :</b> {{ $userDetail->userAccountDetail->account_number ?? '' }}</p>
                        </div>
                        <div class="col-3">
                            <p><b>Wallet Address :</b> {{ $userDetail->userAccountDetail->wallet_address ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        {{-- <div class="card-body px-0 pb-2">
          <a class="btn bg-gradient-primary mt-3 mb-3" href="/admin/add-new-package">Add New User</a>
          <hr/>
            
            </div> --}}
      </div>
      <div class="row p-2">
        <div class="col-12" >
            <div style="float:right">
                @if($userDetail->status == 'Approved')
                <a href="{{ route('updateStatus',['id'=>$userDetail->id , 'status' => 'Reject']) }}" class="btn btn-warning btn-sm">Reject</a>
                @elseif ($userDetail->status == 'Reject')
                <a href="{{ route('updateStatus',['id'=>$userDetail->id , 'status' => 'Approved']) }}" class="btn btn-primary btn-sm">Approve</a>
                @else
                <a href="{{ route('updateStatus',['id'=>$userDetail->id , 'status' => 'Approved']) }}" class="btn btn-primary btn-sm">Approve</a>
                <a href="{{ route('updateStatus',['id'=>$userDetail->id , 'status' => 'Reject']) }}" class="btn btn-warning btn-sm">Reject</a>
                @endif
            </div>
        </div>
      </div>
  </div>
@endsection