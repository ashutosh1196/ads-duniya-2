@extends('adminlte::page')

@section('title', 'Job Seeker Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>Job Seeker Information</h1>
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

          <form class="form_wrap">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->first_name }} {{ $jobseeker[0]->last_name }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
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
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->email }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->phone_number ? $jobseeker[0]->phone_number : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>IP Address</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->ip_address ? $jobseeker[0]->ip_address : '--' }}" readonly>
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Logged In With</label>
                  <input class="form-control" placeholder="Email" readonly>
                </div>
              </div> -->
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Status</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->is_email_verified == 1 ? 'Verified' : 'Not Verified' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Email Verification Date</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->is_email_verified == 1 ? $jobseeker[0]->email_verified_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Status</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->is_user_locked == 1 ? 'Locked' : 'Not Locked' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>User Locked Date</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->is_user_locked == 1 ? $jobseeker[0]->user_locked_at : '--' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Job Alerts Status</label>
                  <input class="form-control" placeholder="{{ $jobseeker[0]->is_job_alert_enabled == 1 ? 'Enabled' : 'Disabled' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($jobseeker[0]->created_at)) }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($jobseeker[0]->updated_at)) }}" readonly>
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
