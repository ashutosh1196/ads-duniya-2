@extends('adminlte::page')

@section('title', 'Add Recruiter')

@section('content_header')
@stop

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-sm btn-success float-right" href="{{ url()->previous() }}">Back</a>
            <h3>Add Recruiter</h3>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form id="addRecruiterForm" method="post", action="{{ route('save_recruiter') }}">
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
                
                <!-- Form Fields -->

                <!-- <div class="form-group">
                  <label for="first_name">First Name<span class="text-danger"> *</span></label>
                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">
                  @if($errors->has('first_name'))
                    <div class="error">{{ $errors->first('first_name') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                  @if($errors->has('last_name'))
                    <div class="error">{{ $errors->last('last_name') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="email">Email<span class="text-danger"> *</span></label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                  @if($errors->has('email'))
                    <div class="error">{{ $errors->last('email') }}</div>
                  @endif
                </div> -->
                
                <div class="form-group">
                  <label for="password">Password<span class="text-danger"> *</span></label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                  @if($errors->has('password'))
                    <div class="error">{{ $errors->last('password') }}</div>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="confirm_password">Confirm Password<span class="text-danger"> *</span></label>
                  <input type="hidden" name="email" class="form-control" id="email" value="{{ $email }}">
                  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password">
                  @if($errors->has('confirm_password'))
                    <div class="error">{{ $errors->last('confirm_password') }}</div>
                  @endif
                </div>
                
                <!-- /Form Fields -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="text" class="btn btn-primary">Submit</button>
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
    .error {
      color: #ff0000;
      font-weight: 500 !important;
    }
  </style>
@stop

@section('js')
  <script>
    $(document).ready(function() {
      $('#addRecruiterForm').validate({
        ignore: [],
        debug: false,
        rules: {
          /* first_name: {
            required: true
          },
          last_name: {
            required: true
          },
          email: {
            required: true,
            email: true
          }, */
          password: {
            required: true,
            minlength: 8
          },
          confirm_password: {
            required: true,
            minlength: 8,
            equalTo : "#password"
          },
        },
        messages: {
          /* first_name: {
            required: "The First field Name is required."
          },
          last_name: {
            required: "The Last field Name is required."
          },
          email: {
            required: "The Email field is required.",
            email: "Please enter a valid Email"
          }, */
          password: {
            required: "The Password field is required.",
            minlength: "Minimum length should be 8"
          },
          confirm_password: {
            required: "The Confirm Password field is required.",
            minlength: "Minimum length should be 8",
            equalTo : "The Confirm Password must be equal to Password."
          },
        }
      });
    });
  </script>
@stop
