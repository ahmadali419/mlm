@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Add Package Level
@endsection

@section('css')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> --}}
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card-body px-0 pb-2">
            <h4>Add Package Levels</h4>
            <hr />
            <form role="form text-left" method="POST" action="{{ route('level.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="level_id" id="level_id">
                        <label for="">Select Pacakge <span class="text-danger">*</span></label>
                        <input type="hidden" name="level_id" value="{{ $packgeLevel->id ?? '' }}">
                        <select name="package_id" id="package_id"
                            class="form-control  @error('package_id') is-invalid @enderror">
                            <option value="">Select Package</option>
                            @foreach ($packges as $package)
                                <option value="{{ $package->id }}" {{ !empty($packgeLevel->package_id) && $packgeLevel->package_id == $package->id ? 'selected' : '' }}>{{ $package->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="">Level <span class="text-danger">*</span></label>
                        <input type="text" id="" name="level" value="{{ $packgeLevel->level ?? '' }}"
                            class="form-control @error('level') is-invalid @enderror">
                    </div>
                    <div class="col-6">
                        <label for="">Bonus <span class="text-danger">*</span></label>
                        <input type="number" id="" name="bonus_percentage" oninput="validity.valid||(value='');" value="{{ !empty($packgeLevel->bonus_percentage) ? $packgeLevel->bonus_percentage :  old('bonus_percentage') }}"
                            class="form-control @error('bonus_percentage') is-invalid @enderror">
                    </div>
                    <div class="col-6">
                        <label for="">Profit <span class="text-danger">*</span></label>
                        <input type="number" id="" name="profit_percentage" oninput="validity.valid||(value='');" value="{{ !empty($packgeLevel->profit_percentage) ? $packgeLevel->profit_percentage :  old('profit_percentage') }}"
                            class="form-control @error('profit_percentage') is-invalid @enderror">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-2">
                        <button type="submit" class="btn btn-primary mt-1" style="float: right;">Save</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                       <div class="form-group">
                          <label for="">Select date range</label>
                          <input type="text" id="date-id" class="form-control">
                       </div>
                    </div>
                </div>

        
                {{-- <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="datatable">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Package</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($lists as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $list->pacakge->title ?? '' }}</td>
                                <td>{{ $list->level ?? '' }}</td>
                                <td>{{ carbon\Carbon::parse($list->create_at)->format('m/d/Y') }}</td>
                                <td class="align-middle">
                                    <a href="javascript:void(0)" data-level = "{{ $list->level }}" data-package ="{{ $list->pacakge->id ?? '' }}" data-level-id = "{{ $list->id }}" class="btn btn-success btn-sm edit-level" >Edit</a>
                                    <a href="{{ route('level.delete',$list->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#date-id').dateRangePicker({

        });
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

        $(document).on('click', '.edit-level', function() {
            level = $(this).attr('data-level');
            level_id = $(this).attr('data-level-id');
            package_id = $(this).attr('data-package');
            console.log(level_id);
            $('#package_id').val(package_id);

            $('.level').val(level);
            $('#level_id').val(level_id);
        });
    </script>
@endsection
