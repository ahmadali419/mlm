@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Add Bonus
@endsection

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
            <h4>Add Bonus</h4>
            <hr />
            <form role="form text-left" method="POST" action="{{ route('bonus.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $bonus->id ??'' }}">
                            <div class="col-md-6">
                                <label class="">Name <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{ !empty($bonus->name) ? $bonus->name :  old('name')  }}" placeholder="Name" aria-label="Name"
                                        aria-describedby="email-addon">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="">Amount <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{  !empty($bonus->amount) ? $bonus->amount :  old('amount')  }}" placeholder="amount"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Service Fee <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" class="form-control @error('service_fee') is-invalid @enderror" value="{{  !empty($bonus->service_fee) ? $bonus->service_fee :  old('service_fee')  }}" placeholder="Minimum Price" name="service_fee"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('service_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="">Withdraw Limit <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" class="form-control @error('withdraw_limit') is-invalid @enderror" value="{{ !empty($bonus->withdraw_limit) ? $bonus->withdraw_limit :  old('withdraw_limit')  }}" placeholder="Maximum Price" name="withdraw_limit"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('withdraw_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right" style="float:right">
                                    <button type="submit" class="btn bg-gradient-dark my-4 mb-2 " >Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#dropify').dropify({});
        row = $('.main-wrapper').find('row').length;
        $(document).on('click', '.add-row', function() {

            row++;

            var child_wrapper = `
                 <div class="row child_${row}">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <input type="text" name="level[]" readonly class="form-control" value="Level ${row + 1}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Bonus(%)</label>
                                    <input type="number" name="bonus_percentage[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Profit(%)</label>
                                    <input type="number" name="profit_percentage[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group" style="margin-top:28px">
                                  <button type="button" class="btn btn-danger remove-row" data-id="${row}">X</button>
                                </div>
                            </div>
                        </div>
          `;
            $('.main-wrapper').append(child_wrapper);
        })

        $(document).on('click', '.remove-row', function() {
            id = $(this).attr('data-id');
            $('.child_' + id).remove();
        });
    </script>
@endsection
