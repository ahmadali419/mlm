@extends('client.master')
<style type="text/css">
.form-input input {
  display:none;
}
.form-input label {
  display:block;
  width:10%;
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

.form-input img {
  width:10%;
  display:block;
  margin-bottom:30px;
}
.preview img {
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
                        <h4 class="card-title">Profile Setting</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('client.profile.save')}}" enctype='multipart/form-data' class="form">
                        	@csrf
                        	<input type="hidden" value="{{$user->id}}" class="form-control" name="user_id"/>
                        	<div class="center mb-3">
							  <div class="form-input">
							    <div class="preview">
                                  @if($user->profile_pic)
                                  <img id="file-ip-1-preview" src="{{'/'.$user->profile_pic}}">
                                  @else
							      <img id="file-ip-1-preview" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg">
                                  @endif
							    </div>
							    <label for="file-ip-1">Upload</label>
							    <input type="file" name="profile_pic" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
							    
							  </div>
							</div> 
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="full-name-column">Full Name</label>
                                        <input type="text" value="{{$user->name}}" id="full-name-column" class="form-control" placeholder="Full Name" name="name" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="id-column">TGT ID</label>
                                        <input type="text" id="id-column" class="form-control" value="{{'TGT'.$user->id}}" placeholder="TG ID" name="id" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">Email</label>
                                        <input type="text" value="{{$user->email}}" id="email-column" class="form-control" placeholder="Email" name="email-column" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="sponser-id">Sponser ID</label>
                                        <input type="text" value="{{$user->parent ? 'TGT'.$user->parent->id : "TGT0001"}}" id="sponser-id" class="form-control" name="sponser_id" placeholder="Sponser ID" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="phone-column">Phone number</label>
                                        <input type="text" value="{{$user->phone}}" id="phone-column" class="form-control" name="phone-column" placeholder="Phone Number" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="bank-name-column">Bank Name</label>
                                        <input type="text" id="bank-name-column" value="{{$user->userAccountDetail->bank_name ?? ''}}" class="form-control" name="bank_name" placeholder="Bank Name" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="account-title-column">Account Title Name</label>
                                        <input type="text" id="account-title-column" class="form-control" value="{{$user->userAccountDetail->account_title ?? ''}}" name="account_title" placeholder="Account Title Name" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="account-number-column">Account Number</label>
                                        <input type="number" id="account-number-column" class="form-control" value="{{$user->userAccountDetail->account_number ?? ''}}" name="account_number" placeholder="Account Number" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="wallet-address-column">Wallet Address</label>
                                        <input type="text" id="wallet-address-column" class="form-control" value="{{$user->userAccountDetail->wallet_address ?? ''}}" name="wallet_address" placeholder="Wallet Address" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
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
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>