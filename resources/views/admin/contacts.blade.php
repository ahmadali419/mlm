@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Package
@endsection
@section('content')
	<div class="container-fluid py-4">
      <div class="row">
        <div class="card-body px-0 pb-2">
          <h4>People who Contacted</h4>
          <hr/>
              <div class="table-responsive">
                <table class="table align-items-center mb-0" id="datatable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contacts as $key => $contact)
                    <tr>
                      <td class="align-middle">
                        {{$key+1}}
                      </td>
                      <td class="align-middle">
                        {{$contact->name}}
                      </td>
                      <td class="align-middle">
                        {{$contact->email}}
                      </td>
                      <td class="align-middle">
                        {{$contact->title}}
                      </td>
                      <td class="align-middle">
                        {{$contact->message}}
                      </td>
                      <td>
                        {{$contact->created_at}}
                      </td>
                      <td class="align-middle">
                        {{$contact->updated_at}}
                      </td>
                      <td class="align-middle">
                        <a href="#">Edit</a>\
                        <a href="#">Delete</a>
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