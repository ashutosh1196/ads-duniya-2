@extends('adminlte::page')

@section('title', 'Recruiter Information')

@section('content_header')
  <h1>Recruiter Information</h1>
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
              <th>Name : </th>
              <td>{{ $recruiter[0]->name ? $recruiter[0]->name : '--' }}</td>
            </tr>
            <tr>
            <tr>
              <th>First Name : </th>
              <td>{{ $recruiter[0]->first_name ? $recruiter[0]->first_name : '--' }}</td>
            </tr>
            <tr>
            <tr>
              <th>Last Name : </th>
              <td>{{ $recruiter[0]->last_name ? $recruiter[0]->last_name : '--' }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $recruiter[0]->email ? $recruiter[0]->email : '--' }}</td>
            </tr>
            <tr>
              <th>Phone Number</th>
              <td>{{ $recruiter[0]->phone_number ? $recruiter[0]->phone_number : '--' }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{ $recruiter[0]->status == 1 ? 'Active' : 'Inactive' }}</td>
            </tr>
            <tr>
              <th>Is Parent?</th>
              <td>{{ $recruiter[0]->is_parent == 1 ? 'YES' : 'NO' }}</td>
            </tr>
            <tr>
              <th>IP Address</th>
              <td>{{ $recruiter[0]->ip_address ? $recruiter[0]->ip_address : '--' }}</td>
            </tr>
            <tr>
              <th>Logged In With</th>
              <td>{{ ucfirst($recruiter[0]->login_with) }}</td>
            </tr>
            <tr>
              <th>Last Logged In Date & Time</th>
              <td>{{ $recruiter[0]->last_logged_in_at ? $recruiter[0]->last_logged_in_at : '--' }}</td>
            </tr>
            <tr>
              <th>Email Verification Status</th>
              <td>{{ $recruiter[0]->is_email_verified == 1 ? 'Verified' : 'Not Verified' }}</td>
            </tr>
            <tr>
              <th>Email Verification Date & Time</th>
              <td>{{ $recruiter[0]->is_email_verified == 1 ? $recruiter[0]->email_verified_at : '--' }}</td>
            </tr>
            <tr>
            <tr>
              <th>User Locked Status</th>
              <td>{{ $recruiter[0]->is_user_locked == 1 ? 'Locked' : 'Not Locked' }}</td>
            </tr>
            <tr>
              <th>User Locked Date & Time</th>
              <td>{{ $recruiter[0]->is_user_locked == 1 ? $recruiter[0]->user_locked_at : '--' }}</td>
            </tr>
            <tr>
              <th>Company Name</th>
              <td>{{ $organization[0]->name ? $organization[0]->name : '--' }}</td>
            </tr>
            <tr>
              <th>Created Date & Time</th>
              <td>{{ date('F d, Y - H:i A', strtotime($recruiter[0]->created_at)) }}</td>
            </tr>
            <tr>
              <th>Last Updated Date & Time</th>
              <td>{{ date('F d, Y - H:i A', strtotime($recruiter[0]->updated_at)) }}</td>
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