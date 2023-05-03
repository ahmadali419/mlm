@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Add Package
@endsection

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
            <h4>Add Package</h4>
            <hr />
            <form role="form text-left" method="POST" action="{{ route('package.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $package->id ??'' }}">
                            <div class="col-md-6">
                                <label class="">Title <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" value="{{ !empty($package->title) ? $package->title :  old('name')  }}" placeholder="Name" aria-label="Name"
                                        aria-describedby="email-addon">
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="">Duration (months) <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{  !empty($package->duration) ? $package->duration :  old('duration')  }}" placeholder="duration"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Min Price <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" class="form-control @error('min_price') is-invalid @enderror" value="{{  !empty($package->min_price) ? $package->min_price :  old('min_price')  }}" placeholder="Minimum Price" name="min_price"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('min_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="">Max Price <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input type="number" class="form-control @error('max_price') is-invalid @enderror" value="{{ !empty($package->max_price) ? $package->max_price :  old('max_price')  }}" placeholder="Maximum Price" name="max_price"
                                        aria-label="Name" aria-describedby="email-addon">
                                </div>
                                @error('max_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="">Image <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <input id="dropify" placeholder="Upload Image" data-default-file="{{ asset($package->image ??'') }}" name="image" class="@error('image') is-invalid @enderror" type="file" class="dropify"
                                        data-height="100">
                                        <input type="hidden" name="old_image" value="{{ $package->image ?? '' }}">
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="">Description <span class="text-danger">*</span></label>
                                <div class="mb-3">
                                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Write Description"  cols="5" rows="4" name="description">{{ !empty($package->description) ? $package->description : ''  }}</textarea>
                                </div>
                                @error('description')
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

                {{-- <div class="card">
                    <div class="card-header">
                        <h5>Package Levels</h5>
                    </div>
                    <div class="card-body main-wrapper">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <input type="text" name="level" readonly class="form-control" value="Level 1">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Bonus(%)</label>
                                    <input type="number" name="bonus_percentage" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Profit(%)</label>
                                    <input type="number" name="profit_percentage" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group" style="margin-top:28px">
                                  <button type="button" class="btn btn-success add-row">+</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> --}}

            </form>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        $('#dropify').dropify();
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
