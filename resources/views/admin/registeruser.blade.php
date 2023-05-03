@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Package
@endsection
@section('content')
	<div class="container-fluid py-4">
      <div class="row">
        <div class="card-body px-0 pb-2">
          <!-- <a class="btn bg-gradient-primary mt-3 mb-3" href="/admin/add-new-package">Add New User</a> -->
          <hr/>
              <div class="table-responsive">
                <table class="table align-items-center mb-0" id="datatable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profile Picture</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sponser Code</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CNIC No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CNIC Front</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CNIC Back</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clients as $client)
                    <tr>
                      <td>{{$client->id}}</td>
                      <td>{{$client->name}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->phone}}</td>
                      <td>{{$client->address}}</td>
                      <td>
                        @if($client->profile_pic)
                        <img width="60%" src="{{'/'.$client->profile_pic}}">
                        @else
                        <img width="60%" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg">
                        @endif
                      </td>
                      <td>{{$client->sponser_code}}</td>
                      <td>
                        @if($client->status=="Reject" || $client->status==null)
                        <span class="text-danger">Pending</span>
                        @else
                        <span class="text-success">Approved</span>
                        @endif
                      </td>
                      <td>{{$client->cnic}}</td>
                      <td>
                        @if($client->cnic_front_pic)
                        <img width="60%" src="{{'/'.$client->cnic_front_pic}}">
                        @else
                        <img width="60%" src="../../../app-assets/images/portrait/small/cnic-front.jpg">
                        @endif
                      </td>
                      <td>
                        @if($client->cnic_back_pic)
                        <img width="60%" src="{{'/'.$client->cnic_back_pic}}">
                        @else
                        <img width="60%" src="../../../app-assets/images/portrait/small/cnic-back.jpg">
                        @endif
                      </td>
                      <td>{{$client->created_at}}</td>
                      <td>{{$client->updated_at}}</td>
                      <td>
                        <a href="{{ route('viewUserDetail', $client->id ) }}" class="btn btn-primary btn-sm">View Profile</a>
                        <!-- <a href="#">Edit</a>
                        <a href="#">Delete</a> -->
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
  </div>
@endsection