@extends('layouts.master')
@section('title', 'Register')
@section('css')
    <style>
        .error {
            color: red !important;
        }
        .potential_area .potential .ptl_containt {
            box-shadow: 0px 0px 40px 0px rgb(233 233 233 / 75%);
            text-align: center;
            background: #ffffff;
            padding: 40px 20px;
        }

        .potential_area .potential {
            margin-bottom: 30px;
        }

        .potential_area .potential .ptl_containt .heding {
            font: 600 26px/36px "Nunito", sans-serif;
            color: #f59019;
        }

        .potential_area .potential {
            margin-bottom: 30px;
        }

        .theme_btn {
          color: #fff;
          background: rgba(0, 0, 0, 0.8);
          text-align: center !important;
          font: 600 16px/50px "Nunito", sans-serif;
          display: inline-block;
          padding: 0 20px;
          position: relative;
          overflow: hidden;
          border-radius: 10px;
          z-index: 1;
      }
    </style>
@endsection
@section('content')
    <!-- ======= Breadcrumbs ======= -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Plans</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Plans</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page" style="padding: 10px 0 !important;">
            <div class="container">
                <p>
                    {{-- Example inner page template --}}
                </p>
            </div>
        </section>
       <div class="container mb-4">
        <div class="row">
            @forelse ($packages as $package)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset($package->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('plan') }}">{{$package->title}}</a></h4>
                        <h6>Personal: ${{ number_format($package->min_price) }} - ${{ number_format($package->max_price) }}</h6>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Investment Bonus</th>
                                            <th>Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @forelse ($package->levels as $levelItem)
                                                <tr>
                                                    <td>{{ $levelItem->level ?? '' }} Level:
                                                        {{ $levelItem->bonus_percentage ?? '' }}%</td>
                                                    <td>{{ $levelItem->level ?? '' }} Level:
                                                        {{ $levelItem->profit_percentage ?? '' }}%</td>

                                                </tr>

                                            @empty
                                            <p class="text-danger text-center">Sorry No Level found!</p>
                                            @endforelse
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <!-- <a href="#" class="btn btn-outline-primary waves-effect">Invest</a> -->
                    </div>
                </div>
            </div>
            @empty
            @endforelse

        </div>
       </div>
    </main><!-- End #main -->

@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('change', '.form-check-input', function() {
            $('#kt_sign_up_submit').prop('disabled', true);
            if ($(this).is(":checked")) {
                $('#kt_sign_up_submit').prop('disabled', false);
            }
        });
    </script>
@endsection
