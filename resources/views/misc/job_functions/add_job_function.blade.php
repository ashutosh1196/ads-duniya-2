@extends('adminlte::page')

@section('title', 'Add Job Function')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Add Job Function</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addJobFunctionForm" method="post" action="{{ route('save_job_function') }}">
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
                        <label for="name">Job Function Name<span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" id="name">
                        <div id ="function_error" class="error"></div>
                        @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">Status<span class="text-danger"> *</span></label>
                        <select name="status" class="form-control" id="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                        @if($errors->has('status'))
                          <div class="error">{{ $errors->first('status') }}</div>
                        @endif
                      </div>
                    </div>

                  </div>
                    
                  <!-- <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="job_industry_id">Job Industry<span class="text-danger"> *</span></label>
                        <select name="job_industry_id" class="form-control" id="job_industry_id">
                              <option value="" hidden>Select Industry</option>
                        </select>
                        @if($errors->has('job_industry_id'))
                          <div class="error">{{ $errors->first('job_industry_id') }}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="description">Job Function Description<span class="text-danger"> *</span></label>
                        <textarea id="description" name="description"></textarea>
                        @if($errors->has('description'))
                          <div class="error">{{ $errors->last('description') }}</div>
                        @endif
                      </div>
                    </div>
                  </div> -->
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary" >Save</button>
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
      CKEDITOR.replace( 'description', {
        customConfig : 'config.js',
        toolbar : 'simple'
      });
      $("#name").blur(function() {
        $.ajax({
          type:"GET",
          url:"{{ route('check_if_exists') }}",
          data: {
            name: $(this).val(),
            table_name: 'job_functions'
          },
          success: function(result) {
            if(result) {
              $("#function_error").html("This Job Function is already added.");
            }
            else {
              $("#function_error").html("");
            }
          }
        });
      });
      $('#addJobFunctionForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          status: {
            required: true
          },
          /* job_industry_id: {
            required: true
          },
          description:{
            required: function() {
              CKEDITOR.instances.description.updateElement();
            },
            minlength:10
          }, */
        },
        messages: {
          name: {
            required: "The Job Function Name field is required."
          },
          status: {
            required: "The Status field is required."
          },
          /* job_industry_id: {
            required: "The Job Industry field is required."
          },
          description: {
            required: "The Job Function Description field is required.",
            minlength: "Minimum Length must be 10"
          }, */
        }
      });
    });
  </script>
@stop
