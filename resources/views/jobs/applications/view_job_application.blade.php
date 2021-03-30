@extends('adminlte::page')

@section('title', 'Job Application Details')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Job Application Details</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>        
        <div class="card-body job-history">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          
          <form class="form_wrap">
          
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                  <input class="form-control" placeholder="{{ $appliedJob->job_ref_number ? $appliedJob->job_ref_number : '' }}" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_title') }}</label>
                  <input class="form-control" placeholder="{{ $appliedJob->job_title ? $appliedJob->job_title : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="form-group description">
                  <label>{{ __('adminlte::adminlte.description') }}</label><br/>
                  <div class="job-description">{!! $appliedJob->job_description !!}</div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.user_name') }}</label>
                  <input class="form-control" placeholder="{{ $userName }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ $jobApplication->created_at ? date('d/m/y', strtotime($jobApplication->created_at)) : '' }}" readonly>
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
  <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/jquery/css/intlTelInput//demo.css">
  <style>
    .job-description { font-size: 13px; }
    img.job_image { width: 150px; object-fit: cover; border: 1px solid #343d49; padding: 5px; border-radius: 3px; }
    .job_image_show { padding: 10px 10px 30px 10px; }
  </style>
@stop

@section('js')
@stop
