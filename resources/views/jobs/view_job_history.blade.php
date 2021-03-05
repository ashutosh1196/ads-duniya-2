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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->job_ref_number ? $JobHistory->job_ref_number : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-6">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_title') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->job_title ? $JobHistory->job_title : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group description">
                  <label>{{ __('adminlte::adminlte.job_description') }}</label><br/>
                  <div class="job-description">{!! $JobHistory->job_description !!}</div>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.address') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->job_address ? $JobHistory->job_address : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.city') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->city ? $JobHistory->city : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.county') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->county ? $JobHistory->county : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.state') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->state ? $JobHistory->state : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.country') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->country ? $JobHistory->country : '--' }}" readonly>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.zip') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->pincode ? $JobHistory->pincode : '--' }}" readonly>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="skills">{{ __('adminlte::adminlte.skills') }}<span class="text-danger"> *</span></label>
                  <input class="form-control"placeholder="HTML" readonly>
                  @if($errors->has('skills'))
                    <div class="error">{{ $errors->first('skills') }}</div>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.minimum_package_amount') }}</label>
                  <?php $currency = $JobHistory->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $JobHistory->package_range_from ? $JobHistory->package_range_from : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.maximum_package_amount') }}</label>
                  <?php $currency = $JobHistory->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $JobHistory->package_range_to ? $JobHistory->package_range_to : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.currency') }}</label>
                  <?php $currency = $JobHistory->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $JobHistory->currency == 'pounds' ? 'Pounds' : 'USD' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.minimum_experience_required') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->experience_range_min ? $JobHistory->experience_range_min.' Years' : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.maximum_experience_required') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->experience_range_max ? $JobHistory->experience_range_max.' Years' : '--' }}" readonly>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_type') }}</label>
                  <?php $jobTypeTrimmed = str_replace('_', ' ', $JobHistory->job_type);
                    $jobType = ucwords($jobTypeTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $JobHistory->job_type ? $jobType : '--' }}" readonly>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.recruiter') }}</label>
                  @if($recruiter != null)
                    <input class="form-control" placeholder="{{ $recruiter->first_name ? $recruiter->first_name.' '.$recruiter->last_name : $recruiter->email }}" readonly>
                  @else
                    <input class="form-control" readonly>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.company_name') }}</label>
                  <input class="form-control" placeholder="{{ $organizationName }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_url') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->job_url }}" readonly>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_industry') }}</label>
                  <input class="form-control" placeholder="{{ $jobIndustry ? $jobIndustry : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_function') }}</label>
                  <input class="form-control" placeholder="{{ $jobFunction ? $jobFunction : '--' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.region') }}</label>
                  <input class="form-control" placeholder="{{ $jobLocation ? $jobLocation : '--' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.advert_days') }}</label>
                  <input class="form-control" placeholder="90 Days" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.is_featured') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->is_featured ? 'Yes' : 'No' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <?php $statusTrimmed = str_replace('_', ' ', $JobHistory->status);
                    $status = ucwords($statusTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $JobHistory->status ? $status : '--' }}" readonly>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_by') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->created_by ? $JobHistory->created_by : '--' }}" readonly>
                </div>
              </div>
                      
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.expiring_at') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->expiring_at ? date('d/m/y', strtotime($JobHistory->expiring_at)) : '--' }}" readonly>
                </div>
              </div>
            </div>
                
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->created_at ? date('d/m/y', strtotime($JobHistory->created_at)) : '--' }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ $JobHistory->updated_at ? date('d/m/y', strtotime($JobHistory->updated_at)) : '--' }}" readonly>
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
