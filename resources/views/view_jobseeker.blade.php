@extends('adminlte::page')

@section('title', 'Job Seeker Information')

@section('content_header')
  <a class="btn btn-sm btn-info float-right" href="{{ url()->previous() }}">Back</a>
  <h1>Job Seeker Information</h1>
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
<!--           <table class="table">
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
          </table> -->

          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="Ashish Kumar" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>First Name</label>
                  <input class="form-control" placeholder="Ashish" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" placeholder="Kumar" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="ashish111@gmail.com" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" placeholder="--" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>IP Address</label>
                  <input class="form-control" placeholder="111.93.38.130" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Logged In With</label>
                  <input class="form-control" placeholder="Email" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Status</label>
                  <input class="form-control" placeholder="Not Verified" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Date</label>
                  <input class="form-control" placeholder="--" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Status</label>
                  <input class="form-control" placeholder="Not Locked" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Date</label>
                  <input class="form-control" placeholder="--" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Job Alerts Status</label>
                  <input class="form-control" placeholder="Enabled" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="February 09, 2021 - 13:51 PM" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="February 09, 2021 - 13:51 PM" readonly>
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
