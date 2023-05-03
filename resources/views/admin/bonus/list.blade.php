@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Package
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card-body px-0 pb-2">
                <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('bonus.create') }}">Add Bonus</a>
                <hr />
                <div class="table-responsive">
                    <h4>Bonuses</h4>

                    <table class="table align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Service Fee</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Amount</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Withdraw Limit</th>
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
                                        {{ $list->name ?? '' }}
                                    </td>

                                    <td class="align-middle">
                                        {{ '$' . $list->service_fee }}
                                    </td>
                                    <td class="align-middle">
                                        {{ '$' . $list->amount }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->withdraw_limit. " times a month" }}
                                    </td>
                                    <td class="align-middle">
                                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('bonus.edit', $list->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('bonus.delete', $list->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
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
