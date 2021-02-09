@extends('adminlte::page')

@section('title', 'Admin Information')

@section('content_header')
  <h1>Admin Information</h1>
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <table class="table">
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
          </table>
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
