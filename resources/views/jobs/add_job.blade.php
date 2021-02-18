@extends('adminlte::page')

@section('title', 'Add Job')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>{{ __('adminlte::adminlte.add_job') }}</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addJobForm" method="post" action="{{ route('save_job') }}">
              @csrf
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
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_title">{{ __('adminlte::adminlte.job_title') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="job_title" class="form-control" id="job_title">
                        @if($errors->has('job_title'))
                          <div class="error">{{ $errors->first('job_title') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_type">{{ __('adminlte::adminlte.job_type') }}<span class="text-danger"> *</span></label>
                        <select name="job_type" class="form-control" id="job_type">
                          <option value="full_time">{{ __('adminlte::adminlte.full_time') }}</option>
                          <option value="contract_basis">{{ __('adminlte::adminlte.contract_basis') }}</option>
                          <option value="work_from_home">{{ __('adminlte::adminlte.work_from_home') }}</option>
                        </select>
                        @if($errors->has('job_type'))
                          <div class="error">{{ $errors->last('job_type') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="industry">{{ __('adminlte::adminlte.industry') }}<span class="text-danger"> *</span></label>
                        <select name="industry" class="form-control" id="industry">
                          <?php for ($i=0; $i < count($jobIndustries); $i++) { ?> 
                            <option value="{{ $jobIndustries[$i]->id }}">{{ $jobIndustries[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('industry'))
                          <div class="error">{{ $errors->first('industry') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="salary">{{ __('adminlte::adminlte.salary') }}</label>
                        <input type="text" name="salary" class="form-control" id="salary">
                        @if($errors->has('salary'))
                          <div class="error">{{ $errors->first('salary') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="organization_id">{{ __('adminlte::adminlte.company') }}<span class="text-danger"> *</span></label>
                        <select name="organization_id" class="form-control" id="organization_id">
                          <?php for($i=0; $i<count($organisationsList); $i++) { ?>
                            <option value="{{ $organisationsList[$i]->id }}">{{ $organisationsList[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('organization_id'))
                          <div class="error">{{ $errors->last('organization_id') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="recruiter_id">{{ __('adminlte::adminlte.recruiter') }}<span class="text-danger"> *</span></label>
                        <select name="recruiter_id" class="form-control" id="recruiter_id">
                          <?php for($i=0; $i<count($recruitersList); $i++) { ?>
                            <option value="{{ $recruitersList[$i]->id }}">{{ $recruitersList[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('recruiter_id'))
                          <div class="error">{{ $errors->last('recruiter_id') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="job_description">{{ __('adminlte::adminlte.job_description') }}<span class="text-danger"> *</span></label>
                        <textarea id="job_description" name="job_description"></textarea>
                        @if($errors->has('job_description'))
                          <div class="error">{{ $errors->last('job_description') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <hr/>

                <div class="address_fields">
                  <input type="hidden" name="latitude" value="30.6774506">
                  <input type="hidden" name="longitude" value="76.74058339">

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_address">{{ __('adminlte::adminlte.address') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="job_address" class="form-control" id="job_address">
                        @if($errors->has('job_address'))
                          <div class="error">{{ $errors->first('job_address') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="city">{{ __('adminlte::adminlte.city') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="city" class="form-control" id="city">
                        @if($errors->has('city'))
                          <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="state">{{ __('adminlte::adminlte.state') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="state" class="form-control" id="state">
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pincode">{{ __('adminlte::adminlte.zip') }}<span class="text-danger"> *</span></label>
                        <input type="text" name="pincode" class="form-control" id="pincode">
                        @if($errors->has('pincode'))
                          <div class="error">{{ $errors->first('pincode') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="county">{{ __('adminlte::adminlte.county') }}</label>
                        <input type="text" name="county" class="form-control" id="county">
                        @if($errors->has('county'))
                          <div class="error">{{ $errors->first('county') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="country">{{ __('adminlte::adminlte.country') }}<span class="text-danger"> *</span></label>
                        <select name="country" class="form-control" id="country">
                            <?php for($i=0; $i<count($countries); $i++) { ?>
                              <option value="{{ $countries[$i]->name }}" {{ $countries[$i]->name == 'United Kingdom' ? 'selected' : '' }}>{{ $countries[$i]->name }}</option>
                            <?php } ?>
                        </select>
                        @if($errors->has('country'))
                          <div class="error">{{ $errors->last('country') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary" >{{ __('adminlte::adminlte.save') }}</button>
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
    .information_fields { margin-bottom: 30px; }
    .address_fields { margin-top: 30px; }
    .intl-tel-input { display: block; }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
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
      $('#addJobForm').validate({
        ignore: [],
        debug: false,
        rules: {
          job_title: {
            required: true
          },
          job_type: {
            required: true
          },
          industry: {
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
          state: {
            required: true
          },
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
          industry: {
            required: "The Industry field is required."
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
          state: {
            required: "The State field is required."
          },
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
