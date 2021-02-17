@extends('adminlte::page')

@section('title', 'Add Job Industry')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header alert d-flex justify-content-between align-items-center">
            <h3>Add Job Industry</h3>
            <a class="btn btn-sm btn-success" href="{{ url()->previous() }}">Back</a>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addJobIndustryForm" method="post" action="{{ route('save_job_industry') }}">
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
                        <label for="name">Job Industry Name<span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" id="name">
                        <div id ="industry_error" class="error"></div>
                        @if($errors->has('name'))
                          <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                      </div>
                    </div>
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="description">Job Industry Description<span class="text-danger"> *</span></label>
                        <textarea id="description" name="description"></textarea>
                        @if($errors->has('description'))
                          <div class="error">{{ $errors->last('description') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
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
            table_name: 'job_industries'
          },
          success: function(result) {
            if(result) {
              $("#industry_error").html("This Job Industry is already added.");
            }
            else {
              $("#industry_error").html("");
            }
          }
        });
      });
      $('#addJobIndustryForm').validate({
        ignore: [],
        debug: false,
        rules: {
          name: {
            required: true
          },
          description:{
            required: function() {
              CKEDITOR.instances.description.updateElement();
            },
            minlength:10
          },
        },
        messages: {
          name: {
            required: "The Job Industry Name field is required."
          },
          description: {
            required: "The Job Industry Description field is required.",
            minlength: "Minimum Length must be 10"
          },
        }
      });
    });
  </script>
@stop
