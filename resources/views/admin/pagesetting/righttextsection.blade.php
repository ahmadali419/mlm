@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Right Section Setting
@endsection
@section('content')
	<div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
          <h4>Right Text Section Setting</h4><hr/>
              <form method="POST" action="{{ url('/admin/save-setting') }}" role="form text-left" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Upload Right Section Image</label>
                    <div class="mb-3">
                      <input type="file" name="right_text_section_image" class="form-control" placeholder="logo" aria-label="Logo" aria-describedby="logo-addon">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="">Text</label>
                    <div class="mb-3">
                      <textarea id="summernote" name="right_text_section_text" class="form-control" placeholder="Text" aria-label="Text" aria-describedby="text-addon"></textarea>
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