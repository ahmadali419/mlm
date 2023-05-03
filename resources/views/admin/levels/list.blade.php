@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Package Levls
@endsection
@section('content')
	<div class="container-fluid py-4">
      <div class="row">
        <div class="card-body px-0 pb-2">
          <a class="btn bg-gradient-primary mt-3 mb-3" href="{{ route('level.create') }}">Add Level</a>
          <hr/>
              <div class="table-responsive">
                <table class="table align-items-center mb-0" id="datatable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Package</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Boust(%)</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profit(%)</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($lists as $list)
                     <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $list->pacakge->title ?? '' }}</td>
                      <td>{{ $list->level ?? '' }}</td>
                      <td>{{ !empty($list->bonus_percentage) ? $list->bonus_percentage . '%' : '' }}</td>
                      <td>{{ !empty($list->profit_percentage) ? $list->profit_percentage . '%' : '' }}</td>
                      <td class="align-middle">
                        {{ carbon\Carbon::parse($list->created_at)->format('m/d/Y') }}
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('level.edit', $list->id) }}"
                            class="btn btn-success btn-sm">Edit</a>
                        <a href="{{ route('level.delete', $list->id) }}"
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