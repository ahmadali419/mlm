@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Contact Us Section Setting
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
          <h4>Contact Us Section Setting</h4><hr/>
              <form method="POST" action="{{ url('/admin/save-setting') }}" role="form text-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Title</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_title" class="form-control" placeholder="Contact Us Title" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Sub Title</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_sub_title" class="form-control" placeholder="Contact Us Sub Title" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Location Title</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_location_title" class="form-control" placeholder="Contact Us Location Title" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Location Address</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_location_address" class="form-control" placeholder="Contact Us Location Address" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Email</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_email_title" class="form-control" placeholder="Contact Us Email Title" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Email Address</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_email_address" class="form-control" placeholder="Contact Us Email Address" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Call</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_call_title" class="form-control" placeholder="Contact Us Call Title" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Call Number</label>
                    <div class="mb-3">
                      <input type="text" name="contact_us_call_number" class="form-control" placeholder="Contact Us Call Number" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                </div>
                  <div class="text-right">
                    <button type="submit" class="btn bg-gradient-dark my-4 mb-2">Save</button>
                  </div>
                </form>
        </div>
  </div>
@endsection