@extends('client.master')
<style type="text/css">
.form-input-front input {
  display:none;
}
.form-input-front label {
  display:block;
  width:23%;
  height:45px;
  line-height:50px;
  text-align:center;
  background:#7367f0;
  color: #fff;
  font-size:12px;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}

.form-input-front img {
  width:62%;
  height:50%;
  display:block;
  margin-bottom:5px;
}
.preview-front img {
	border-radius: 10px;
}
.form-input-back input {
  display:none;
}
.form-input-back label {
  display:block;
  width:23%;
  height:45px;
  line-height:50px;
  text-align:center;
  background:#7367f0;
  color: #fff;
  font-size:12px;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}

.form-input-back img {
  width:62%;
  height:50%;
  display:block;
  margin-bottom:5px;
}
.preview-back img {
    border-radius: 10px;
}
</style>
@section('content')
<div class="app-content content ">
	@if(session()->has('message'))
	    <div class="alert alert-success text-center">
	        {{ session()->get('message') }}
	    </div>
	@endif
	<!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">KYC Setting</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('client.kyc.save')}}" enctype='multipart/form-data' class="form">
                        	@csrf
                        	<input type="hidden" value="{{$user->id}}" class="form-control" name="user_id"/>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="full-name-column">Full Name</label>
                                        <input type="text" value="{{$user->name}}" id="full-name-column" class="form-control" placeholder="Full Name" name="name"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="id-column">National ID / Passport / Driving License</label>
                                        <input type="text" id="id-column" class="form-control" value="{{$user->cnic}}" placeholder="National ID / Passport / Driving License" name="cnic"/>
                                    </div>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label" for="id-column">Front CNIC</label>
                                        <div class="center mb-3">
                                          <div class="form-input-front">
                                            <div class="preview-front">
                                              @if($user->cnic_front_pic)
                                              <img id="file-ip-1-preview-front" src="{{'/'.$user->cnic_front_pic}}">
                                              @else
                                              <img id="file-ip-1-preview-front" src="../../../app-assets/images/portrait/small/cnic-front.jpg">
                                              @endif
                                            </div>
                                            <label for="file-ip-1">Upload Front</label>
                                            <input type="file" name="cnic_front" id="file-ip-1" accept="image/*" onchange="showPreviewFront(event);">
                                            
                                          </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label" for="id-column">Back CNIC</label>
                                        <div class="center mb-3">
                                          <div class="form-input-back">
                                            <div class="preview-back">
                                             @if($user->cnic_back_pic)
                                              <img id="file-ip-1-preview-back" src="{{'/'.$user->cnic_back_pic}}">
                                              @else
                                              <img id="file-ip-1-preview-back" src="../../../app-assets/images/portrait/small/cnic-back.jpg">
                                              @endif
                                            </div>
                                            <label for="file-ip-2">Upload Back</label>
                                            <input type="file" name="cnic_back" id="file-ip-2" accept="image/*" onchange="showPreviewBack(event);">
                                            
                                          </div>
                                        </div>
                                    </div>
                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-success me-1">Submit</button>
                                    <!-- <button type="reset" class="btn btn-outline-secondary">Reset</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->
</div>
@endsection
<script type="text/javascript">
  function showPreviewFront(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview-front");
    preview.src = src;
    preview.style.display = "block";
  }
}
function showPreviewBack(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview-back");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>