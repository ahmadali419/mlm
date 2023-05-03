@extends('admin.master')
@section('title')
	{{env('APP_NAME')}} | Package
@endsection
@section('content')
	<div class="container-fluid py-4">
      <div class="row">
        <div class="card-body px-0 pb-2">
          <a class="btn bg-gradient-primary mt-3 mb-3" href="/admin/add-new-package">Add Package</a>
          <hr/>
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Max Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Min Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">duration</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle">
                        1
                      </td>
                      <td class="align-middle">
                        Personal Package
                      </td>
                      <td class="align-middle">
                        This is description of package
                      </td>
                      <td class="align-middle">
                        $1200
                      </td>
                      <td class="align-middle">
                        $1200
                      </td>
                      <td>
                        <div>
                            <img src="../assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                          </div>
                      </td>
                      <td class="align-middle">
                        24 days
                      </td>
                      <td class="align-middle">
                        2022-10-28 14:34:42
                      </td>
                      <td class="align-middle">
                        2022-10-28 14:34:42
                      </td>
                      <td class="align-middle">
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
      </div>
  </div>
@endsection