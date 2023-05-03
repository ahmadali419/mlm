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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Enter Your Amount of Deposit</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('client.deposit.save')}}" enctype='multipart/form-data' class="form">
                        	@csrf
                        	<input type="hidden" value="{{$user->id}}" class="form-control" name="user_id"/> 
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="full-name-column">Deposit Wallet USDT$ Tether (TRC20)  Address</label>
                                        <input type="text" value="TBibfJTWBABcJ2KTEUrsEwb8Hiuw6yUEJT" id="wallet_address" class="form-control" placeholder="Full Name" name="wallet_address" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <a class="btn btn-info mt-2" onclick="copyWalletAddress('#wallet_address')">Copy Wallet Address</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">Enter Amount Minimum 50$</label>
                                        <input type="number" id="email-column"step=any  class="form-control" placeholder="Enter amount of Deposit" name="amount"/>
                                        @if ($errors->has('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="sponser-id">Enter Transaction ID</label>
                                        <input type="text" id="transaction-id" class="form-control" name="transaction_id" placeholder="Enter Transaction ID"/>
                                        @if ($errors->has('transaction_id'))
                                            <span class="text-danger">{{ $errors->first('transaction_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="sponser-id">Upload Screenshot of Transaction</label>
                                        <input type="file" id="transaction-file" class="form-control" name="transaction_image" onchange="showPreview(event);"/>
                                        @if ($errors->has('transaction_image'))
                                            <span class="text-danger">{{ $errors->first('transaction_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="center mb-3">
                                      <div class="form-input">
                                        <div class="preview">
                                          <img id="file-ip-1-preview" src="../../../app-assets/images/portrait/small/transaction.jpg">
                                        </div>
                                      </div>
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
@section('js')
<script type="text/javascript">
  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
function copyWalletAddress(element){
   $(element).select();
    document.execCommand("copy");
}
</script>
@endsection