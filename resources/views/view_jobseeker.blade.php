@extends('adminlte::page')

@section('title', 'Job Seeker Information')

@section('content_header')
  <h1>Job Seeker Information</h1>
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
              <td>{{ $jobseeker[0]->name }}</td>
            </tr>
            <tr>
            <tr>
              <th>First Name : </th>
              <td>{{ $jobseeker[0]->first_name }}</td>
            </tr>
            <tr>
            <tr>
              <th>Last Name : </th>
              <td>{{ $jobseeker[0]->last_name }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $jobseeker[0]->email }}</td>
            </tr>
            <tr>
              <th>Phone Number</th>
              <td>{{ $jobseeker[0]->phone_number ? $jobseeker[0]->phone_number : '--' }}</td>
            </tr>
            <tr>
              <th>IP Address</th>
              <td>{{ $jobseeker[0]->ip_address ? $jobseeker[0]->ip_address : '--' }}</td>
            </tr>
            <tr>
              <th>Logged In With</th>
              <td>{{ ucfirst($jobseeker[0]->login_with) }}</td>
            </tr>
            <tr>
              <th>Email Verification Status</th>
              <td>{{ $jobseeker[0]->is_email_verified == 1 ? 'Verified' : 'Not Verified' }}</td>
            </tr>
            <tr>
              <th>Email Verification Date</th>
              <td>{{ $jobseeker[0]->is_email_verified == 1 ? $jobseeker[0]->email_verified_at : '--' }}</td>
            </tr>
            <tr>
            <tr>
              <th>User Locked Status</th>
              <td>{{ $jobseeker[0]->is_user_locked == 1 ? 'Locked' : 'Not Locked' }}</td>
            </tr>
            <tr>
              <th>User Locked Date</th>
              <td>{{ $jobseeker[0]->is_user_locked == 1 ? $jobseeker[0]->user_locked_at : '--' }}</td>
            </tr>
            <tr>
              <th>Job Alerts Status</th>
              <td>{{ $jobseeker[0]->is_job_alert_enabled == 1 ? 'Enabled' : 'Disabled' }}</td>
            </tr>
            <tr>
              <th>Created Date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($jobseeker[0]->created_at)) }}</td>
            </tr>
            <tr>
              <th>Last Updated date</th>
              <td>{{ date('F d, Y - H:i A', strtotime($jobseeker[0]->updated_at)) }}</td>
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
