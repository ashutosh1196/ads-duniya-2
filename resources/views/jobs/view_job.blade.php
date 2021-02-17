@extends('adminlte::page')

@section('title', 'Job Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>Job Information</h1>
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
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>Job Title</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->job_title ? $jobDetails[0]->job_title : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>Job Description</label>
                  <span class="job-description">{!! $jobDetails[0]->job_description !!}</span>
                </div>
              </div>
            </div>

            <hr/>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Job Reference Number</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->job_ref_number ? $jobDetails[0]->job_ref_number : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Job Type</label>
                  <?php $jobTypeTrimmed = str_replace('_', ' ', $jobDetails[0]->job_type);
                    $jobType = ucwords($jobTypeTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->job_type ? $jobType : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Job Address</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->job_address ? $jobDetails[0]->job_address : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>City</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->city ? $jobDetails[0]->city : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>County</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->county ? $jobDetails[0]->county : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>State</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->state ? $jobDetails[0]->state : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Country</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->country ? $jobDetails[0]->country : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Zip / Postcode</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->pincode ? $jobDetails[0]->pincode : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Industry</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->industry ? $jobDetails[0]->industry : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Salary</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->salary ? $jobDetails[0]->salary : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Status</label>
                  <?php $statusTrimmed = str_replace('_', ' ', $jobDetails[0]->status);
                    $status = ucwords($statusTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->status ? $status : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Recruiter Name</label>
                  <input class="form-control" placeholder="{{ $recruiterName }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Company Name</label>
                  <input class="form-control" placeholder="{{ $organizationName }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created By</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->created_by ? $jobDetails[0]->created_by : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Deleted Date</label>
                  <input class="form-control" placeholder="{{ $jobDetails[0]->deleted_at ? date('F d, Y - H:i A', strtotime($jobDetails[0]->deleted_at)) : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Created Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($jobDetails[0]->created_at)) }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>Last Updated Date</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($jobDetails[0]->updated_at)) }}" readonly>
                </div>
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
  <style>
    .job-description { font-size: 13px; }
  </style>
@stop

@section('js')
@stop
