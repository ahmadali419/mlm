@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Team Setting
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
          <h4>Team Section Setting</h4><hr/>
              <form method="POST" action="{{ url('/admin/save-team') }}" role="form text-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Profile Picture</label>
                    <div class="mb-3">
                      <input type="file" name="profile_pic" class="form-control" placeholder="upload photo" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Member Name</label>
                    <div class="mb-3">
                      <input type="text" name="member_name" class="form-control" placeholder="Enter Team Member Name" aria-label="Text" aria-describedby="text-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Designation</label>
                    <div class="mb-3">
                      <input type="text" name="designation" class="form-control" placeholder="Enter Team Member Designation" aria-label="Text" aria-describedby="text-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Twitter Profile Link</label>
                    <div class="mb-3">
                      <input type="text" name="twitter_link" class="form-control" placeholder="Enter Twitter Link" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label class="">Facebook Profile Link</label>
                    <div class="mb-3">
                      <input type="text" name="facebook_link" class="form-control" placeholder="Enter Facebook Link" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="">Instagram Profile Link</label>
                    <div class="mb-3">
                      <input type="text" name="instagram_link" class="form-control" placeholder="Enter Instagram Link" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="">LinkedIn Profile Link</label>
                    <div class="mb-3">
                      <input type="text" name="linkedin_link" class="form-control" placeholder="Enter LinkedIn Link" aria-label="CallToAction" aria-describedby="calltoaction-addon">
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