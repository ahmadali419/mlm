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
  width:20%;
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
                <p><b>Your Wallet Amout:</b> {{ !empty($walletAmount) ? '$'. $walletAmount :   '$0' }} </p>  
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('package.storePackage')}}" enctype='multipart/form-data' class="form">
                        	@csrf
                            <div class="row">
                                <div class="col-12">
                                    <p><b>Package Name : </b>{{ $packageDetail->title ?? '' }} <span style="float:right"><b>Price :</b> {{ !empty($packageDetail->min_price) && !empty($packageDetail->max_price) ? '$'.$packageDetail->min_price . '-'. '$'.$packageDetail->max_price : ''   }}</span></p>
                                    {{-- <p>Price : {{ !empty($packageDetail->min_price) && !empty($packageDetail->max_price) ? $packageDetail->min_price . '-'. $packageDetail->max_price : ''   }}</p> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <input type="hidden" name="package_id" value="{{ $packageDetail->id ?? '' }}">
                                    <div class="mb-1"> 
                                        <input type="number" name="amount" class="form-control  @error('amount') is-invalid @enderror" readonly placeholder="Enter Amount" value="{{ $packageDetail->max_price ?? '' }}"> 
                                    </div>
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>  
                                <div class="col-md-6 col-12">
                                    <div class="mb-1"> 
                                        <input type="text" name="transaction_id" class="form-control @error('transaction_id') is-invalid @enderror " placeholder="Transaction Id">
                                    </div>
                                    @error('transaction_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
function copyWalletAddress(){
  let text = document.getElementById('wallet_address').value;
  navigator.clipboard.writeText(text);
  alert("Copied Wallet Address");
}
</script>