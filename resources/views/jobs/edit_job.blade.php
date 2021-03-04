@extends('adminlte::page')

@section('title', 'Edit Job')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.edit_job') }}</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editJobForm" method="post" action="{{ route('update_job') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $jobDetails->id}}" maxlength="100">
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-warning">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <div class="information_fields">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="job_title">{{ __('adminlte::adminlte.job_title') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="job_title" class="form-control" id="job_title" value="{{ $jobDetails->job_title }}" maxlength="100">
                        @if($errors->has('job_title'))
                          <div class="error">{{ $errors->first('job_title') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="job_description">{{ __('adminlte::adminlte.job_description') }}<span class="text-danger"> *</span></label>
                        <textarea id="job_description" name="job_description" maxlength="1000">{{ $jobDetails->job_description }}</textarea>
                        @if($errors->has('job_description'))
                          <div class="error">{{ $errors->last('job_description') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <hr/>

                <div class="address_fields">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_address">{{ __('adminlte::adminlte.address') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="job_address" class="form-control" id="job_address" value="{{ $jobDetails->job_address }}" maxlength="100">
                        @if($errors->has('job_address'))
                          <div class="error">{{ $errors->first('job_address') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="city">{{ __('adminlte::adminlte.city') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="city" class="form-control" id="city" value="{{ $jobDetails->city }}" maxlength="100">
                        @if($errors->has('city'))
                          <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="county">{{ __('adminlte::adminlte.county') }}</label>
                        <input type="text" name="county" class="form-control" id="county" value="{{ $jobDetails->county }}" maxlength="100">
                        @if($errors->has('county'))
                          <div class="error">{{ $errors->first('county') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="state">{{ __('adminlte::adminlte.state') }}</label>
                        <input type="text" name="state" class="form-control" id="state" value="{{ $jobDetails->state }}" maxlength="100">
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="country">{{ __('adminlte::adminlte.country') }}<span class="text-danger"> *</span></label>
                        <select name="country" class="form-control" id="country">
                            <?php for($i=0; $i<count($countries); $i++) { rsort($countries); ?>
                              <option value="{{ $countries[$i]['name'] }}" {{ $countries[$i]['name'] == 'United Kingdom' ? 'selected' : '' }}>{{ $countries[$i]['name'] }}</option>
                            <?php } ?>
                        </select>
                        @if($errors->has('country'))
                          <div class="error">{{ $errors->last('country') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pincode">{{ __('adminlte::adminlte.zip') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="pincode" class="form-control" id="pincode" value="{{ $jobDetails->pincode }}" maxlength="6">
                        @if($errors->has('pincode'))
                          <div class="error">{{ $errors->first('pincode') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <hr/>

                <div class="requirements_fields"> 
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="skills">{{ __('adminlte::adminlte.skills') }}<span class="text-danger"> *</span></label>
                        <select class="form-control" id="skills" multiple="multiple" name="skills[]">
                        @foreach($skills as $skill)
                          @php
                            if (old('skills')) {
                              if (in_array($skill->id, old('skills'))) {
                                $selected = "selected";
                              }
                              else{
                                $selected = "";
                              }
                            }
                            elseif($jobDetails->skills){
                              if (in_array($skill->id, $jobDetails->skills->pluck('id')->toArray())) {
                                $selected = "selected";
                              }
                              else{
                                $selected = "";
                              }
                            }
                            else{
                              $selected = "";
                            }    
                          @endphp
                          <option {{$selected}} value="{{$skill->id}}">{{$skill->name}}</option>
                          @endforeach
                        <!--  -->
                        </select>
                        <!-- <input type="text" name="skills" class="form-control" id="skills" maxlength="100"> -->
                        @if($errors->has('skills'))
                          <div class="error">{{ $errors->first('skills') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="package_range_from">{{ __('adminlte::adminlte.minimum_package_amount') }}</label>
                        <input type="text" name="package_range_from" class="form-control" id="package_range_from" value="{{ $jobDetails->package_range_from }}" maxlength="100">
                        @if($errors->has('package_range_from'))
                          <div class="error">{{ $errors->first('package_range_from') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="package_range_to">{{ __('adminlte::adminlte.maximum_package_amount') }}</label>
                        <input type="text" name="package_range_to" class="form-control" id="package_range_to" value="{{ $jobDetails->package_range_to }}" maxlength="100">
                        @if($errors->has('package_range_to'))
                          <div class="error">{{ $errors->first('package_range_to') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="salary_currency">{{ __('adminlte::adminlte.currency') }}</label>
                        <select name="salary_currency" class="form-control" id="salary_currency">
                          <option value="pounds" {{ $jobDetails->salary_currency == 'pounds' ? 'selected' : '' }}>Pound</option>
                          <option value="dollars" {{ $jobDetails->salary_currency == 'dollars' ? 'selected' : '' }}>USD</option>
                        </select>
                        @if($errors->has('salary_currency'))
                          <div class="error">{{ $errors->first('salary_currency') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="experience_range_min">{{ __('adminlte::adminlte.minimum_experience_required') }}</label>
                        <input type="text" name="experience_range_min" class="form-control" id="experience_range_min" value="{{ $jobDetails->experience_range_min }}" maxlength="100">
                        @if($errors->has('experience_range_min'))
                          <div class="error">{{ $errors->first('experience_range_min') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="experience_range_max">{{ __('adminlte::adminlte.maximum_experience_required') }}</label>
                        <input type="text" name="experience_range_max" class="form-control" id="experience_range_max" value="{{ $jobDetails->experience_range_max }}" maxlength="100">
                        @if($errors->has('experience_range_max'))
                          <div class="error">{{ $errors->first('experience_range_max') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <hr/>

                <div class="type_fields"> 
                  <div class="row">  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_type">{{ __('adminlte::adminlte.job_type') }}<span class="text-danger"> *</span></label>
                        <select name="job_type" class="form-control" id="job_type">
                          <option {{ $jobDetails->job_type == 'full_time' ? 'selected' : '' }} value="full_time">{{ __('adminlte::adminlte.full_time') }}</option>
                          <option {{ $jobDetails->job_type == 'contract_basis' ? 'selected' : '' }} value="contract_basis">{{ __('adminlte::adminlte.contract_basis') }}</option>
                          <option {{ $jobDetails->job_type == 'work_from_home' ? 'selected' : '' }} value="work_from_home">{{ __('adminlte::adminlte.work_from_home') }}</option>
                        </select>
                        @if($errors->has('job_type'))
                          <div class="error">{{ $errors->last('job_type') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <hr/>

                <div class="about_fields"> 
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="organization_id">{{ __('adminlte::adminlte.company_name') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="organization_id" class="form-control" id="organization_id" value="{{ $organisation->name }}" disabled>
                        @if($errors->has('organization_id'))
                          <div class="error">{{ $errors->last('organization_id') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_url">{{ __('adminlte::adminlte.job_url') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="job_url" class="form-control" id="job_url" value="{{ $jobDetails->job_url }}" maxlength="100">
                        @if($errors->has('job_url'))
                          <div class="error">{{ $errors->first('job_url') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <hr/>

                <div class="other_fields"> 
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_industry_id">{{ __('adminlte::adminlte.job_industry') }}<span class="text-danger"> *</span></label>
                        <select name="job_industry_id" class="form-control" id="job_industry_id">
                          <?php for($i=0; $i<count($jobIndustries); $i++) { ?>
                            <option value="{{ $jobIndustries[$i]->id }}" {{ ( $jobIndustries[$i]->id == $jobDetails->job_industry_id) ? 'selected' : '' }}>{{ $jobIndustries[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('job_industry_id'))
                          <div class="error">{{ $errors->first('job_industry_id') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_function_id">{{ __('adminlte::adminlte.job_function') }}<span class="text-danger"> *</span></label>
                        <select name="job_function_id" class="form-control" id="job_function_id">
                          <?php for($i=0; $i<count($jobFunctions); $i++) { ?>
                            <option value="{{ $jobFunctions[$i]->id }}" {{ ( $jobFunctions[$i]->id == $jobDetails->job_function_id) ? 'selected' : '' }}>{{ $jobFunctions[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('job_function_id'))
                          <div class="error">{{ $errors->first('job_function_id') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_location_id">{{ __('adminlte::adminlte.region') }}<span class="text-danger"> *</span></label>
                        <select name="job_location_id" class="form-control" id="job_location_id">
                          <?php for($i=0; $i<count($jobLocations); $i++) { ?>
                            <option value="{{ $jobLocations[$i]->id }}" {{ ( $jobLocations[$i]->id == $jobDetails->job_location_id) ? 'selected' : '' }}>{{ $jobLocations[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('job_location_id'))
                          <div class="error">{{ $errors->first('job_location_id') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="advert_days">{{ __('adminlte::adminlte.advert_days') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="advert_days" class="form-control" id="advert_days" value="90 Days" disabled>
                        @if($errors->has('advert_days'))
                          <div class="error">{{ $errors->first('advert_days') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group is_featured_group">
                        <label for="is_featured">{{ __('adminlte::adminlte.is_featured') }}<span class="text-danger"> *</span></label>
                        <label class="switch">
                          <input class="is_featured" type="checkbox" name="is_featured" disabled="" {{ $jobDetails->is_featured ? 'checked' : '' }}>
                          <span class="slider round"></span>
                        </label>
                        @if($errors->has('is_featured'))
                          <div class="error">{{ $errors->first('is_featured') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group is_complete_update_group">
                        <label for="is_complete_update">{{ __('adminlte::adminlte.is_complete_update') }}<span class="text-danger"> *</span></label>
                        <input class="is_complete_update" type="checkbox" name="is_complete_update">
                        @if($errors->has('is_complete_update'))
                          <div class="error">{{ $errors->last('is_complete_update') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary" >{{ __('adminlte::adminlte.update') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
  </style>
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#skills").select2({
        tags: true,
        tokenSeparators: [',', ' ']
      })
      CKEDITOR.replace( 'job_description', {
        customConfig : 'config.js',
        toolbar : 'simple'
      })
      $("#email").blur(function() {
        $.ajax({
          type:"GET",
          url:"{{ route('check_email') }}",
          data: {
            email: $(this).val(),
            table_name: 'users'
          },
          success: function(result) {
            if(result) {
              $("#email_error").html("This email is already registered.");
            }
            else {
              $("#email_error").html("");
            }
          }
        });
      });
      $('#editJobForm').validate({
        ignore: [],
        debug: false,
        rules: {
          job_title: {
            required: true
          },
          job_type: {
            required: true
          },
          job_industry_id: {
            required: true
          },
          job_function_id: {
            required: true
          },
          job_location_id: {
            required: true
          },
          job_url: {
            required: true
          },
          recruiter_id: {
            required: true
          },
          organization_id: {
            required: true
          },
          job_description:{
            required: function() {
              CKEDITOR.instances.job_description.updateElement();
            },
            minlength:10
          },
          job_address: {
            required: true
          },
          city: {
            required: true
          },
          /* state: {
            required: true
          }, */
          pincode: {
            required: true
          },
          country: {
            required: true
          },
        },
        messages: {
          job_title: {
            required: "The Job Title field is required."
          },
          job_type: {
            required: "The Job Type field is required."
          },
          job_industry_id: {
            required: "The Job Industry field is required."
          },
          job_function_id: {
            required: "The Job Function field is required."
          },
          job_location_id: {
            required: "The Job Location field is required."
          },
          job_url: {
            required: "The Job URL field is required."
          },
          recruiter_id: {
            required: "The Recruiter field is required."
          },
          organization_id: {
            required: "The Company field is required."
          },
          job_description: {
            required: "The Job Description field is required.",
            minlength: "Minimum Length must be 10"
          },
          job_address: {
            required: "The Job Address field is required."
          },
          city: {
            required: "The City / Town field is required."
          },
          /* state: {
            required: "The State field is required."
          }, */
          pincode: {
            required: "The Zip / Postcode field is required."
          },
          country: {
            required: "The Country field is required."
          },
        }
      });
    });
  </script>
@stop
