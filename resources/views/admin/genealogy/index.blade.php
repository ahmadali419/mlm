@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | All User
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parent Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deposit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clients as $client)
                    <tr>
                      <td>{{$client->id}}</td>
                      <td>{{$client->referral_id}}</td>
                      <td>{{$client->deposit ? $client->deposit->amount : 0}}</td>
                      <td>{{$client->name}}</td>
                      <td>{{$client->email}}</td>
                      <td>{{$client->phone}}</td>
                      <td>{{$client->address}}</td>
                      <td>{{$client->created_at}}</td>
                      <td>{{$client->updated_at}}</td>
                      <td>
                        <a href="{{ route('user_level.user.level', $client->id ) }}" class="btn btn-primary btn-sm">View Team</a>
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