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
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6" style="padding:34px;height:155px">

					<span class="fs-4 fw-semibold text-info pb-1 px-2 text-center">Roi </span>

					<span class="fs-lg-2tx fw-bold d-flex justify-content-center">$

						<span>{{ round($roi,3) ?? 0.00 }}</span></span>

					</div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6" style="padding:34px;height:155px">

					<span class="fs-4 fw-semibold text-info pb-1 px-2 text-center">Profit Bonus</span>

					<span class="fs-lg-2tx fw-bold d-flex justify-content-center">$

						<span>{{ round($profit,3) ?? 0.00 }}</span></span>

					</div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6" style="padding:34px;height:155px">

					<span class="fs-4 fw-semibold text-info pb-1 px-2 text-center">Investment Bonus</span>

					<span class="fs-lg-2tx fw-bold d-flex justify-content-center">$

						<span>{{ round($investment,3) ?? 0.00 }}</span></span>

					</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                

                <div class="card card-company-table">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Amount</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Withdraw Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lists as $list)
                                    <tr>
                                     <td>{{ $list->user->id ?? '' }}</td>
                                     <td>{{ $list->type ?? '' }}</td>
                                     <td>{{ $list->after_withdraw_amount ?? '' }}</td>
                                     <td>{{ Str::ucfirst($list->status) ?? '' }}</td>
                                     <td>{{ carbon\carbon::parse($list->created_at)->format('Y/m/d') ?? '' }}</td>
                                    </tr>
                                @empty
                                    <p class="text-danger">No Withdraw history found</p>
                                @endforelse

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Withdraw Amount</h4>
                    </div>
                    <div class="card-body">
                        <form id="addWithdraw" enctype='multipart/form-data' class="form">
                        	@csrf
                        	<input type="hidden" value="{{$user->id}}" class="form-control" name="user_id"/> 
                            <p class="text-danger">Attention R.O.I will be paid once in a month.
                            </p>
                            <div class="row">
                               
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="sponser-id">Select Option</label>
                                         <select name="bonus" id="" class="form-control">
                                            <option value="" disabled>Select Option</option>
                                            @foreach ($bonuses as $bonus)
                                            <option value="{{ $bonus->id }}">{{ $bonus->name == 'Roi' ? $bonus->name : $bonus->name .' '. 'Bonus' }}</option>                                                
                                            @endforeach
                                         </select>
                                        @if ($errors->has('bonus'))
                                            <span class="text-danger">{{ $errors->first('bonus') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">Enter Amount</label>
                                        <input type="number" id="email-column" step="any" class="form-control input" placeholder="Enter amount of Deposit" name="amount"/>
                                       <p id="output"></p>  
                                      @if ($errors->has('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                </div>
                                <div id="recaptcha-container"></div>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Verify OTP Code(Your opt will be expired in one minute)</h5>
      </div>
      <div class="modal-body">
        <form>
            <input type="text" id="verification" class="form-control" placeholder="Verification code">
            <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('js')
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyBgJAChSsIle2CscdgZALwKiPA1ZAKKOjE",
        authDomain: "tudorglobal-3d335.firebaseapp.com",
        projectId: "tudorglobal-3d335",
        storageBucket: "tudorglobal-3d335.appspot.com",
        messagingSenderId: "57719632744",
        appId: "1:57719632744:web:6fa03065d5e5b29db81cdd",
        measurementId: "G-T8JG9H2M4E"
    };
    firebase.initializeApp(firebaseConfig);
</script>
<script>
    //Form Handler
    $("#addWithdraw").submit(function(e) {
        e.preventDefault();
        $.ajax({    
           type: "POST",
           url: 'withdrawals/withdrawl-request',
           data: $("#addWithdraw").serialize(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           success: function(data)
           {
                if (data.statusCode == 201) {
                    toastr.error(data.message, {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                }
                if (data.statusCode == 200) {
                    sendOTP(data.user.phone);
                }
           },
           error : function (error) {
               if (error.responseJSON.amount) {
                    toastr.error(error.responseJSON.amount[0], {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
               }
               if (error.responseJSON.bonus) {
                    toastr.error(error.responseJSON.bonus[0], {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
               }
            }
        }); 
    });
    window.onload = function () {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    function sendOTP(phone) {
        var number = phone;
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            $("#exampleModalCenter").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#exampleModalCenter").modal('show');
            // $('#addWithdraw').trigger("reset");
            toastr.success("Please verify otp sends on number",{
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-bottom-full-width",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        }).catch(function (error) {
            toastr.error(error.message,{
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-bottom-full-width",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        });
    }
    function verify() {
        var code = $("#verification").val();
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            toastr.success("OTP verified successfully",{
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-bottom-full-width",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
            withdrawCreate();
        }).catch(function (error) {
            toastr.error(error.message,{
                timeOut: 500000000,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                positionClass: "toast-bottom-full-width",
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        });
    }
    function withdrawCreate(){
        $.ajax({    
           type: "POST",
           url: 'withdrawals/withdraw-create',
           data: $("#addWithdraw").serialize(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           success: function(data)
           {
                if (data.statusCode == 200) {
                    $("#exampleModalCenter").modal('hide');
                    $('#addForm').trigger("reset");
                    toastr.success(data.message,{
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-bottom-full-width",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    });
                }
           }
       });
    }
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $(document).on("keyup", ".input",function() {
    $("#output").text('');
    var inputValue = $(this).val();
    if(inputValue){
      var calculatedValue = inputValue * 0.05;
      var calculatedValue = inputValue - calculatedValue;
      $("#output").text('After deduction 5% withdraw fee you will get $'+calculatedValue + ' and mininum limit is 40$');
    }
  });
});
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
@endsection