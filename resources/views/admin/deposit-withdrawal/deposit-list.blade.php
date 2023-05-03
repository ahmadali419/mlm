@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Package
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card-body px-0 pb-2">
                <!-- <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('package.create') }}">Add Package</a> -->
                <hr />
                <div class="table-responsive">
                    <h4>Deposit's</h4>

                    <table class="table align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Wallet Address
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Amount</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Transaction ID</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Image</th>
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
                                        {{ $list->wallet_address ?? '' }}
                                    </td>

                                    <td class="align-middle">
                                        {{$list->user->name}}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->user->phone }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->amount }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->transaction_id }}
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{'/'.$list->transaction_image}}" width="25%"
                                                class="avatar avatar-sm me-3" alt="atlassian">
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->status == '1' ? 'Approved' : 'Pending'}}
                                    </td>
                                    <td class="align-middle">
                                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
                                    </td>
                                    <td class="align-middle">
                                        @if($list->status == 0)
                                        <a href="{{ route('deposit.approve', ['id'=>$list->id , 'user_id'=>$list->user->id ?? '']) }}"
                                            class="btn btn-success btn-sm">Approve</a>
                                        @else
                                        <a href="{{ route('deposit.decline', $list->id) }}"
                                            class="btn btn-danger btn-sm">Decline</a>
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
