@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Banner Setting
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
          <h4>Banner Setting</h4><hr/>
              <form method="POST" action="{{ url('/admin/save-setting') }}" role="form text-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Upload Logo</label>
                    <div class="mb-3">
                      <input type="file" name="logo" class="form-control" placeholder="logo" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Upload Banner Image</label>
                    <div class="mb-3">
                      <input type="file" name="banner_image" class="form-control" placeholder="banner image" aria-label="banner" aria-describedby="banner-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Enter Title Text</label>
                    <div class="mb-3">
                      <input type="text" name="hero_title" class="form-control" placeholder="Title text" aria-label="Title name" aria-describedby="email-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Enter Sub title text</label>
                    <div class="mb-3">
                      <input type="text" name="hero_sub_title" class="form-control" placeholder="Sub title text" aria-label="Name" aria-describedby="email-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Upload Favicon Image</label>
                    <div class="mb-3">
                      <input type="file" name="favicon" class="form-control" placeholder="Favicon Image" aria-label="Name" aria-describedby="email-addon">
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