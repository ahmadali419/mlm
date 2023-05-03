@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Call To Action Setting
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
          <h4>Call To Action Section Setting</h4><hr/>
              <form method="POST" action="{{ url('/admin/save-setting') }}" role="form text-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Upload Background Image</label>
                    <div class="mb-3">
                      <input type="file" name="call_to_action_bg_image" class="form-control" placeholder="call to action" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Title</label>
                    <div class="mb-3">
                      <input type="text" name="call_to_action_title" class="form-control" placeholder="Call to action title" aria-label="Text" aria-describedby="text-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Text</label>
                    <div class="mb-3">
                      <textarea name="call_to_action_text" class="form-control" placeholder="Call to action text" aria-label="CallToAction" aria-describedby="calltoaction-addon"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="">Button Text</label>
                    <div class="mb-3">
                      <input type="text" name="call_to_action_btn_text" class="form-control" placeholder="Call to action button text" aria-label="CallToAction" aria-describedby="calltoaction-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Button Link</label>
                    <div class="mb-3">
                      <input type="text" name="call_to_action_btn_link" class="form-control" placeholder="Call to action button link" aria-label="CallToAction" aria-describedby="calltoaction-addon">
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