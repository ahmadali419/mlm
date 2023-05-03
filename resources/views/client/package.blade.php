@extends('client.master')
@section('content')
<div class="app-content content ">
	<section id="card-demo-example">
        <div class="row">
            <div class="col-6">
            {{-- <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('client.addPackage') }}">Buy Package</a> --}}
            </div>
        </div>
        <div class="row match-height">
            @if(session()->has('message'))
	    <div class="alert alert-success text-center">
	        {{ session()->get('message') }}
	    </div>
	@endif
            @forelse ($packages as $package)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset($package->image)}}" alt="Card image cap">
                    <div class="card-body">

                        <h4 class="card-title"><a href="#">{{$package->title}}</a></h4>
                        <h6>Personal: ${{ number_format($package->min_price) }} - ${{ number_format($package->max_price) }}</h6>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Investment Bonus</th>
                                            <th>Profit Bonus</th>
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
                        <a href="{{route('client.deposit')}}" class="btn btn-outline-primary waves-effect">Invest</a>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </section>
</div>
@endsection