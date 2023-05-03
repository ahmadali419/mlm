@extends('admin.master')
@section('title')
    {{ env('APP_NAME') }} | Package
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card-body px-0 pb-2">
                {{-- <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('package.create') }}">Add Package</a> --}}
                <hr />
                <div class="table-responsive">
                    <h4>Packages</h4>

                    <table class="table align-items-center mb-0" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Phone</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Package</th>
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
                                        {{ $list->name ?? ""}}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->phone ?? ""}}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->userPackages[0]->title ?? "No"}}
                                    </td>
                                    <td class="align-middle">
                                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('package.edit', $list->id) }}"
                                            class="btn btn-success btn-sm">View Referral Package</a>
                                        {{-- <a href="{{ route('package.delete', $list->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a> --}}
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
