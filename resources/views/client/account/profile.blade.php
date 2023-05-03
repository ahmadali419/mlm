@extends('client.master')
@section('content')
<div class="app-content content ">
	<div class="content-body">
	    <!-- Basic Horizontal form layout section start -->
	    <section id="basic-horizontal-layouts">
	        <div class="row">
	            <div class="col-md-10 col-12">
	                <div class="card">
	                    <div class="card-header">
	                        <h4 class="card-title mb-2">Profile Details</h4>
	                        <a href="{{route('client.settings')}}" class="btn btn-info">Edit Profile</a>
	                    </div>
	                    <div class="card-body">
	                        <form class="form form-horizontal">
	                            <div class="row">
	                                <div class="col-12">
	                                    <div class="mb-1 row">
	                                        <div class="col-sm-3">
	                                            <h6>Full Name</h6>
	                                        </div>
	                                        <div class="col-sm-9">
	                                            <p>{{$user->name ?? "No"}}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-12">
	                                    <div class="mb-1 row">
	                                        <div class="col-sm-3">
	                                            <h6>TGT ID</h6>
	                                        </div>
	                                        <div class="col-sm-9">
	                                            <p class="mt-0">TGT{{$user->id ?? "No"}}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-12">
	                                    <div class="mb-1 row">
	                                        <div class="col-sm-3">
	                                            <h6>Sponsor Code</h6>
	                                        </div>
	                                        <div class="col-sm-9">
	                                            <p class="mt-0">{{$user->parent ? 'TGT'.$user->parent->id : "TGT0001"}}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-12">
	                                    <div class="mb-1 row">
	                                        <div class="col-sm-3">
	                                            <h6>Email</h6>
	                                        </div>
	                                        <div class="col-sm-9">
	                                            <p>{{$user->email ?? "No"}}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="col-12">
	                                    <div class="mb-1 row">
	                                        <div class="col-sm-3">
	                                            <h6>Contact Phone</h6>
	                                        </div>
	                                        <div class="col-sm-9">
	                                            <p>{{$user->phone ?? "No"}}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- Basic Horizontal form layout section end -->
    </div>
<div>
@endsection