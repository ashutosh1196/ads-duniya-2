@extends('adminlte::page')

@section('title', 'Job Information')

@section('content_header')
  <div class="header_info d-flex justify-content-between align-items-center">
    <h1>{{ __('adminlte::adminlte.job_information') }}</h1>
    <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
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
                  <label>{{ __('adminlte::adminlte.job_title') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->job_title ? $JobHistory[0]->job_title : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.is_featured') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->is_featured ? 'Yes' : 'No' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_type') }}</label>
                  <?php $jobTypeTrimmed = str_replace('_', ' ', $JobHistory[0]->job_type);
                    $jobType = ucwords($jobTypeTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->job_type ? $jobType : '--' }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->job_ref_number ? $JobHistory[0]->job_ref_number : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_industry') }}</label>
                  <input class="form-control" placeholder="{{ $jobIndustry ? $jobIndustry : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_function') }}</label>
                  <input class="form-control" placeholder="{{ $jobFunction ? $jobFunction : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.salary') }} (Per Annum)</label>
                  <?php $currency = $JobHistory[0]->salary_currency == 'pounds' ? '$' : '£' ?>
                  <input class="form-control" placeholder="{{ $currency }}{{ $JobHistory[0]->min_monthly_salary ? $JobHistory[0]->min_monthly_salary.' - '.$currency.$JobHistory[0]->max_monthly_salary : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.experience_required') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->min_experience ? $JobHistory[0]->min_experience.' - '.$JobHistory[0]->max_experience.' Years' : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <?php $statusTrimmed = str_replace('_', ' ', $JobHistory[0]->status);
                    $status = ucwords($statusTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->status ? $status : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_name') }}</label>
                  <input class="form-control" placeholder="{{ $organizationName }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.recruiter_name') }}</label>
                  <input class="form-control" placeholder="{{ $recruiterName ? $recruiterName : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.location') }}</label>
                  <input class="form-control" placeholder="{{ $jobLocation ? $jobLocation : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.address') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->job_address ? $JobHistory[0]->job_address : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.city') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->city ? $JobHistory[0]->city : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.county') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->county ? $JobHistory[0]->county : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.state') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->state ? $JobHistory[0]->state : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.country') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->country ? $JobHistory[0]->country : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.zip') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->pincode ? $JobHistory[0]->pincode : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_by') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory[0]->created_by ? $JobHistory[0]->created_by : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($JobHistory[0]->created_at)) }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ date('F d, Y - H:i A', strtotime($JobHistory[0]->updated_at)) }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group description">
                  <label>{{ __('adminlte::adminlte.job_description') }}</label><br/>
                  <div class="job-description">{!! $JobHistory[0]->job_description !!}</div>
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
  <link rel="stylesheet" type="text/css" href="https://www.jquery-az.com/jquery/css/intlTelInput//demo.css">
  <style>
    .job-description { font-size: 13px; }
  </style>
@stop

@section('js')
@stop
