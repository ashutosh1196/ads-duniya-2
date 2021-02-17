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
            <h3>Edit Job</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="editJobForm" method="post" action="{{ route('update_job') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $jobDetails[0]->id}}">
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
                        <label for="job_title">Job Title<span class="text-danger"> *</span></label>
                        <input type="text" name="job_title" class="form-control" id="job_title" value="{{ $jobDetails[0]->job_title }}">
                        @if($errors->has('job_title'))
                          <div class="error">{{ $errors->first('job_title') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_type">Job Type<span class="text-danger"> *</span></label>
                        <select name="job_type" class="form-control" id="job_type">
                          <option value="full_time">Full Time</option>
                          <option value="contract_basis">Contract Basis</option>
                          <option value="work_from_home">Work From Home</option>
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
                        <label for="industry">Industry<span class="text-danger"> *</span></label>
                        <input type="text" name="industry" class="form-control" id="industry" value="{{ $jobDetails[0]->industry }}">
                        @if($errors->has('industry'))
                          <div class="error">{{ $errors->first('industry') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" class="form-control" id="salary" value="{{ $jobDetails[0]->salary }}">
                        @if($errors->has('salary'))
                          <div class="error">{{ $errors->first('salary') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="organization_id">Company<span class="text-danger"> *</span></label>
                        <select name="organization_id" class="form-control" id="organization_id">
                          <?php for($i=0; $i<count($organisationsList); $i++) { ?>
                            <option value="{{ $organisationsList[$i]->id }}" {{ ( $organisationsList[$i]->id == $jobDetails[0]->organization_id) ? 'selected' : '' }}>{{ $organisationsList[$i]->name }}</option>
                          <?php } ?>
                        </select>
                        @if($errors->has('organization_id'))
                          <div class="error">{{ $errors->last('organization_id') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="recruiter_id">Recruiter<span class="text-danger"> *</span></label>
                        <select name="recruiter_id" class="form-control" id="recruiter_id">
                          <?php for($i=0; $i<count($recruitersList); $i++) { ?>
                            <option value="{{ $recruitersList[$i]->id }}" {{ ( $recruitersList[$i]->id == $jobDetails[0]->recruiter_id) ? 'selected' : '' }}>{{ $recruitersList[$i]->name }}</option>
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
                        <label for="job_description">Job Description<span class="text-danger"> *</span></label>
                        <textarea id="job_description" name="job_description">{{ $jobDetails[0]->job_description }}</textarea>
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
                        <label for="job_address">Address<span class="text-danger"> *</span></label>
                        <input type="text" name="job_address" class="form-control" id="job_address" value="{{ $jobDetails[0]->job_address }}">
                        @if($errors->has('job_address'))
                          <div class="error">{{ $errors->first('job_address') }}</div>
                        @endif
                      </div>
                    </div>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="city">City / Town<span class="text-danger"> *</span></label>
                        <input type="text" name="city" class="form-control" id="city" value="{{ $jobDetails[0]->city }}">
                        @if($errors->has('city'))
                          <div class="error">{{ $errors->first('city') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="state">State<span class="text-danger"> *</span></label>
                        <input type="text" name="state" class="form-control" id="state" value="{{ $jobDetails[0]->state }}">
                        @if($errors->has('state'))
                          <div class="error">{{ $errors->first('state') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pincode">Zip / Postcode<span class="text-danger"> *</span></label>
                        <input type="text" name="pincode" class="form-control" id="pincode" value="{{ $jobDetails[0]->pincode }}">
                        @if($errors->has('pincode'))
                          <div class="error">{{ $errors->first('pincode') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="county">County</label>
                        <input type="text" name="county" class="form-control" id="county" value="{{ $jobDetails[0]->county }}">
                        @if($errors->has('county'))
                          <div class="error">{{ $errors->first('county') }}</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="country">Country<span class="text-danger"> *</span></label>
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
                <button type="text" class="btn btn-primary" >Update</button>
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
