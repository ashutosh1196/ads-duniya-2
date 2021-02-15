@extends('adminlte::page')

@section('title', 'Admin Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>Admin Information</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
  </div>
@stop

@section('content')
<div class="">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <!-- <table class="table">
            <tr>
            <tr>
              <th>Name </th>
              <td>{{ $viewAdmin[0]->name }}</td>
            </tr>
            <tr>
            <tr>
              <th>Email</th>
              <td>{{ $viewAdmin[0]->email }}</td>
            </tr>
            </tr>
            <tr>
              <th>Email Verification Date</th>
              <td>{{ $viewAdmin[0]->email_verified_at ? $viewAdmin[0]->email_verified_at : '--' }}</td>
            </tr>
            <tr>
            <tr>
              <th>Role</th>
              <?php $role = \App\Models\Role::where('id', $viewAdmin[0]->role_id)->get(); ?>
              <td>{{ $role[0]->name }}</td>
            </tr>
            <tr>
              <th>Created Date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($viewAdmin[0]->created_at)) }}</td>
            </tr>
            <tr>
              <th>Last Updated date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($viewAdmin[0]->updated_at)) }}</td>
            </tr>
          </table> -->

          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->email }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Date</label>
                  <input class="form-control" placeholder="{{ $viewAdmin[0]->email_verified_at ? $viewAdmin[0]->email_verified_at : '--' }}" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Role</label>
                  <?php $role = \App\Models\Role::where('id', $viewAdmin[0]->role_id)->get(); ?>
                  <input class="form-control" placeholder="{{ $role[0]->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($viewAdmin[0]->created_at)) }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($viewAdmin[0]->updated_at)) }}" readonly>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
@stop

@section('js')
@stop
