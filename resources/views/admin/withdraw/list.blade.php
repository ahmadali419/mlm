@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Withdraw List
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card-body px-0 pb-2">
                <!-- <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('package.create') }}">Add Package</a> -->
                <hr />
                <div class="table-responsive">
                    <h4>Withdraw's</h4>

                    <table class="table align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Wallet Address</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Amount</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Type</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Created at</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lists as $list)
                                <tr>
                                    <td class="align-middle">
                                        {{ $loop->index + 1 }}
                                    </td>
                                 

                                    <td class="align-middle">
                                        {{$list->user->name}}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->user->phone }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->details ? $list->details->wallet_address : '' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->amount }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->type }}
                                    </td>
                                  
                                   
                                    <td class="align-middle">
                                        {{ ucfirst($list->status)}}
                                    </td>
                                    <td class="align-middle">
                                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
                                    </td>
                                    <td class="align-middle">
                                       @if($list->status  == 'pending')
                                        <a href="{{ route('witdraw.status', ['id'=>$list->id , 'status'=> 'approved']) }}"
                                            class="btn btn-success btn-sm">Approve</a>
                                            @else
                                            <a 
                                                class="btn btn-success btn-sm">Approved</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
