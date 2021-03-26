@extends('adminlte::page')

@section('title', 'Bookmarked Job Details')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex justify-content-between align-items-center">
          <h3>Bookmarked Job Details</h3>
          <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>        
        <div class="card-body job-history">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          
          <?php 
            $url = config('adminlte.website_url', '').'images/companyLogos/';
            $filePath = $bookmarkedJob->company_logo ? $url.$bookmarkedJob->company_logo : config("adminlte.default_avatar");
          ?>
          
          <form class="form_wrap">
            <div class="title">
              <h5>Tell Us About Your Job</h5>
              <hr/>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.reference_number') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_ref_number ? $bookmarkedJob->job_ref_number : '' }}" readonly>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_title') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_title ? $bookmarkedJob->job_title : '' }}" readonly>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group description">
                  <label>{{ __('adminlte::adminlte.job_description') }}</label><br/>
                  <div class="job-description">{!! $bookmarkedJob->job_description !!}</div>
                </div>
              </div>
            </div>

            <div class="title">
              <h5>Location of the job</h5>
              <hr/>
            </div>

            <div class="row">
              <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.address') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_address ? $bookmarkedJob->job_address : '' }}" readonly>
                </div>
              </div> -->

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.city') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->city ? $bookmarkedJob->city : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.county') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->county ? $bookmarkedJob->county : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.state') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->state ? $bookmarkedJob->state : '' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.country') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->country ? $bookmarkedJob->country : '' }}" readonly>
                </div>
              </div>
            </div>

            <!-- <div class="row">
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.zip') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->pincode ? $bookmarkedJob->pincode : '' }}" readonly>
                </div>
              </div>
            </div> -->

            <div class="title">
              <h5>What Are The Job Requirements?</h5>
              <hr/>
            </div>

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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.minimum_experience_required') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->experience_range_min ? $bookmarkedJob->experience_range_min.' Years' : '' }}" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.employment_eligibility') }}</label>
                  <?php $employmentEligibility = str_replace('_', ' ', $bookmarkedJob->employment_eligibility); ?>
                  <input class="form-control" placeholder="{{ ucwords($employmentEligibility) }}" readonly>
                </div>
              </div>
            </div>

            <div class="title">
              <h5>What Does This Job Pay?</h5>
              <hr/>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.minimum_package_amount') }}</label>
                  <?php $currency = $bookmarkedJob->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->package_range_from ? $bookmarkedJob->package_range_from : '' }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.maximum_package_amount') }}</label>
                  <?php $currency = $bookmarkedJob->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->package_range_to ? $bookmarkedJob->package_range_to : '' }}" readonly>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.currency') }}</label>
                  <?php $currency = $bookmarkedJob->salary_currency == 'pounds' ? '£' : '$' ?>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->currency == 'pounds' ? 'Pounds' : 'USD' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_type') }}</label>
                  <?php $jobTypeTrimmed = str_replace('_', ' ', $bookmarkedJob->job_type);
                    $jobType = ucwords($jobTypeTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_type ? $jobType : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="title">
              <h5>Tell Us About Your Company</h5>
              <hr/>
            </div>

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
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_url') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_url }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.is_featured') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->is_featured ? 'Yes' : 'No' }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group profile_image">
                  <label>Profile Image</label>
                  <img class="job_image" src="{{ $filePath }}">
                </div>
              </div>                      
              <!-- <div class="job_image_show">
                <img class="job_image" src="{{ $filePath }}">
              </div> -->
            </div>

            <div class="title">
              <h5>Other Details</h5>
              <hr/>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>Bookmarked By</label>
                  <input class="form-control" placeholder="{{ $userName }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_industry') }}</label>
                  <input class="form-control" placeholder="{{ $jobIndustry ? $jobIndustry : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.job_function') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->job_function }}" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.region') }}</label>
                  <input class="form-control" placeholder="{{ $jobLocation ? $jobLocation : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.advert_days') }}</label>
                  <input class="form-control" placeholder="90 Days" readonly>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.status') }}</label>
                  <?php $statusTrimmed = str_replace('_', ' ', $bookmarkedJob->status);
                    $status = ucwords($statusTrimmed);
                  ?>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->status ? $status : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_by') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->created_by ? $bookmarkedJob->created_by : '' }}" readonly>
                </div>
              </div>
                      
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.expiring_at') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->expiring_at ? date('d/m/y', strtotime($bookmarkedJob->expiring_at)) : '' }}" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.created_date') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->created_at ? date('d/m/y', strtotime($bookmarkedJob->created_at)) : '' }}" readonly>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
                <div class="form-group">
                  <label>{{ __('adminlte::adminlte.last_updated_date') }}</label>
                  <input class="form-control" placeholder="{{ $bookmarkedJob->updated_at ? date('d/m/y', strtotime($bookmarkedJob->updated_at)) : '' }}" readonly>
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
